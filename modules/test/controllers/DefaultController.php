<?php

namespace app\modules\test\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->seo->registerTitle('Modules test');

        return $this->render('index');
    }
}
