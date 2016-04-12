<?php

namespace app\modules\administration\controllers;


use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;


class MenuController extends Controller
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


//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['index'],
//                'rules' => [
//                    [
//                        'actions' => ['index'],
//                        'allow' => true,
//                        'roles' => ['admin'],
//                    ],
//                ],
//            ],
////            'verbs' => [
////                'class' => VerbFilter::className(),
////                'actions' => [
////                    'logout' => ['post'],
////                ],
////            ],
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
            $user = Yii::$app->user->identity;

            return $this->render('index', [
                'user' => $user,
            ]);
    }


}
