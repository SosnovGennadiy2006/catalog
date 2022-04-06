<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\Controller;

/**
 * Базовый класс для наследования остальными контроллерами, для того, чтобы не лезть в контроллер ядра
 */
class AppController extends Controller
{
    public function __construct($currentRoute)
    {
        parent::__construct($currentRoute);
        new Main();
    }
}