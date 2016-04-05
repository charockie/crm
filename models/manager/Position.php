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

}