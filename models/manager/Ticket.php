<?php

namespace app\models\manager;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class Ticket extends ActiveRecord
{
    public $author_name;
    public $department_title;
    public $user_to;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'depart_id', 'user_id'], 'required'],
            [['title'], 'string', 'min' => 2],
            [['description'], 'string', 'min' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'depart_id' => 'Отдел',
            'user_id' => 'Пользователь',
            'department_title' => 'Занимающийся отдел',
            'user_to' => 'Занимающийся пользователь',
            'author_title' => 'Автор тикета',
        ];
    }

    public function getAllTickets()
    {
        return Ticket::find()
            ->leftJoin('user', 'ticket.author=user.id')
            ->leftJoin('user u_to', 'ticket.user_id=u_to.id')
            ->leftJoin('departments', 'ticket.depart_id=departments.id')
            ->addSelect(["ticket.*", "user.name author_name", 'departments.title department_title', 'u_to.name user_to']);
    }

    public function getAvailableDepartmentsList()
    {
        return ArrayHelper::map(Departments::find()->All(), 'id', 'title');
    }

    public function getAvailableUsersList()
    {
        return ArrayHelper::map(User::find()->All(), 'id', 'name');
    }

    public function getTicket($id)
    {
        return Ticket::find()
            ->leftJoin('user', 'ticket.author=user.id')
            ->leftJoin('user u_to', 'ticket.user_id=u_to.id')
            ->leftJoin('departments', 'ticket.depart_id=departments.id')
            ->addSelect(["ticket.*", "user.name author_name", 'departments.title department_title', 'u_to.name user_to'])
            ->where("ticket.id=$id")->one();
    }

}