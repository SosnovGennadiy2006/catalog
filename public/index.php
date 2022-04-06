<?php

require_once "../config/init.php";
require_once CORE . '/Router.php';

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

