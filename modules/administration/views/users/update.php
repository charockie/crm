<?php

use yii\helpers\Html;


$this->title = 'Редактирование профиля: ' . ' ' . $model->name.' '.$model->surname;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name.' '.$model->surname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
