<?php
/**
 * @var yii\web\View $this
 * @var app\models\Activity $model
 */

use yii\helpers\Html;

?>

    <div class="button">

        <?=
        //эта ссылка не работает, хотя этот url прописан в config
        Html::a("<< Календарь", "/activity/calendar", ["class" => "btn btn-primary"]) ?>
        <div>
            <?= Html::a("Редактировать событие", ["/activity/update", 'id' => $model['id']], ["class" => "btn btn-info"]) ?>
            <?= Html::a("Добавить новое событие", "/activity/update", ["class" => "btn btn-info"]) ?>
        </div>
    </div>

    <h1>Просмотр события</h1>

<?= $this->render('myActivities/view', [
    'model' => $model
]);
?>