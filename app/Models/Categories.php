<?php
class Categories extends Model
{
    public function __construct($campaign = '')
    {
        $table = 'categories';
        parent::__construct($table);
    }

    public function findAll($params = [])
    {
        return $this->find($params);
    }
    public function addNewCategory($params)
    {
        $par = $this->assign($params);
        if($this->insert($par))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
   
}

