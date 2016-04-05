<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Manager', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => [$this->title]];
$url = NULL;
foreach ($items as $item) {
    if(!empty($item)) {
        $url .= $item . DIRECTORY_SEPARATOR;
        $this->params['breadcrumbs'][] = ['label' => $item, 'url' => Url::to(['menu', 'item' => $url])];
    }
}
is_null($url)?  : $url = substr($url, 0, -1);
?>
<div class="manager-index">


    <?= Html::a('Новый документ', ['new', 'item' => $url], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Новый каталог', ['new_catalog', 'item' => $url], ['class' => 'btn btn-success']) ?>

    <h3>Список всех файлов и каталогов:</h3>
    <ul>
        <ul class="list-unstyled">
        <?php ($catalog === null) ? $catalog = '<p class="bg-danger">Папка пуста</p>' : $menu = $catalog;
        echo $catalog; ?>
        </ul>
    </ul>



</div>
