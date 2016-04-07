<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->registerJsFile('/js/functions.js', ['depends' => 'yii\web\JqueryAsset']);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::button('Удалить', ['data-id' => $model->id, 'class' => 'btn btn-danger', 'id' => 'delete-department']) ?>
    </p>
<hr>
    <p>
        <?= Html::a('Добавить должность', ['add_position', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description',
            ['attribute' => 'name',
                'content' => function ($data) {
                    return Html::a(Html::encode(isset($data->name)? $r=$data->name : $r = 'ПУСТО'),
                        ($r=='ПУСТО')? Url::to(['choose_user', 'dep_id' => $data->depart_id, 'pos_id' => $data->id]) : Url::to(['viewUser', 'id' => $data->id]));
                }],
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
