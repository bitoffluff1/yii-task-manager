<?php


namespace app\controllers;

use app\models\Activity;
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
        $activityItem->title = "New activity heading";

        return $this->render("view", ["model" => $activityItem]);
    }

    public function actionCreate()
    {
        //создание
    }

}