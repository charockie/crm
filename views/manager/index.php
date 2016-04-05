<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Вас прветствует файловый менеджер, выберите действие:</h3>
    <a href="<?= Url::toRoute('manager/menu') ?>">Menu</a>



</div>
