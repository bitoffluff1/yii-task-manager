<?php


namespace app\controllers;

use app\models\Activity;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        $activityItem = new Activity([
            'title' => 'День рождение',
            'description' => 'Ире 26 лет!',
            'dayStart' => '15.09.2019',
            'dayEnd' => '16.09.2019'
        ]);

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

        if ($model->load(Yii::$app->request->post())) {
            $model->uploadFile = UploadedFile::getInstances($model, 'uploadFile');

            if ($model->validate()) {
                return $this->redirect(['/activity/result']);
            } else {
                var_dump($model);
                exit;
            }
        } else {
            var_dump($model);
            exit;
        }
    }

    public function actionResult()
    {
        return 'OK';
    }

}