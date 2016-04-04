<?php

namespace app\controllers;

use app\models\HitForm;
use Yii;
use yii\web\Controller;


class AlkoController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGame()
    {
        $model = New HitForm();
        $session = Yii::$app->session;
        $session->open();

        if ($model->load(Yii::$app->request->post()) && $session->has('player') && $session->has('computer'))
        {
            $hit = Yii::$app->request->post('HitForm');

            $computer = $session->get('computer');
            $player = $session->get('player');

            if (rand(1,3) == intval($hit['hit'])) {
                $player  = $player - intval($hit['hit']);
                $session->set('player', $player);
            }
            else{
                $computer = $computer - intval($hit['hit']);
                $session->set('computer', $computer);
            }

            switch ($player) {
                case 10:
                case 9:
                    $pmessage = "Ты трезв как стеклышко"; break;
                case 8:
                case 7:
                    $pmessage = "Ты слегка выпивший"; break;
                case 6:
                case 5:
                    $pmessage = "Ты шатаешься"; break;
                case 4:
                case 3:
                    $pmessage = "Ты не можешь передвигаться"; break;
                case 2:
                case 1:
                    $pmessage = "Ты на грани поломки"; break;
            }
            switch ($computer) {
                case 10:
                case 9:
                    $cmessage = "Противник трезв как стеклышко"; break;
                case 8:
                case 7:
                    $cmessage = "Противник слегка выпивший"; break;
                case 6:
                case 5:
                    $cmessage = "Противник шатается"; break;
                case 4:
                case 3:
                    $cmessage = "Противник не может передвигаться"; break;
                case 2:
                case 1:
                    $cmessage = "Противник на грани поломки"; break;
            }

            if (($session->get('player')) <= 0 || ($session->get('computer')) <= 0) {
                return Yii::$app->getResponse()->redirect(array('/alko/index', 302));
            }else{
                return $this->render('game', ['player' => $player, 'computer' => $computer, 'model' => $model, 'cmessage' => $cmessage, 'pmessage' => $pmessage]);
            }
        } else
        {
            $session = Yii::$app->session;
            $session->open();

            $c_hp = 10;
            $p_hp = 10;
            $session->set('computer', $c_hp);
            $session->set('player', $p_hp);

            $computer = $session->get('computer');
            $player = $session->get('player');

            return $this->render('game', ['player' => $player, 'computer' => $computer, 'model' => $model]);
        }
    }

    public function actionRules()
    {
        return $this->render('rules');
    }




}
