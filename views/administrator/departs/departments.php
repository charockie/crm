<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = ['label' => 'Admin panel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <p>
        <?= Html::a('Create department', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>




