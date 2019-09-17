<?php


namespace app\controllers;

use app\models\Activity;
use Yii;
use yii\db\Query;
use yii\db\QueryBuilder;
use yii\web\Controller;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
    public function actionIndex()
    {
        $query = new Query();
        $query->select('*')->from('activities');
        $rows = $query->all();

        return $this->render('index', [
            'activities' => $rows
        ]);
    }

    public function actionView($id = 1)
    {
        $db = Yii::$app->db;

        $model = $db->createCommand('select * from activities where id=:id', [
            ':id' => $id
        ])->queryOne();

        return $this->render("view", ["model" => $model]);
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

                $query = new QueryBuilder(Yii::$app->db);
                $params = [];
                echo $query->insert('activities', $model->attributes, $params);

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