<?php

use app\models\Activity;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var  ActiveDataProvider $provider
 */

$columns = [
    [
        'class' => SerialColumn::class,
        'header' => 'Псевдо-порядковый номер',
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

<h2>Список событий</h2>
<?= Html::a(
    "Добавить новое событие",
    "/activity/update",
    ["class" => "btn btn-info"]
) ?>

<?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => $columns,
]) ?>
