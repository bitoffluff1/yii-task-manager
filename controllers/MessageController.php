<?php


namespace app\controllers;


use app\models\UserMessage;
use Yii;
use yii\web\Controller;

class MessageController extends Controller
{
    public function actionIndex()
    {
        $model = new UserMessage();

        return $this->render('index', compact('model'));
    }

    public function actionSubmit()
    {
        $model = new UserMessage();

        $model->load(Yii::$app->request->post());

        if ($model->validate()) {
            return $this->redirect(['/message/result']);
        } else {
            return $this->redirect(['/message/index']);
        }
    }

    public function actionResult()
    {
        return 'OK';
    }
}