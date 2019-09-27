<?php

use app\models\Activity;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;

?>

<h2>События на день</h2>

<?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
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
        [
            'class' => ActionColumn::class,
            'header' => 'Операции',
        ],
    ],
]);
?>
