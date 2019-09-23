<?php

use app\models\Activity;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var  Activity $model
 */

$action = $model['id'] ? "/activity/submit?id={$model['id']}" : '/activity/submit';

?>

<?php $form = ActiveForm::begin([]) ?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'day_start')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'day_end')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
<?= $form->field($model, 'repeat')->checkbox() ?>
<?= $form->field($model, 'blocked')->checkbox() ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>