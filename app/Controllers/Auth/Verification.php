<?php
class Verification extends Controller
{
    private $_user;
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Users');
    }
    public function indexAction()
    {
        if (!isset($_GET['email']) || !isset($_GET['token'])) {
            Router::redirect('home/');
        } else {
            $email = $_GET['email'];
            $token = $_GET['token'];
            $result = $this->UsersModel->findByemail($email);
            if (isset($result->email)) {
                $id = $result->id;
                $fields = [
                    'is_verified' => 1,
                ];
                $this->UsersModel->update($id, $fields);
                Router::redirect('user/login');
            } else {
                Router::redirect('home/');
            }
        }
    }
    public function showAction()
    {
        $this->view->render('Auth/verify');
    }
}
