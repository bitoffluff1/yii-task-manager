<?php

use app\models\Activity;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var  Activity $model
 */
?>

<?php $form = ActiveForm::begin([
    'action' => '/activity/submit',
    'options' => ['enctype' => 'multipart/form-data'],
]) ?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'dayStart')->textInput() ?>
<?= $form->field($model, 'dayEnd')->textInput() ?>
<?= $form->field($model, 'description')->textarea() ?>
<?= $form->field($model, 'repeat')->checkbox() ?>
<?= $form->field($model, 'blocked')->checkbox() ?>
<?= $form->field($model, 'uploadFile[]')->fileInput(['multiple' => 'multiple'])->label('Добавить файл') ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>

