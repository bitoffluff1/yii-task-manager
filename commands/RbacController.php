<?php


namespace app\commands;


use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //создаем роль
        $adminRole = $auth->createRole('admin');
        $adminRole->description = 'Super admin';
        //добавляем в бд
        $auth->add($adminRole);

        //привязываем конкртеному пользователю
        $auth->assign($adminRole, 1);
    }
}