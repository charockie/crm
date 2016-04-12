<?php

namespace app\models;
use yii\db\ActiveRecord;

use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_USER = 1;
    const ROLE_MODER = 5;
    const ROLE_ADMIN = 10;

    public static function tableName()
    {
        return 'user';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by name
     *
     * @param  string      $name
     * @return static|null
     */
    public static function findByName($name)
    {
        foreach (User::find()->all() as $user) {
            if (strcasecmp($user['name'], $name) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
//
//    /**
//     * @inheritdoc
//     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
//
//    /**
//     * Validates password
//     *
//     * @param  string  $password password to validate
//     * @return boolean if password provided is valid for current user
//     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

}
