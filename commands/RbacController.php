<?php


namespace app\commands;


use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    /**
     * Инициалзация RBAC ролей
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $userRole = $auth->createRole('user');
        $userRole->description = 'Обычный пользователь';
        $auth->add($userRole);

        $managerRole = $auth->createRole('manager');
        $managerRole->description = 'Менеджер сайта';
        $auth->add($managerRole);
        $auth->addChild($managerRole, $userRole); //менеджер наследуетправа пользователя

        //создаем роль
        $adminRole = $auth->createRole('admin');
        $adminRole->description = 'Администратор сайта';
        //добавляем в бд
        $auth->add($adminRole);
        $auth->addChild($adminRole, $managerRole);

        //привязываем конкртеному пользователю
        $auth->assign($adminRole, 1);
        $auth->assign($managerRole, 2);
        $auth->assign($userRole, 3);
    }
}