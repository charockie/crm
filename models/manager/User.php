<?php

namespace app\models\manager;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'password'], 'required'],
            [['price'], 'integer'],
            [['name'], 'string', 'min' => 2],
            [['password'], 'string', 'min' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID_user',
            'name' => 'Имя',
            'password' => 'Password_user',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
        ];
    }

}