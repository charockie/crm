<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


/* @var $this yii\web\View */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <h2>
        <?= $this->title ?>
    </h2>

    <p>
        <?= Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'name',
            'content' => function ($data) {
                                return Html::a(Html::encode($data->name.' '.$data->surname), Url::to(['view', 'id' => $data->id]));
            }],
            'phone',
            'group',
            ['attribute' => 'pos_title',
                'content' => function ($data) {
                    return is_null($data->pos_title)? Html::a('Не назначено', ['departments/', 'id' => $data->dep_id]) :
                        $data->pos_title.' ('.Html::a($data->dep_title, ['departments/view', 'id' => $data->dep_id]).')';
                }],
        ],
    ]); ?>

</div>




