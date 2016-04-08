<?php

namespace app\modules\administration\controllers;


use app\models\manager\User;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

class UsersController extends Controller
{

//    public function beforeAction($action)
//    {
//        if (parent::beforeAction($action)) {
//            if (!\Yii::$app->user->can($action->id)) {
//                throw new ForbiddenHttpException('Доступ запрещен!');
//            }
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

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
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)){
            $users = new User;
            $users = $users->getUsersWithPosition();

            $dataProvider = new ActiveDataProvider([
                'query' => $users,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('users', ['dataProvider' => $dataProvider]);
        }
        return $this->redirect('index.php');
    }

    public function actionCreate()
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $model = new User();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect('index.php');
    }

    public function actionView($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $model = new User();
            $model = $model->getUserById($id);
            return $this->render('view', ['model' => $model]);
        }
        return $this->redirect('index.php');
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)){
            $model = new User();
            $model = $model->getUserById($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect('index.php');
    }

 //jquery POST/ajax
    public function actionDelete_user()
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            if(Yii::$app->request->post('id') && User::findOne(Yii::$app->request->post('id'))->delete()){
                return true;
            }
            return $this->redirect(['index']);
        }
        return $this->redirect('index.php');
    }

}

//use yii\helpers\VarDumper;
//VarDumper::dump($this, 10, true);