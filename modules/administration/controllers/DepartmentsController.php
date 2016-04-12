<?php

namespace app\modules\administration\controllers;


use app\models\manager\Departments;
use app\models\manager\Position;
use app\models\manager\User;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;

class DepartmentsController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity->group == 'admin') {
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }




    public function actionIndex()
    {
        $departs = new Departments();
        $dataProvider = new ActiveDataProvider([
            'query' => $departs->getAllDepartments(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('departments', [
            'departs' => $departs, 'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Departments();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = $this->findModel($id)->findOne($id);
        $positions = new Position();
        $data = $positions->getAllPositionInDepart($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $data,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('view', [
            'model' => $model, 'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id)->findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);

        }
    }

    //jquery POST/ajax
    public function actionDelete_department()
    {
        if(Yii::$app->request->post('id') && Departments::findOne(Yii::$app->request->post('id'))->delete()){
            $position = new Position();
            $ids = $position->getIdsOfDep(Yii::$app->request->post('id'));
            Position::deleteAll(['id' => $ids]);

            \app\models\User::updateAll(['position_id' => 0], ['position_id' => $ids]);
            return true;
        }
        return $this->redirect(['index']);
    }

    public function actionDelete_position()
    {
        if(Yii::$app->request->post('id') && Position::findOne(Yii::$app->request->post('id'))->delete()){
            \app\models\User::updateAll(['position_id' => 0], ['position_id' => Yii::$app->request->post('id')]);
            return true;
        }
        return $this->redirect(['index']);
    }

    public function actionAdd_position($id)
    {
        $model = new Position();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('add_position', [
                'model' => $model, 'id' => $id,
            ]);
        }
    }

    public function actionChoose_user($dep_id, $pos_id)
    {
        $model = $this->findModel($dep_id)->findOne($dep_id);
        $position = new Position();
        $position->getPositionFromId($pos_id);
        $data = new User();
        $data = $data->getNotWorkingUser();

        $dataProvider = new ActiveDataProvider([
            'query' => $data,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('choose_user', [
            'model' => $model, 'dataProvider' => $dataProvider, 'position' => $position,
        ]);
    }

    public function actionChoose()
    {
        if($model = \app\models\User::findOne(Yii::$app->request->post('usr_id'))) {
            if ($model->position_id == 0) {
                $model->position_id = Yii::$app->request->post('pos_id');
                $model->save();
                return Yii::$app->request->post('dep_id');
            }
        }
        return Yii::$app->request->post('dep_id');
    }

    protected function findModel($id)
    {
        if (($model = Departments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
