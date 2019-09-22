<?php

use app\models\Activity;
use yii\widgets\DetailView;

?>
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
