<?php

namespace app\models;

use yii\base\Model;

class AddFolderForm extends Model
{

    public $title;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'match', 'pattern' => '/([0-9a-z]{1,30})/'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Folder name',
        ];
    }

}
