<?php

use yii\helpers\Html;

$this->registerJsFile('/js/functions.js', ['depends' => 'yii\web\JqueryAsset']);

$this->title = $model->name.' '.$model->surname;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::button('Удалить', ['data-id' => $model->id, 'class' => 'btn btn-danger', 'id' => 'delete-user']) ?>
    </p>
<hr>

<ul>
    <li>
        Имя: <?= Html::encode($model->name) ?>
    </li>

    <li>
        Фамилия: <?= Html::encode($model->surname) ?>
    </li>

    <li>
        Телефон: <?= Html::encode($model->phone) ?>
    </li>

    <li>Должность: <?= is_null($model->pos_title)? Html::encode('Не назначено') :
            Html::encode($model->pos_title),
            ' ('.Html::a($model->dep_title, ['departments/view', 'id' => $model->dep_id]).')'; ?>
    </li>

    <li>
        Группа: <?= Html::encode($model->group) ?>
    </li>
</ul>





</div>
