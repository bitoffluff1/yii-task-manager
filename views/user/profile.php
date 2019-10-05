<?php

use app\models\Activity;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


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
    [
        'class' => ActionColumn::class,
        'header' => 'Операции',
    ],
];
?>

<div class="user-update">

    <h1>Изменить</h1>

    <?php $form = ActiveForm::begin([]); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['value' => '']) ?>
    <?= $form->field($model, 'repeatPassword')->passwordInput(['value' => '']) ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
    ]);
    ?>
</div>
