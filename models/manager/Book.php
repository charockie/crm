<?php

namespace app\models\manager;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'price', 'producer', 'release', 'pages'], 'required'],
            [['price'], 'integer'],
            [['title'], 'string', 'min' => 2],
            [['description'], 'string', 'min' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'release' => 'Дата выхода',
            'producer' => 'Автор',
            'price' => 'Цена',
            'pages' => 'Количество страниц',
        ];
    }

}