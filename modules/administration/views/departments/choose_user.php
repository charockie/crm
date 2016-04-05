<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Admin panel', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <p>
        <?= Html::a('Добавить должность', ['add_position', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'surname',
            'phone',
//            ['attribute' => 'name',
//                'content' => function ($data) {
//                    return Html::a(Html::encode(isset($data->name)? $r=$data->name : $r = 'ПУСТО'),
//                        ($r=='ПУСТО')? Url::to(['chooseUser']) : Url::to(['viewUser', 'id' => $data->id]));
//                }],

            ['attribute' => 'Choose',
                'content' => function ($data) {var_dump($data);die;
                    return Html::button(Html::encode(Html::a('Update', ['update', 'id' => $data->depart_id], ['class' => 'btn btn-primary'])));
                }],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
