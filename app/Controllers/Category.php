<?php
class Category extends Controller
{
  public function __construct($controller, $action)
  {
    parent::__construct($controller, $action);
    $this->load_model('Categories');
    $this->view->setLayout('dashboardLayout');
  }
  public function indexAction()
  {
    if (!Session::exists(CURRENT_USER_SESSION_NAME)) {
      Router::redirect('');
    }
    else
    {
      Router::redirect('Dashboard/');
    }

  }
  public function addAction()
  {

    if (!Session::exists(CURRENT_USER_SESSION_NAME)) {
      Router::redirect('');
    }
    $validation = new Validate();
    if ($_POST) {
      $_POST['name'] = $_POST['category'];
      $validation->check($_POST, [
        'name' => [
          'display' => 'Category',
          'required' => true,
          'min' => 3,
          'max' => 25,
          'unique' => 'categories',
        ],
      ]);
      if ($validation->passed()) {
        $newCategory = $this->CategoriesModel;
        $result = $newCategory->addNewCategory($_POST);
        $status = "ok";
        echo $status;
        die;
      }
    }
    $status = $validation->displayErrors();
    echo $status;
    die;
  }
}

