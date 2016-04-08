<?php

namespace app\models\manager;

use Yii;

class Position extends \yii\db\ActiveRecord
{
    public $name;
    public $user_id;
    public $pos_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'depart_id'], 'required'],
            [['title'], 'string', 'min' => 2],
            [['description'], 'string', 'min' => 10],
            [['depart_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Должность',
            'description' => 'Описание',
            'name' => 'Работник',
            'depart_id' => 'Отдел',
        ];
    }

    public function getAllPositionInDepart($id)
    {
        return Position::find()->leftJoin('user', 'user.position_id=position.id')->addSelect(["*", "user.name", "position.id id", "user.id user_id"])->where("position.depart_id=$id");
    }

    public function getIdsOfDep($id)
    {
        return Position::find()->select('id')->andWhere(['depart_id' => $id])->column();
    }

    public function getPositionFromId($id)
    {
        return $this->findOne($id);
    }

}