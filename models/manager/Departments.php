<?php

namespace app\models\manager;

use Yii;

class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'min' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID отдела',
            'title' => 'Название',
        ];
    }

    public function getAllDepartments()
    {
        return $this->find();
    }


}