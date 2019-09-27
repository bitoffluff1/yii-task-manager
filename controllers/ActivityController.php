<?php


namespace app\controllers;

use app\models\Activity;
use app\models\ActivitySearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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

    public function actionCalendar()
    {
        $searchModel = new ActivitySearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('calendar', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView(int $id)
    {
        $cacheKey = "activity_{$id}";

        if (Yii::$app->cache->exists($cacheKey)) {
            $item = Yii::$app->cache->get($cacheKey);
        } else {
            $item = Activity::findOne($id);

            Yii::$app->cache->set($cacheKey, $item);
        }

        if (Yii::$app->user->can('manager') || $item->user_id == Yii::$app->user->id) {
            return $this->render('view', [
                'model' => $item
            ]);
        } else {
            throw new NotFoundHttpException();
        }

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