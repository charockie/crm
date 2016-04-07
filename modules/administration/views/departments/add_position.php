<?php

use yii\helpers\Html;


$this->title = 'Добавить должность';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formPosition', [
        'model' => $model, 'id' => $id
    ]) ?>

</div>
