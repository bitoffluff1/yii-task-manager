<?php


namespace app\controllers;

use app\models\Activity;
use Yii;
use yii\data\ActiveDataProvider;
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
        $provider = new ActiveDataProvider([
            'query' => Activity::find(),
        ]);

        return $this->render('index', [
            'provider' => $provider,
        ]);
    }

    public function actionView(int $id)
    {
        $item = Activity::findOne($id);

        return $this->render('view', [
            'model' => $item
        ]);
    }

    public function actionUpdate(int $id = null)
    {
        $item = $id ? Activity::findOne($id) : new Activity();

        return $this->render('update', [
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