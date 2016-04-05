<?php

namespace app\modules\administration\controllers;


use Yii;
use yii\web\Controller;


class MenuController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
//        ];
//    }
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


}
