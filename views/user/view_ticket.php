<?php

use yii\helpers\Html;

$this->registerJsFile('/js/functions.js', ['depends' => 'yii\web\JqueryAsset']);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Приступить к выполнению', ['start', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Выполнено', ['finish', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
<hr>

<ul>
    <li>
        ID: <?= Html::encode($model->id) ?>
    </li>
    <li>
        Заголовок: <?= Html::encode($model->title) ?>
    </li>

    <li>
        Описание: <?= Html::encode($model->description) ?>
    </li>

    <li>
        Для отдела: <?= Html::encode($model->department_title) ?>
    </li>

    <li>
        Для пользователя: <?= Html::encode(is_null($model->user_to)? 'пусто' : $model->user_to) ?>
    </li>

    <li>
        Автор: <?= Html::encode($model->author_name) ?>
    </li>

    <li>
        Дата создания: <?= Html::encode($model->date) ?>
    </li>

    <li>
        Статус заявки: <?= Html::encode($model->status) ?>
    </li>

</ul>





</div>
