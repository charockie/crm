<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Add new book';
//$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>