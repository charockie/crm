<?php

namespace app\models;

use yii\base\Model;

class HelloForm extends Model
{

    public $name;
    public $password;
    public $auth_key;
    public $access_token;

    public function rules()
    {
        return [
            [['name', 'password', 'auth_key', 'access_token'], 'required'],
        ];
    }

}
