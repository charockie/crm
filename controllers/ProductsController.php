<?php

namespace app\controllers;

use app\models\manager\Film;
use app\models\manager\Book;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ProductsController extends Controller
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
        return $this->render('index');
    }

    public function actionBooks()
    {
        $books = Book::find()->all();


        return $this->render('books/books', ['books' => $books]);
    }

    public function actionOne_book($id = null)
    {
        $book = Book::findOne($id);


        return $this->render('books/oneBook', ['book' => $book]);
    }

    public function actionAdd_book()
    {
        $model = new Book();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['products/one_book', 'id' => $model->id]);
        }
        return $this->render('books/addBook', ['model' => $model]);
    }

    public function actionDelete_book($id = NULL)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['products/books']);
    }

    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionFilms()
    {
        $films = Film::find()->all();


        return $this->render('films/films', ['films' => $films]);
    }

    public function actionOne_film($id = null)
    {
        $film = Film::findOne($id);


        return $this->render('films/oneFilm', ['film' => $film]);
    }

    public function actionAdd_film()
    {
        $model = new Film();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['products/one_film', 'id' => $model->id]);
        }
        return $this->render('films/addFilm', ['model' => $model]);
    }

    public function actionDelete_film($id = NULL)
    {
        $this->findModelFilm($id)->delete();

        return $this->redirect(['products/films']);
    }

    protected function findModelFilm($id)
    {
        if (($model = Film::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
