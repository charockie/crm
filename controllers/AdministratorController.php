<?php

namespace app\controllers;


use app\models\manager\Departments;
use app\models\manager\Position;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


class AdministratorController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)){
            $user = Yii::$app->user->identity;

            return $this->render('index', [
            'user' => $user,
        ]);
        }
        return $this->redirect('index.php');
    }

//    public function actionDepartments()
//    {
//        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)){
//            $departs = Departments::find();
//            $dataProvider = new ActiveDataProvider([
//                'query' => $departs,
//                'pagination' => [
//                    'pageSize' => 20,
//                ],
//            ]);
//            return $this->render('departs/departments', [
//                'departs' => $departs, 'dataProvider' => $dataProvider,
//            ]);
//        }
//        return $this->redirect('index.php');
//    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)){

            $model = $this->findModel($id)->findOne($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('departs/update', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect('index.php');
    }

    public function actionView($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $model = $this->findModel($id)->findOne($id);

            $departs = Position::find()->leftJoin('user', 'user.position_id=position.id')->addSelect(["*", "user.name"]);
            $dataProvider = new ActiveDataProvider([
                'query' => $departs,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
//            var_dump($dataProvider);die;

            return $this->render('departs/view', [
                'model' => $model, 'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect('index.php');
    }

    public function actionCreate()
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $model = new Departments();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('departs/create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect('index.php');
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $this->findModel($id)->delete();

            return $this->redirect(['departments']);
        }
        return $this->redirect('index.php');
    }

    protected function findModel($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            if (($model = Departments::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        return $this->redirect('index.php');
    }

}
