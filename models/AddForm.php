<?php

namespace app\models;

use yii\base\Model;

class AddForm extends Model
{

    public $title;
    public $description;
    public $release;
    public $producer;
    public $price;
    public $pages;

    public function rules()
    {
//        return [
//            [['title', 'description', 'price', 'producer', 'release', 'duration'], 'required'],
//        ];
    }

}
