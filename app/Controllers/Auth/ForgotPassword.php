<?php
class ForgotPassword extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Users');
    }
    public function verifyAction()
    {
        if (isset($_GET['emailmodel'])) {
            $email = strip_tags($_GET['emailmodel']);
            $user = $this->UsersModel->findByEmail($email);
            if ($user->email != "") {
                $m = Mail::getInstance(SMTP_HOST, SMTPUSERNAME, SMTPPASSWORD, SMTPSECURE, SMTPPORT);
                $result = $m->sendVerification($user->name, $user->email, $user->token, "reset");
                if (!$result) {
                    $status = 'no';
                } else {
                    $status = 'ok';
                }
            } else {
                $status = "noac";
            }
            $this->view->displayErrors = $status;
            $this->view->render('Auth/login');
        } else {
            $this->view->render('Home/index');
        }
    }
    public function resetAction()
    {
        if (Session::exists(CURRENT_USER_SESSION_NAME)) {
            Router::redirect('Dashboard/');
        }
        $errors = '';
        if ($_POST) {
            $validation = new Validate();
            $validation->check($_POST, [
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
                $email = strip_tags($_GET['email']);
                $passcode = $_GET['token'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $user = $this->UsersModel->findByEmail($email);
                if ($user && $user->token === $passcode) {
                    $params = [
                        'email' => $email,
                        'password' => $password

                    ];
                    $this->UsersModel->updatePassword($params);
                    $errors = "no";
                } else {
                    $errors = 'Something went wrong! Please try again';
                }
            }
            if ($errors != '') {
                $this->view->displayErrors = $errors;
            } else {
                $this->view->displayErrors = $validation->displayErrors();
            }
        }
        $this->view->render('Auth/Password/reset');
    }
}
