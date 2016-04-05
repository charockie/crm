<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Все книги';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <?= Html::a('Новая книга', ['add_book'], [
        'class' => 'btn btn-success'
    ]) ?>

    <ol>
        <?php foreach($books as $book): ?>
            <div class="col-md-6">
                <hr>
                <li>
                    <ul class="list-unstyled">
                        <li><h3><a href="<?= yii\helpers\Url::toRoute(['products/one_book/', 'id' => $book->id]) ?>"><?php echo $book->title; ?></a></h3></li>
                        <li><h4>Автор книги:</h4><?php echo $book->producer; ?></li>
                        <li><h4>Цена:</h4><?php echo $book->price; ?> грн</li>
                    </ul>
                </li>
            </div>
        <?php endforeach; ?>
    </ol>

</div>