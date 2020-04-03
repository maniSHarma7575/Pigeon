<?php
class Validate
{
    private $_passed = true, $_errors = [], $_db = null;
    public function __construct()
    {
        $this->_db = Database::getInstance();
    }
    public function check($source, $items = [])
    {
        $this->_errors = [];
        foreach ($items as $item => $rules) {
            $item = Input::sanatize($item);
            $display = $rules['display'];
            foreach ($rules as $rule => $rule_value) {
                $value = Input::sanatize(trim($source[$item]));
                if ($rule === "required" && empty($value)) {
                    $this->addError(["{$display} must be minimum of {$rule_value} characters", $item]);
                }
else if($rule==='validEmail' && !filter_var($value,FILTER_VALIDATE_EMAIL))
                {
                    $this->addError(["Please Enter a valid {$display}", $item]);
                }  else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError(["{$display} must be minimum of {$rule_value} characters", $item]);
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError(["{$display} must be maximum of {$rule_value} characters", $item]);
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $matchDisplay = $items[$rule_value]['display'];
                                $this->addError(["{$matchDisplay} and {$display} must match", $item]);
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->query("SELECT {$item} FROM {$rule_value} WHERE {$item}=?", [$value]);
                            if ($check->count()) {
                                $this->addError(["Account  already exists this {$display}", $item]);
                            }
                            break;
                    }
                }
            }
        }
        if (empty($this->_errors)) {
            $this->_passed = true;
        }
        return $this;
    }
    public function addError($error)
    {
        $this->_errors[] = $error;
        if (empty($this->_errors)) {
            $this->_passed = true;
        } else {
            $this->_passed = false;
        }
    }
    public function error()
    {
        return $this->_errors;
    }
    public function passed()
    {
        return $this->_passed;
    }
    public function displayErrors()
    {
        if (!empty($this->_errors)) {
            foreach ($this->_errors as $error) {
                if (is_array($error)) {
                    $html = $error[0];
                } else {
                    $html = $error;
                }
                break;
            }
        } else {
            $html = "";
        }
        return $html;
    }
}
