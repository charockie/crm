<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Manager', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'menu', 'url' => ['menu']];
$url = null;
foreach ($items as $item) {
    if(!empty($item)) {
        $url .= $item . DIRECTORY_SEPARATOR;
        $this->params['breadcrumbs'][] = ['label' => $item, 'url' => Url::to(['menu', 'item' => $url])];
    }
}
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="manager-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Создание/редактирование папки:</h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['value' => $model->title]) ?>

    <div class="form-group">
        <?= Html::submitButton('Edit/Add', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>




