<?php
class Users extends Model
{
    private $_isLoggedIn, $_sessionName, $_cookieName;
    public static $currentLoggedInUsers = null;
    public function __construct($user = '')
    {
        $table = 'users';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete;
        if ($user != '') {
            if (is_int($user)) {
                $u = $this->_db->findFirst('users', ['conditions' => 'id = ?', 'bind' => [$user]]);
            } else {
                $u = $this->_db->findFirst('users', ['conditions' => 'email = ?', 'bind' => [$user]]);
            }
            if ($u) {
                foreach ($u as $key => $val) {
                    $this->$key = $val;
                }
            }
        }
    }
    public function findByEmail($email)
    {
        return $this->findFirst(['conditions' => 'email= ?', 'bind' => [$email]]);
    }
    public function findById($id)
    {
        return $this->findFirst(['conditions' => 'id= ?', 'bind' => [$id]]);
    }
    public static function currentLoggedInUser()
    {
        if (!isset(self::$currentLoggedInUsers) && Session::exists(CURRENT_USER_SESSION_NAME)) {
            $u = new Users((int) Session::get(CURRENT_USER_SESSION_NAME));
            self::$currentLoggedInUsers = $u;
        }
        return self::$currentLoggedInUsers;
    }
    public function login($rememberMe = false)
    {
        Session::set($this->_sessionName, $this->id);
        if ($rememberMe) {
            $hash = md5(uniqid() + rand(0, 100));
            $user_agent = Session::uagent_no_version();
            Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
            $fields = ['user_id' => $this->id, 'session' => $hash, 'user_agent' => $user_agent];
            $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
            $this->_db->insert('user_sessions', $fields);
        }
    }
    public static function loginUserFromCookie()
    {
        $userSession = UserSessions::getFromCookie();
        if ($userSession->user_id != '') {
            $user = new Self((int) $userSession->user_id);
        }
        if ($user) {
            $user->login();
        }
        return $user;
    }
    public function logout()
    {
        $user_agent = Session::uagent_no_version();
        $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
        Session::delete(CURRENT_USER_SESSION_NAME);
        Session::delete($_SESSION['email']);
        if (Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
            Cookie::delete(REMEMBER_ME_COOKIE_NAME);
        }
        self::$currentLoggedInUsers = null;
        return true;
    }
    public function registerNewUser($params)
    {
        $par = $this->assign($params);
        $par['is_verified'] = 0;
        $par['token'] = token();
        $par['password'] = password_hash($par['password'], PASSWORD_BCRYPT);
        $q = $this->insert($par);
        $m = Mail::getInstance(SMTP_HOST, SMTPUSERNAME, SMTPPASSWORD, SMTPSECURE, SMTPPORT);
        return $m->sendVerification($par['name'], $par['email'], $par['token'], "verification");
    }
    public function checkUser($userData = array())
    {
        if (!empty($userData)) {
            if ($this->userExists([
                'conditions' => 'oauth_provider = ? AND oauth_uid = ?',
                'bind' => [$userData['oauth_provider'], $userData['oauth_uid']],
            ])) {
                $params = [
                    'email' => $userData['email'],
                    'name' => $userData['name'],
                    'is_verified'=>1,
                    'oauth_provider'=>$userData['oauth_provider'],
                    'oauth_uid'=>$userData['oauth_uid']
                ];
                $this->updateGoogleUser($params);
                return true;
            } else {
                $fields = [
                    'email' => $userData['email'],
                    'name' => $userData['name'],
                    'oauth_provider' => $userData['oauth_provider'],
                    'oauth_uid' => $userData['oauth_uid'],
                    'is_verified'=>1

                ];
                $this->insert($fields);
                return true;
            }
        }
        return false;
    }
}
