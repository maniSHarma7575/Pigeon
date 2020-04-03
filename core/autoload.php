<?php
spl_autoload_register(function ($className) {
    if (file_exists(ROOT . DS . 'app' . DS . 'Controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'Controllers' . DS . $className . '.php');
    } else if (file_exists(ROOT . DS . 'app' . DS . 'Controllers' . DS . 'Auth' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'Controllers' . DS . 'Auth' . DS . $className . '.php');
    } elseif (file_exists(ROOT . DS . 'app' . DS . 'Models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'Models' . DS . $className . '.php');
    } elseif (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'core' . DS . $className . '.php');
    } elseif (file_exists(ROOT . DS . 'api' . DS . 'PHPMailer' . DS . 'src' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'api' . DS . 'PHPMailer' . DS . 'src' . DS . $className . '.php');
    }
});
