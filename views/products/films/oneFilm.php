<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'One film page';
?>

<div class="site-index">

    <ul class="list-unstyled">
        <li><h3><?php echo $film->title; ?></h3></li>
        <li><h4>Описание:</h4><?php echo $film->description; ?></li>
        <li><h4>Дата выхода:</h4><?php echo $film->release; ?></li>
        <li><h4>Продюссер фильма:</h4><?php echo $film->producer; ?></li>
        <li><h4>Цена:</h4><?php echo $film->price; ?> грн</li>
        <li><h4>Длительность:</h4><?php echo $film->duration; ?></li>
    </ul>

    <?= Html::a('Удалить фильм', ['delete_film', 'id' => $film->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>

</div>