<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);
require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');
session_start();
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
if (!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
    Users::loginUserFromCookie();
}
Router::route($url);
