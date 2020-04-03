<?php
class Campaign extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('dashboardLayout');
        $this->load_model('Campaigns');
    }
    public function indexAction()
    {
        if (!Session::exists(CURRENT_USER_SESSION_NAME)) {
            Router::redirect('');
        }
        $campaigns = $this->CampaignsModel->findAll(['order' => 'sent_at']);
        $this->view->campaigns = $campaigns;
        $this->view->render('Campaigns/index');
    }
    public function launchAction()
    {
        if (!Session::exists(CURRENT_USER_SESSION_NAME)) {
            Router::redirect('');
        }
        $errors = '';
        $serviceType = $_GET['service'];
        $validation = new Validate();
        $posted_value = ['name' => '', 'subject' => '', 'body' => ''];
        if ($_POST) {
            $posted_value = postedValues($_POST);
            $validation->check($_POST, [
                'name' => [
                    'display' => 'Name',
                    'required' => true,
                    'min' => 3,
                    'max' => 50
                ],
                'subject' => [
                    'display' => 'Subject Line',
                    'required' => true,
                    'max' => 150
                ],
                'body' => [
                    'display' => 'Description',
                    'required' => true,
                    'max' => 1500,
                    'min' => 3

                ]
            ]);
            $name_of_uploaded_file =
                basename($_FILES['uploaded_file']['name']);
            $type_of_uploaded_file =
                substr(
                    $name_of_uploaded_file,
                    strrpos($name_of_uploaded_file, '.') + 1
                );

            $size_of_uploaded_file =
                $_FILES["uploaded_file"]["size"] / 1024;
            $max_allowed_file_size = 2049;
            $allowed_extensions = array("jpg", "jpeg", "gif", "bmp", "pdf", "zip", "docx", "png");
            if ($name_of_uploaded_file != '') {
                $errors .= documentValidation($size_of_uploaded_file, $max_allowed_file_size, $allowed_extensions, $type_of_uploaded_file);
            }
            if ($validation->passed() && $errors == '') {
                $upload_folder = "/var/www/html/public/campaignDocument/";
                $path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
                $tmp_path = $_FILES["uploaded_file"]["tmp_name"];
                if (is_uploaded_file($tmp_path)) {
                    mkdir(dirname($path_of_uploaded_file), 0777, true);
                    // move_uploaded_file($tmp_path.'/'.$name_of_uploaded_file,$path_of_uploaded_file);
                    if (!copy($tmp_path, $path_of_uploaded_file)) {
                        $errors .= 'Error while copying the uploaded file';
                    }
                } else if ($name_of_uploaded_file != '') {
                    $errors .= 'Something went wrong please try again latter';
                }
		$reception = $this->CampaignsModel->subscriberList();
                if(empty($reception))
                {
                    $errors='No';
                }
                if ($errors == '') {
                  //  $reception = $this->CampaignsModel->subscriberList();
                    $subject = $posted_value['subject'];
                    $name = $posted_value['name'];
                    $body = $posted_value['body'];
                    $email = Session::get('email');

                    if ($serviceType == 'smtp') {
                        $m = Mail::getInstance(SMTP_HOST, SMTPUSERNAME, SMTPPASSWORD, SMTPSECURE, SMTPPORT);
                    } else if ($serviceType == 'amazonses') {
                        $m = Mail::getInstance(SES_HOST, SESUSERNAME, SESPPASSWORD, SESSECURE, SESPORT);
                    }
                    if ($name_of_uploaded_file != '') {
                        $link = $path_of_uploaded_file;
                        $_POST['attachment'] = $path_of_uploaded_file;
                    } else {
                        $link = '';
                    }
                    $result = $m->send($reception, $email, $name, $subject, $body, $link);
                    if ($result) {
                        $this->CampaignsModel->registerNewCampaign($_POST);
                        Router::redirect('campaign/');
                    }
                }
            }
        }
        if ($errors != '') {
            $this->view->displayErrors = $errors;
        } else {
            $this->view->displayErrors = $validation->displayErrors();
        }
        $this->view->post = $posted_value;
        $this->view->render('Campaigns/create');
    }
}
