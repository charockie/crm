<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'One book page';
?>

<div class="site-index">

    <ul class="list-unstyled">
        <li><h3><?php echo $book->title; ?></h3></li>
        <li><h4>Описание:</h4><?php echo $book->description; ?></li>
        <li><h4>Дата выхода:</h4><?php echo $book->release; ?></li>
        <li><h4>Автор книги:</h4><?php echo $book->producer; ?></li>
        <li><h4>Цена:</h4><?php echo $book->price; ?> грн</li>
        <li><h4>Страниц:</h4><?php echo $book->pages; ?></li>
    </ul>

    <?= Html::a('Удалить книгу', ['delete_book', 'id' => $book->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>

</div>