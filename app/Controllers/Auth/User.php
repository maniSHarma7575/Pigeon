<?php
class User extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Users');
    }
    public function loginAction()
    {
        $validation = new Validate();
        if (Session::exists(CURRENT_USER_SESSION_NAME)) {
            Router::redirect('Dashboard/');
        }
        if ($_GET && $_GET['emailmodel']) {
            Router::redirect('ForgotPassword/verify?emailmodel=' . $_GET['emailmodel']);
        }
        if ($_POST) {
            $validation = $validation->check($_POST, [
                'email' => [
                    'display' => 'email',
                    'required' => 'true'
                ],
                'password' => [
                    'display' => 'password',
                    'required' => 'true',
                    'min' => 6
                ]
            ]);
            if ($validation->passed()) {
                $user = $this->UsersModel->findByEmail($_POST['email']);
                if ($user && $user->is_verified == 1 && password_verify(Input::get('password'), $user->password)) {
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
                    $user->login($remember);
                    Session::set('email', $_POST['email']);
			Session::set('name',$user->name);
                    Router::redirect('Dashboard/');
                } 
elseif($user && empty($user->name)) 
                {
                    $validation->addError("Account dosen't exists.");
                }
elseif ($user && $user->is_verified == 0) {
                    $validation->addError('Please verify your email address');
                } else {
                    $validation->addError("Email or Password incorrect");
                }
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $authUrl = "";
        $gClient = new Google_Client();
        $gClient->setApplicationName('Email Campaign');
        $gClient->setClientId(GOOGLE_CLIENT_ID);
        $gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
        $gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);
        if (isset($_GET['code'])) {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
        }
        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }
        if ($gClient->getAccessToken()) {
            $gpUserProfile = $google_oauthV2->userinfo->get();
            $gpUserData = array();
            $gpUserData['oauth_uid']  = !empty($gpUserProfile['id']) ? $gpUserProfile['id'] : '';
            $firstname = !empty($gpUserProfile['given_name']) ? $gpUserProfile['given_name'] : '';
            $lastname  = !empty($gpUserProfile['family_name']) ? $gpUserProfile['family_name'] : '';
            $gpUserData['name'] = $firstname . ' ' . $lastname;
            $gpUserData['email']      = !empty($gpUserProfile['email']) ? $gpUserProfile['email'] : '';
            $gpUserData['oauth_provider'] = 'google';
            $userData = $this->UsersModel->checkUser($gpUserData);
            if (!$userData) {
                $this->view->displayErrors = "Problem Occurred Please, try again";
                $this->view->render('Auth/login');
            } else {
                $user = $this->UsersModel->findByEmail($gpUserData['email']);
                $user->login(false);
                Session::set('email', $gpUserData['email']);
Session::set('name',$gpUserData['name']);                
Router::redirect('Dashboard/');
            }
        } else {
            $authUrl = $gClient->createAuthUrl();
            $this->view->authUrl = $authUrl;
        }
        $this->view->render('Auth/login');
    }

    public function logoutAction()
    {
        if (!Session::exists(CURRENT_USER_SESSION_NAME)) {
            Router::redirect('');
        }
        if (isset($_SESSION['token'])) {
            unset($_SESSION['token']);
            unset($_SESSION['email']);
            session_destroy();
            Router::redirect('user/login');
            exit();
        }
        if (currentUser()->logout()) {
            Router::redirect('user/login');
        }
    }
    public function registerAction()
    {
        if (Session::exists(CURRENT_USER_SESSION_NAME)) {
            Router::redirect('Dashboard/');
        }
        $errors = '';
        $validation = new Validate();
        $posted_value = ['name' => '', 'email' => '', 'password' => '', 'confirm' => ''];
        if ($_POST) {

            $posted_value = postedValues($_POST);
            $validation->check($_POST, [
                'name' => [
                    'display' => 'Name',
                    'required' => true,
                    'min' => 3,
                    'max' => 25
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'users',
                    'max' => 150
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    'required' => true,
                    'matches' => 'password'
                ]
            ]);
            if ($validation->passed()) {
                $newUser = new Users();
                $q = $newUser->registerNewuser($_POST);

                if ($q) {
                    Router::redirect('verification/show');
                } else {
                    $errors = "Something went wrong please try again!!!";
                }
            }
        }
        if ($errors != '') {
            $this->view->displayErros = $errors;
        } else {
            $this->view->displayErrors = $validation->displayErrors();
        }
        $this->view->post = $posted_value;
        $this->view->render('Auth/register');
    }
}
