<?php

namespace app\controllers;

use app\models\manager\Departments;
use app\models\manager\Position;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


class DepartsController extends AdministratorController
{
    public function actionDepartments()
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)){
            $departs = Departments::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $departs,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('departments', [
                'departs' => $departs, 'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect('index.php');
    }
}