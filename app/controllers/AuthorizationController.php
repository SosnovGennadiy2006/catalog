<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\View;

class AuthorizationController extends AppController
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
    <link rel=\"stylesheet\" href=\"/public/styles/authorization.css?v=".time()."\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/base.css?v=".time()."\" type=\"text/css\">
    <script src=\"/public/scripts/authorization.js?v=".time()."\" defer></script>
    <title>Authorization</title>");
        $vObj->render($this->data);
    }
}