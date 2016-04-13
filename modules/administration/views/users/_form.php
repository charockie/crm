<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['minlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['minlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['minlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['length' => true, 'type' => 'tel']) ?>

    <?= $form->field($model, 'group')->dropDownList(['guest' => 'guest', 'admin' => 'admin', 'moderator' => 'moderator', 'user' => 'user']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
