<?php

namespace app\controllers;


use app\models\manager\Ticket;
use app\models\manager\User;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;


class UserController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity->group == 'moderator' || Yii::$app->user->identity->group == 'admin' || Yii::$app->user->identity->group == 'user') {
            if (parent::beforeAction($action)) {
                if (!\Yii::$app->user->can($action->id)) {
                    throw new ForbiddenHttpException('Доступ запрещен!');
                }
                return true;
            } else {
                return false;
            }
        }
        throw new ForbiddenHttpException('Доступ запрещен!');
    }

    public function actionIndex()
    {
        $user = new User();
        $user = $user->getUserById(\Yii::$app->user->id);

        $data = new Ticket();
        $dataProvider = new ActiveDataProvider([
            'query' => $data->getTicketsForUser(\Yii::$app->user->id),
            'pagination' => ['pageSize' => 20,],
        ]);

        return $this->render('index', ['model' => $user,  'dataProvider' => $dataProvider]);
    }

    public function actionView_ticket($id)
    {
        $ticket = new Ticket();
        $model = $ticket->getTicket($id);
        return $this->render('view_ticket', ['model' => $model]);
    }

    public function actionStart($id)
    {
        $model = Ticket::findOne($id);
        if($model->status == 0) {
            $model->status = 1;
            $model->start_date = (new \DateTime())->format('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view_ticket', 'id' => $model->id]);
        }
        throw new ForbiddenHttpException('Задание выполняется или уже выполнено!');
    }

    public function actionFinish($id)
    {
        $model = Ticket::findOne($id);
        if($model->status == 1){
            $model->status = 2;
            $model->finish_date = (new \DateTime())->format('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['index']);
        }
        throw new ForbiddenHttpException('Задание не выполняется или уже выполнено!');
    }

}
