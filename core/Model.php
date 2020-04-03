<?php
class Model
{
    protected $_db, $_table, $_modelName, $_columnsName = [], $_softDelete = false;
    public $id;
    public function __construct($table)
    {
        $this->_table = $table;
        $this->_db = Database::getInstance();
        $this->_setTableColumns();
        $this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table)));
    }
    public function _setTableColumns()
    {
        $columns = $this->get_columns();
        foreach ($columns as $column) {
            $columnName = $column->Field;
            $this->_columnsName[] = $column->Field;
            $this->{$columnName} = null;
        }
    }
    public function get_columns()
    {
        return $this->_db->getColumns($this->_table);
    }
    public function find($params = [])
    {
        $results = [];
        $resultQuery = $this->_db->find($this->_table, $params);
        if ($resultQuery) {
            foreach ($resultQuery as $result) {
                $obj = new $this->_modelName($this->_table);
                $obj->populateObjData($result);
                $results[] = $obj;
            }
        }
        return $results;
    }
    public function findFirst($params = [])
    {
        $resultQuery = $this->_db->findFirst($this->_table, $params);
        $result = new $this->_modelName($this->_table);
        if ($resultQuery) {
            $result->populateObjData($resultQuery);
        }
        return $result;
    }
    public function save()
    {
        $fields = [];
        foreach ($this->_columnsName as $column) {
            $fields[$column] = $this->column;
        }
        if (property_exists($this, 'id') && $this->id != '') {
            return $this->update($this->id, $fields);
        } else {
            return $this->insert($fields);
        }
    }
    public function findById($id)
    {
        return $this->findFirst(['conditions' => 'id = ?', 'bind' => [$id]]);
    }
    public function populateObjData($result)
    {
        foreach ($result as $key => $value) {
            $this->$key = $value;
        }
    }
    public function insert($fields)
    {
        if (empty($fields)) return false;
        return $this->_db->insert($this->_table, $fields);
    }
    public function update($id, $fields)
    {
        if (empty($fields) || $id == '') return false;
        return $this->_db->update($this->_table, $id, $fields);
    }
    public function delete($id)
    {
        if ($id == '' && $this->id == '') return false;
        $id = ($id == '') ? $this->id : $id;
        if ($this->_softDelete) {
            return $this->update($id, ['deleted' => 1]);
        }
        return $this->_db->delete($this->_table, $id);
    }
    public function query($sql, $bind = [])
    {
        return $this->_db->query($sql, $bind);
    }
    public function assign($params)
    {
        $fields = [];
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (in_array($key, $this->_columnsName)) {
                    $this->key = sanitize($val);
                    $fields[$key] = sanitize($val);
                }
            }
            return $fields;
        }
        return $fields;
    }
    public function userExists($params = [])
    {
        return $this->_db->_read($this->_table, $params);
    }
    public function updateGoogleUser($params)
    {
        $query = "UPDATE " . $this->_table . " SET email = '" . $params['email'] . "',is_verified = '" . $params['is_verified'] . "', name = '" . $params['name'] . "' WHERE oauth_provider = '" . $params['oauth_provider'] . "' AND oauth_uid = '" . $params['oauth_uid'] . "'";
        $update = $this->_db->query($query);
    }
    public function updatePassword($params)
    {
        $query = "UPDATE " . $this->_table . " SET password = '" . $params['password'] . "' WHERE email = '" . $params['email'] . "'";
        $update = $this->_db->query($query);
    }
	public function updateSubscriber($params)
    {
        $query = "UPDATE " . $this->_table . " SET name = '" . $params['name'] ."', email = '".$params['email']."', category = '".$params['category']."' WHERE email = '" . $params['subemail'] . "'";
        $update = $this->_db->query($query);
        return $update;
    }
}
