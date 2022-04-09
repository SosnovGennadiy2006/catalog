<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\View;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
    }

    /**
     *Метод для подключения вида и шаблона (вызывается в dispatch() Router)
     */
    public function getView()
    {
        $vObj = new View($this->currentRoute, $this->layout, $this->view);
        $vObj->setMeta("<link href=\"https://fonts.googleapis.com/css?family=Cuprum\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/public/styles/font-awesome.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/base.css?v=".time()."\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/main.css?v=".time()."\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/header.css?v=".time()."\" type=\"text/css\">
    <title>Main page</title>");
        $vObj->render($this->data);
    }
}