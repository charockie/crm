<?php

use yii\helpers\Html;


$this->title = 'Add worker';
$this->params['breadcrumbs'][] = ['label' => 'Admin panel', 'url' => ['/administration/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formPosition', [
        'model' => $model, 'id' => $id
    ]) ?>

</div>
