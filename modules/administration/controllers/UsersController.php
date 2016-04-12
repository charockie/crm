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

    public function behaviors()
    {
        return [
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

    public function actionCreate()
    {
        $model = new User();
        var_dump(Yii::$app->request->post());
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
        $model = new User();
        $model = $model->getUserById($id);
        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
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

    //jquery POST/ajax
    public function actionDelete_user()
    {
        if (Yii::$app->request->post('id') && User::findOne(Yii::$app->request->post('id'))->delete()) {
            return true;
        }
        return $this->redirect(['index']);
    }

    //jquery POST/ajax
    public function actionFree_user()
    {
        if (Yii::$app->request->post('id') && \app\models\User::updateAll(['position_id' => 0], ['id' => Yii::$app->request->post('id')])) {
            return true;
        }
        return $this->redirect(['index']);
    }

}
