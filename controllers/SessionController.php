<?php


namespace app\controllers;


use Yii;
use yii\web\Controller;

class SessionController extends Controller
{
    public function afterAction($action, $result)
    {
        Yii::$app->session->set("lastPage", Yii::$app->request->getReferrer());

        return parent::afterAction($action, $result);
    }
}