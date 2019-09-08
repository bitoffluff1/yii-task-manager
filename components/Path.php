<?php


namespace app\components;


use Yii;
use yii\base\Component;

class Path extends Component
{
    public function getPath()
    {
        Yii::$app->session->set('path', $_SERVER['HTTP_REFERER']);

        return Yii::$app->session->get('path', "NOT PATH");
    }


}