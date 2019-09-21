<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var app\models\Activity[] $activities
 */

?>

<h2>Список событий</h2>
<?= Html::a("Добавить новое событие", "/activity/edit", ["class" => "btn btn-info"]) ?>

<ul>
    <?php foreach ($activities as $item) { ?>
        <li>
            <a href="/activity/view?id=<?=$item->id;?>"><?=$item->title;?></a>
        </li>
    <?php } ?>
</ul>