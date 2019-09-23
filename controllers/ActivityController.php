<?php


namespace app\controllers;

use app\models\Activity;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\QueryBuilder;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'update', 'delete', 'submit'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Activity::find();

        if (!Yii::$app->user->can('admin')) {
            $query->andWhere(['user_id' => Yii::$app->user->id]);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
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

        if ($item->load(Yii::$app->request->post()) && $item->validate()) {
            if ($item->save()) {
                return $this->redirect(['/activity']);
            }
        } else {
            return $this->render('update', [
                'model' => $item
            ]);
        }
    }


}