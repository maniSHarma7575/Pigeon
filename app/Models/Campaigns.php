<?php
class Campaigns extends Model
{
    public function __construct($campaign = '')
    {
        $table = 'campaigns';
        parent::__construct($table);
        if ($campaign != '' && $campaign != 'campaigns') {
            if (is_int($campaign)) {
                $u = $this->_db->findFirst('campaigns', ['conditions' => 'id = ?', 'bind' => [$campaign]]);
            }
            if ($u) {
                foreach ($u as $key => $val) {
                    $this->$key = $val;
                }
            }
        }
    }

    public function findAll($params = [])
    {
        return $this->find($params);
    }
    public function subscriberList()
    {
        $reception = [];
        $subscribers = new Subscribers();
        $subscribersData = $subscribers->findAll(['order' => 'name']);
        foreach ($subscribersData as $subscriber) {
            $reception[] = $subscriber->email;
        }
        return $reception;
    }
    public function registerNewCampaign($params)
    {
        $user = new Users();
        $res = $user->findById($_SESSION[CURRENT_USER_SESSION_NAME]);
        $userEmail = $res->email;
        $params['uemail'] = $userEmail;
        $par = $this->assign($params);
        $this->insert($par);
    }
}
