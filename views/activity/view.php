<?php
/**
 * @var yii\web\View $this
 * @var app\models\Activity $model
 */

use yii\helpers\Html;

?>

<div class="button">
    <?= Html::a("<< Календарь", "/", ["class" => "btn btn-primary"]) ?>
    <div>
        <a href="/activity/create?id=<?= $model['id']; ?>" class="btn btn-info">Редактировать событие</a>
        <a href="/activity/create" class="btn btn-info">Добавить новое событие</a>
    </div>
</div>

<h1>Просмотр события</h1>

<div class="row">
    <ul class="list-group col-md-6">
        <?php
        foreach ($model as $attribute => $value) {
            echo <<<php
<li class="list-group-item my-list">
    <h4>{$attribute}</h4>
    <span class="text-muted">{$value}</span>
</li>
php;
        }
        ?>
    </ul>
</div>