<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>

    <ul>
        <li>
            ID: <?= Html::encode($model->id) ?>
        </li>
        <li>
            Имя: <?= Html::encode($model->name) ?>
        </li>

        <li>
            Фамилия: <?= Html::encode($model->surname) ?>
        </li>

        <li>
            Телефон: <?= Html::encode($model->phone) ?>
        </li>

        <li>
            Рабочее место: <?= Html::encode(is_null($model->pos_title)? 'пусто' : $model->pos_title) ?>
        </li>

        <li>
            Группа: <?= Html::encode($model->group) ?>
        </li>
    </ul>


    <h4>Ваши тикеты</h4>

    <hr>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'title',
                'content' => function ($data) {
                    return Html::a(Html::encode($data->title), Url::to(['view_ticket', 'id' => $data->id]));
                }],
            'date',
            'author_name',
            'status',
        ],
    ]); ?>





</div>
