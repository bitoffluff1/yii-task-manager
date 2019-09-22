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
?>

<h2>Список событий</h2>
<?= Html::a(
    "Добавить новое событие",
    "/activity/update",
    ["class" => "btn btn-info"]
) ?>


<?= $this->render('myActivities/index', [
    'provider' => $provider,
]) ?>
