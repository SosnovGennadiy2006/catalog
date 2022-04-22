<?php

use vendor\core\DB;

require_once "../config/init.php";
require_once CORE . '/Router.php';

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

spl_autoload_register('autoload');
function autoload($className)
{
    $file = ROOT . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
}

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^main$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^index$', ['controller' => 'Main', 'action' => 'index']);

Router::add('^signIn$', ['controller' => 'Authorization', 'action' => 'signIn']);
Router::add('^signUp$', ['controller' => 'Authorization', 'action' => 'signUp']);

Router::add('^registerUser$', ['controller' => 'Authorization', 'action' => 'registerUser']);
Router::add('^signInUer$', ['controller' => 'Authorization', 'action' => 'signInUser']);

Router::add('^xmlhttprequest/users/email/(?P<email_service>[0-9a-zA-Z.]+)/(?P<email>[0-9a-zA-Z\*\$.+-]+)',
    ['controller' => 'AJAX', 'action' => 'userByEmail']);

Router::dispatch($query);