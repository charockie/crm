<?php

use yii\helpers\Html;


$this->title = 'Update department: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Admin panel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['departments']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
