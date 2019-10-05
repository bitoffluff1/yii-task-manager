<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="button">
    <div>
        <?= Html::a("Редактировать", ["/user/update", 'id' => $model['id']], ["class" => "btn btn-info"]) ?>
        <?= Html::a("Удалить", ["/user/delete", 'id' => $model['id']], ["class" => "btn btn-info"]) ?>
    </div>
</div>

<h1>Пользователь</h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'email:email',
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>

