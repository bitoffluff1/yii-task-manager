<?php


namespace app\commands;

use app\models\User;
use yii\console\Controller;

/**
 * Class AppController
 * Управление данными на начальном этапе
 * @package app\commands
 *
 */
class AppController extends Controller
{
    public function actionUsers()
    {
        $admin = new User([
            'username' => 'admin',
            'email' => 'a@mail.ru',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $admin->generateAuthKey();
        $admin->password = '123123';

        $admin->save();
    }


}