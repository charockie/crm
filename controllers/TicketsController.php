<?php

namespace app\controllers;


use app\models\manager\Ticket;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\ActiveDataProvider;
use app\models\manager\Departments;


class TicketsController extends Controller
{


    public function actionIndex()
    {
        $tickets = new Ticket();
        $dataProvider = new ActiveDataProvider([
            'query' => $tickets->getAllTickets(),
            'pagination' => ['pageSize' => 20,],
        ]);
        return $this->render('index', ['tickets' => $tickets, 'dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new Ticket();
        if ($model->load(Yii::$app->request->post())) {
            $model->author = Yii::$app->user->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

    public function actionView($id)
    {
        $ticket = new Ticket();
        $model = $ticket->getTicket($id);
        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id)
    {

        $model = Ticket::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);

        }
    }


}
