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
    'action' => '/activity/submit'
]) ?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'dayStart')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'dayEnd')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
<?= $form->field($model, 'repeat')->checkbox() ?>
<?= $form->field($model, 'blocked')->checkbox() ?>
<?= $form->field($model, 'uploadFile[]')->fileInput(['multiple' => 'true'])?>
<?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>

