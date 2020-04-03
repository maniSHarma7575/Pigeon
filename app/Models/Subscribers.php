<?php
class Subscribers extends Model
{
    public function __construct($subsciber = '')
    {
        $table = 'subscribers';
        parent::__construct($table);
        if ($subsciber != '' && $subsciber != 'subscribers') {
            if (is_int($subsciber)) {
                $u = $this->_db->findFirst('subscribers', ['conditions' => 'id = ?', 'bind' => [$subsciber]]);
            } else {
                $u = $this->_db->findFirst('subscribers', ['conditions' => 'email = ?', 'bind' => [$subsciber]]);
            }
            if ($u) {
                foreach ($u as $key => $val) {
                    $this->$key = $val;
                }
            }
        }
    }
    public function registerNewSubscriber($params)
    {
        $par = $this->assign($params);
        $this->insert($par);
    }
    public function findAll($params = [])
    {
        return $this->find($params);
    }
    public function deleteSubscriber($params)
    {
        $result = $this->findByEmail($params);
        if (isset($result->id)) {
            $res = $this->delete($result->id);
            return $res;
        } else {
            return false;
        }
    }
    public function findByEmail($email)
    {
        return $this->findFirst(['conditions' => 'email= ?', 'bind' => [$email]]);
    }
 public function editSubscriber($params)
    {
        $par = $this->assign($params);
        $par['subemail']=$params['subemail'];
        return $this->updateSubscriber($par);
    }
}
