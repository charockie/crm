<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Game';
?>

<h1>Игра началась</h1>
<div class="site-index">

    <div class="col-md-5"

    <h4><?= isset($message) ? '<p class="alert-danger">'.Html::encode($message).'</p>' : '<p class="alert-success">Выберите число от 1 до 3</p>' ?></h4>

    <h3>Здоровье</h3>
    <ul class="list-inline">
        <li>Ты: <?= Html::encode($player) ?> HP; <p class="alert-danger"><?= isset($pmessage) ? Html::encode($pmessage).';' : '' ?></p></li>
        <li>Алкоголик: <?= Html::encode($computer) ?> HP; <p class="alert-danger"><?= isset($cmessage) ? Html::encode($cmessage).';' : '' ?></p></li>
    </ul>

    <div class="alko-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'hit')->textInput(['type' => 'number']) ?>

        <div class="form-group">
            <?= Html::submitButton('Выпьем!', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<div class="col-md-7">
<!--    <img src="http://geekcity.ru/wp-content/uploads/2013/04/iron_man_demon_in-the-bottle.jpg">-->
</div>

</div>