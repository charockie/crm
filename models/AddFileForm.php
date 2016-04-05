<?php

namespace app\models;

use yii\base\Model;

class AddFileForm extends Model
{

    public $title;
    public $description;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'match', 'pattern' => '/([0-9a-z]{1,30})\.([0-9a-z]){2,5}/'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'File name',
            'description' => 'Content',
        ];
    }

}
