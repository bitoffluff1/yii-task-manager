<?php

use app\models\Activity;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;

/**
 * @var $this yii\web\View
 * @var  ActiveDataProvider $provider
 */

$columns = [
    [
        'class' => SerialColumn::class,
        'header' => '#',
    ],
    'title',
    [
        'attribute' => 'day_start',
        'format' => ['date', 'php:' . Yii::$app->params['formatDate']],
    ],
    [
        'label' => 'Имя создателя',
        'attribute' => 'user_id',
        'value' => function (Activity $model) {
            return $model->user->username;
        }
    ],
    'repeat:boolean',
    'blocked:boolean',
];

if (Yii::$app->user->can('manager')) {
    $columns[] = [
        'class' => ActionColumn::class,
        'header' => 'Операции',
    ];
}
?>


<div>
    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => $columns,
    ]);
    ?>
</div>

