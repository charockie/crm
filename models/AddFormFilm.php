<?php

namespace app\models;

use yii\base\Model;

class AddFormFilm extends Model
{

    public $title;
    public $description;
    public $release;
    public $producer;
    public $price;
    public $duration;

    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required'],
        ];
    }

}
