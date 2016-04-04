<?php

namespace app\models;

use yii\base\Model;

class HitForm extends Model
{

    public $hit;
    public $hp;

    public function rules()
    {
        return [
            [['hit'], 'required'],
            [['hit'], 'integer' ],
            [['hit'], 'in', 'range' => [1, 2, 3]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'hit' => 'Литраж',
        ];
    }

}
