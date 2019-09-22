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

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'Порядковый номер',
            'value' => function (Activity $model) {
                return "# {$model->id}";
            }
        ],
        'title',
        [
            'attribute' => 'day_start',
            'format'=> ['date', 'php:' . Yii::$app->params['formatDate']],
        ],
        [
            'attribute' => 'day_end',
            'format'=> ['date', 'php:' . Yii::$app->params['formatDate']],
        ],
        [
            'label' => 'Имя создателя',
            'attribute' => 'user.username',
        ],
        'description',
        'repeat:boolean',
        'blocked:boolean',
    ],
]) ?>