<?php

namespace app\models;

use Yii;
use yii\base\Model;

class DepartForm extends Model
{
    public $title;

    public function rules()
    {
        return [
            [['title'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Title of new department',
        ];
    }

}
