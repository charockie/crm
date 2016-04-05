<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
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

//    public function validatePassword($attribute, $params)
//    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect username or password.');
//            }
//        }
//    }

//    public function login()
//    {
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
//        }
//        return false;
//    }
//
//    public function getUser()
//    {
//        if ($this->_user === false) {
//            $this->_user = User::findByName($this->username);
//        }
//
//        return $this->_user;
//    }
}
