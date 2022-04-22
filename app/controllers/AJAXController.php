<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\View;
use vendor\core\DB;

class AJAXController extends AppController
{
    public function userByEmailAction()
    {
        // подключаемся к базе
        $db = DB::instance();
        print_r($db);

        $email = $this->currentRoute['email'] . '@' . $this->currentRoute['email_service'];

        $stn = $db->prepare("SELECT id FROM `users` WHERE `email`='$email'");
        $stn->execute();
        $my_row = $stn->fetch();
        if (!empty($my_row['id'])) {
            print_r('FALSE');
        }else
        {
            print_r('TRUE');
        }
    }
}