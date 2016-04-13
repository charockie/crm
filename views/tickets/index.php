<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


/* @var $this yii\web\View */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <h2>Все заявки</h2>

    <p>
        <?= Html::a('Новая заявка', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="body-content">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                ['attribute' => 'title',
                    'content' => function ($data) {
                        return Html::a(Html::encode($data->title), Url::to(['view', 'id' => $data->id]));
                    }],
                'date',
                'author_name',
//                'depart_id',
//                'user_id',
                'department_title',
                'user_to',
                'status',
//                ['attribute' => '',
//                    'content' => function ($data) {
//                        return Html::button('', ['data-id' => $data->id, 'class' => 'glyphicon glyphicon-trash delete-ticket']);
//                    }],
            ],
        ]); ?>

    </div>
</div>
