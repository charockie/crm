<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
//var_dump($model->getItemsList());die;

?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'depart_id')->dropDownList(ArrayHelper::merge(['0' => 'пусто'], $model->getAvailableDepartmentsList())) ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::merge(['0' => 'пусто'],$model->getAvailableUsersList( ))) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
