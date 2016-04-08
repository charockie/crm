<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Administration';
?>

<div class="site-index">

    <div class="col-md-3 table-bordered">

        <p><span>ID: </span><?= $user->id; ?></p>
        <p><span>Имя: </span><?= $user->name; ?></p>
        <p><span>Фамилия: </span><?= $user->surname; ?></p>
        <p><span>Телефон: </span><?= $user->phone; ?></p>
        <p<span>Привилегии: </span><?= $user->privilege; ?></p>


    </div>

    <div class="col-md-3 table-bordered">
        <h4>Admin panel</h4>
        <ol>
            <li><a href="<?= Url::toRoute('departments/') ?>">Отделы</a></li>
            <li><a href="<?= Url::toRoute('users/') ?>">Пользователи</a></li>
        </ol>
    </div>

    <div class="col-md-6 table-bordered">
        <h4>Other</h4>
        <ol>
            <li><a href="<?= Url::toRoute('#') ?>">asdasdasdasd</a></li>
        </ol>
    </div>

</div>




