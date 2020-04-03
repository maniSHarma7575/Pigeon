<?php
class Dashboard extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('dashboardLayout');
    }
    public function indexAction()
    {
        if (!Session::exists(CURRENT_USER_SESSION_NAME)) {
            Router::redirect('');
        }
        $subscriber = new Subscribers();
        $resSub = $subscriber->findAll();
        $this->view->subCount = count($resSub);
        $this->view->subscribers = $resSub;
        $campaign = new Campaigns();
        $resCamp = $campaign->findAll();
        $this->view->campCount = count($resCamp);
        $this->view->campaigns = $resCamp;
        $this->view->render('Dashboard/app');
    }
}
