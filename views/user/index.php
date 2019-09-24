<?php

use app\models\User;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1>Пользователи</h1>

    <?php
    if (Yii::$app->user->can('admin')) {
        Html::a('Добавить пользователя', '/site/signup', ['class' => 'btn btn-info']);
    }
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],
            'id',
            'username',
            'email:email',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'class' => ActionColumn::class,
                'header' => 'Операции',
            ]
        ],
    ]); ?>
</div>
