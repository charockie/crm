<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Все фильмы';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <?= Html::a('Новый фильм', ['add_film'], [
        'class' => 'btn btn-success'
    ]) ?>

    <ol>
        <?php foreach($films as $film): ?>
            <div class="col-md-6">
                <hr>
                <li>
                    <ul class="list-unstyled">
                        <li><h3><a href="<?= yii\helpers\Url::toRoute(['products/one_film/', 'id' => $film->id]) ?>"><?php echo $film->title; ?></a></h3></li>
                        <li><h4>Продюссер фильма:</h4><?php echo $film->producer; ?></li>
                        <li><h4>Цена:</h4><?php echo $film->price; ?> грн</li>
                    </ul>
                </li>
            </div>
        <?php endforeach; ?>
    </ol>

</div>