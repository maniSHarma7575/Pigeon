<?php
class Router
{
    public static function route($url)
    {
        
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = $action;
        array_shift($url);
        $querey_params = $url;
        if(!in_array($controller_name, controllersStrings(), TRUE))
        {
            Router::redirect('Home/error');
        }
        $dispatch = new $controller($controller_name, $action_name);
        if (method_exists($controller, $action)) {
            call_user_func([$dispatch, $action], $querey_params);
        } else {
           Router::redirect('Home/error');
        }
    }
    public static function redirect($location)
    {
        if (!headers_sent()) {
            header('Location: ' . PROOT . $location);
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . PROOT . $location . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $location . '"/>';
            echo '</noscript>';
        }
    }
}
