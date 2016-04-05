<?php
/**
 * Created by PhpStorm.
 * User: Solo
 * Date: 15.03.2016
 * Time: 15:00
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Say hello page';
?>



<div class="site-index">

    <div class="jumbotron">
        <h1>Test form run!</h1>

        <p class="lead">You have successfully created your form.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>
                <?php foreach($users as $user): ?>
                <p><?= Html::encode($message) ?>
                    <?= Html::encode($user->name) ?></p>
                    <ul>
                        <li><label>ID</label>: <?= Html::encode($user->id) ?></li>
                        <li><label>Пароль</label>: <?= Html::encode($user->password) ?></li>
                        <li><label>Ключ аутентификации</label>: <?= Html::encode($user->auth_key) ?></li>
                        <li><label>Знак доступа</label>: <?= Html::encode($user->access_token) ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4">
                <h2>Регалка</h2>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->label('Ваше имя') ?>

                <?= $form->field($model, 'password')->label('Введите пароль') ?>

                <?= $form->field($model, 'auth_key')->label('Введите ключ') ?>

                <?= $form->field($model, 'access_token')->label('Введите знак') ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегатся', ['class' => 'btn btn-primary']) ?>

                    <?= Html::a('Your Link name', ['/site/say'], [
                    'title' => Yii::t('yii', 'Close'),
                    'onclick'=>"$('#close').dialog('open');//for jui dialog in my page
                    $.ajax({
                    type     :'POST',
                    cache    : false,
                    url  : 'controller/action',
                    success  : function(response) {
                    $('#close').html(response);
                    }
                    });return false;",
                    ]);
                    ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-lg-4">
                <input value="Голосовать!" onclick="vote()" type="button" />
                <div id="vote_status">Здесь будет ответ сервера</div>

                <h2>Данные формы</h2>

                <p>Вы ввели следующую информацию:</p>

                <ul>
                    <li><label>Имя</label>: <?= Html::encode($model->name) ?></li>
                    <li><label>Пароль</label>: <?= Html::encode($model->password) ?></li>
                    <li><label>Ключ</label>: <?= Html::encode($model->auth_key) ?></li>
                    <li><label>Знак</label>: <?= Html::encode($model->access_token) ?></li>
                </ul>

            </div>
        </div>

    </div>
</div>
