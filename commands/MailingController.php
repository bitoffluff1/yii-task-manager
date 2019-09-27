<?php


namespace app\commands;


use app\models\User;
use Yii;
use yii\console\Controller;

class MailingController extends Controller
{

    public function actionIndex(int $id)
    {
        $user = User::findOne($id);

        Yii::$app->mailer->compose()
            ->setFrom('admin@domain.com')
            ->setTo($user->email)
            ->setSubject('Ваши планы на сегодня')
            ->setTextBody('Текст сообщения')
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->setCharset("UTF-8")
            ->send();
    }
}