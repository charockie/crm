<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


/* @var $this yii\web\View */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = ['label' => 'Admin panel', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <h2>
        <?= $this->title ?>
    </h2>

    <p>
        <?= Html::a('Создать новый отдел', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'title',
            'content' => function ($data) {
                return Html::a(Html::encode($data->title), Url::to(['view', 'id' => $data->id]));
            }],
            'id',
        ],
    ]); ?>

</div>




