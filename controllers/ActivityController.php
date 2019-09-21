<?php


namespace app\controllers;

use app\models\Activity;
use Yii;
use yii\db\QueryBuilder;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'create'], //может просматривать только админ
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }*/

    public function actionIndex()
    {
        $query = Activity::find();

        $rows = $query->all();

        return $this->render('index', [
            'activities' => $rows
        ]);
    }

    public function actionView($id)
    {
        $db = Yii::$app->db;

        $model = $db->createCommand('select * from activity where id=:id', [
            ':id' => $id
        ])->queryOne();

        return $this->render("view", [
            "model" => $model
        ]);
    }

    public function actionEdit(int $id = null)
    {
        $item = $id ? Activity::findOne($id) : new Activity();

        return $this->render('edit', [
            'model' => $item
        ]);
    }

    public function actionSubmit(int $id = null)
    {
        $model = $id ? Activity::findOne($id) : new Activity();

        if ($model->load(Yii::$app->request->post())) {
            //$model->uploadFile = UploadedFile::getInstances($model, 'uploadFile');

            if ($model->validate()) {
                $model->save();

                return $this->redirect(['/activity']);
            } else if ($model->hasErrors()) {
                var_dump($model->getErrors());
            }
        }
    }

    public function actionResult()
    {
        return 'OK';
    }

}