<?php

namespace app\controllers;

use app\models\services\Catalog;
use app\models\AddFolderForm;
use app\models\AddFileForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ManagerController extends Controller
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

    private function gerRoot($item = NULL)
    {
        $root = dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'manager'.DIRECTORY_SEPARATOR;
        ($item === null) ? $rootDir = $root : $rootDir = $root.$item;
        return $rootDir;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMenu($item = null)
    {
        $root = dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'manager'.DIRECTORY_SEPARATOR;
        ($item === null) ? $rootDir = $root : $rootDir = $root.$item;

        $model = New AddFileForm();
        if (is_dir($rootDir)) {
//            Открытие каталога
            $catalog = new Catalog();

            $items = explode('\\', $item);

            $model->title = 'menu';
//            $way = $catalog->getWay($items);
            $result = $catalog->getFolder($rootDir, $item);
            return $this->render('menu', ['catalog' => $result, 'items' => $items, 'way' => $item, 'model' => $model]);
        } else {

//            Редактирование файла
            if($model->load(Yii::$app->request->post())) {
                $data = Yii::$app->request->post('AddFileForm');
                $folder = (substr($rootDir, 0, strripos($rootDir, '\\')));
                file_put_contents($rootDir, $data['description']);
                rename ($rootDir, $folder.DIRECTORY_SEPARATOR.$data['title']);
                $model->title = $item;

                return $this->redirect(['manager/menu', 'item' => $folder.DIRECTORY_SEPARATOR, 'model' => $model]);
            }else {
//            Открытие файла
                $data = file_get_contents($rootDir, true);
                $model->description = $data;
                $items = explode('\\', $item);
                $item = array_pop($items);
                $model->title = $item;

                return $this->render('file', ['model' => $model, 'file' => $item, 'items' => $items]);
            }
        }
    }

    public function actionDelete($item = NULL)
    {
        if(is_null($item)){
            return $this->redirect(['manager/menu']);
        }else{
            $rootDir = $this->gerRoot($item);

        $folder = (substr($item, 0, strripos($item, '\\')));
            if (is_dir($rootDir)){
                if (($files = @scandir($rootDir)) && count($files) <= 2) {
                    rmdir($rootDir);
                }
            }else{
                unlink($rootDir);
            }

        return $this->redirect(['manager/menu', 'item' => $folder.DIRECTORY_SEPARATOR]);
        }
    }

    public function actionNew($item = NULL)
    {
        $model = New AddFileForm();
        if($model->load(Yii::$app->request->post())){
            $rootDir = $this->gerRoot($item);

            $data = Yii::$app->request->post('AddFileForm');
            fopen($rootDir.DIRECTORY_SEPARATOR.$data['title'], "w");
            file_put_contents($rootDir.DIRECTORY_SEPARATOR.$data['title'], $data['description']);

            return $this->redirect(['manager/menu', 'item' => $item.DIRECTORY_SEPARATOR]);
        }
        $items = explode('\\', $item);

        return $this->render('file', ['model' => $model, 'items' => $items]);
    }

    public function actionNew_catalog($item)
    {
        $model = New AddFolderForm();
        if($model->load(Yii::$app->request->post())){
            $rootDir = $this->gerRoot($item);

            $data = Yii::$app->request->post('AddFolderForm');
            mkdir($rootDir.DIRECTORY_SEPARATOR.$data['title']);

            return $this->redirect(['manager/menu', 'item' => $item.DIRECTORY_SEPARATOR]);
        }
        $items = explode('\\', $item);

        return $this->render('folder', ['model' => $model, 'items' => $items]);
    }

}
