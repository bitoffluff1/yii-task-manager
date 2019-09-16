<?php
/**
 * @var yii\web\View $this
 * @var app\models\Activity $model
 */

use yii\helpers\Html;

$this->registerCssFile("@web/css/activity.css");
?>

<div class="button">
    <?= Html::a("<< Календарь", "/", ["class" => "btn btn-primary"]) ?>
    <div>
        <?= Html::a("Редактировать событие", "/", ["class" => "btn btn-info"]) ?>
        <?= Html::a("Добавить новое событие", "/activity/create", ["class" => "btn btn-info"]) ?>
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