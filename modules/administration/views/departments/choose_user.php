<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->registerJsFile('/js/functions.js', ['depends' => 'yii\web\JqueryAsset']);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $_GET['dep_id']]];
$this->params['breadcrumbs'][] = ['label' => 'Выбор сотрудника'];
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Назначте работника на должность: <?= Html::encode($position->title) ?></h4>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'surname',
            'phone',
            [
                'content' => function ($data) {
                    return Html::button('Назначить', [
                        'data-usr_id' => $data->id,
                        'data-dep_id' => $_GET['dep_id'],
                        'data-pos_id' => $_GET['pos_id'],
                        'class' => 'btn btn-primary', 'id' => 'choose-worker']);
            }],
        ],
    ]); ?>


</div>
