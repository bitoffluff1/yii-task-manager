<?php
/**
 * @var yii\web\View $this
 * @var app\models\UserMessage $model
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<?php $form = ActiveForm::begin([
    'action' => '/message/submit'
]) ?>

<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'content')->textarea() ?>

<?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
