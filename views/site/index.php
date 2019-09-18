<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
var_dump(Yii::$app->user);
?>
<div class="site-index">
    <?= Yii::$app->session->get("lastPage", "NOT PATH")?>

    <div class="jumbotron">
        <h1>Yii2 Calendar</h1>

        <p class="lead">Приложение для управления событиями</p>
    </div>

</div>
