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
    public $pos_title;
    public $pos_id;

    public $dep_title;
    public $dep_id;
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
            [['name', 'surname', 'phone', 'password'], 'required'],
            [['name'], 'string', 'min' => 2],
            [['surname'], 'string', 'min' => 2],
            [['password'], 'string', 'min' => 5],
            [['phone'], 'string', 'length' => 10],
//            [['hit'], 'in', 'range' => [10],
            [['phone'], 'string', 'length' => 10],
            [['group'], 'integer', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'pos_title' => 'Должностьссия',
        ];
    }

    public function getUsersWithPosition()
    {
       return $this->find()
            ->leftJoin('position', 'user.position_id=position.id')
            ->leftJoin('departments', 'departments.id=position.depart_id')
            ->addSelect(["user.*", "position.title pos_title", "position.id pos_id", "departments.id dep_id", "departments.title dep_title"]);
    }

    public function getUserById($id)
    {
        return $this->find()
            ->leftJoin('position', 'user.position_id=position.id')
            ->leftJoin('departments', 'departments.id=position.depart_id')
            ->addSelect(["user.*", "position.title pos_title", "departments.title dep_title", "departments.id dep_id"])
            ->where("user.id=$id")
            ->one();
    }

    public function getNotWorkingUser()
    {
        return $this->find()->where("position_id = '0'");
    }

}