<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Walcome to my projects!</h1>

        <p class="lead">Это пример моего кода и творчества</p>

        <p><a class="btn btn-lg btn-default" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>File manager</h2>

                <p>Mini file manager.<br>
                Buttons: add file, add folder, delete(folder, file)</p>

                <p><?= Html::a('Follow to file manager', ['/manager'], ['class' => 'btn btn-success']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Products catalog</h2>

                <p>We can add and delete book and film products</p>

                <p><?= Html::a('Follow to products', ['/products'], ['class' => 'btn btn-success']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>And other</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-success" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
