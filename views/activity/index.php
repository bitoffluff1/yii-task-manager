<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var array $activities
 */

?>

<h2>Список событий</h2>
<?= Html::a("Добавить новое событие", "/activity/create", ["class" => "btn btn-info"]) ?>

<ul>
    <?php foreach ($activities as $item) { ?>
        <li>
            <?= var_dump($item); ?>
        </li>
    <?php } ?>
</ul>