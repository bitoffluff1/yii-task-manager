<?php


namespace app\controllers;

use app\models\Activity;
use Yii;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionIndex()
    {
        return "OK";
    }

    public function actionView()
    {
        $activityItem = new Activity();
        $activityItem->title = "День рождение";
        $activityItem->description = "Ире 26 лет!";

        return $this->render("view", ["model" => $activityItem]);
    }

    public function actionCreate()
    {
        $model = new Activity();

        return $this->render('create', ['model' => $model]);
    }

    public function actionSubmit()
    {
        $model = new Activity();

        $model->load(Yii::$app->request->post());

        if ($model->validate()) {
            return $this->redirect(['/activity/result']);
        } else {
            return $this->redirect(['/activity/create']);
        }
    }

    public function actionResult()
    {
        return 'OK';
    }

}