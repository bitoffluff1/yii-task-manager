<?php
/**
 * @var yii\web\View $this
 * @var app\models\Activity $model
 */

use app\models\Activity;
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

    <div class="button">
        <?= Html::a("<< Календарь", "/", ["class" => "btn btn-primary"]) ?>
        <div>
            <a href="/activity/update?id=<?= $model['id']; ?>" class="btn btn-info">Редактировать событие</a>
            <a href="/activity/update" class="btn btn-info">Добавить новое событие</a>
        </div>
    </div>

    <h1>Просмотр события</h1>

<?= $this->render('myActivities/view', [
    'model' => $model
]);
?>