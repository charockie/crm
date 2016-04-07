<?php

namespace app\modules\administration\controllers;


use app\models\manager\Departments;
use app\models\manager\Position;
use app\models\manager\User;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class DepartmentsController extends Controller
{
    public function actionIndex()
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

    public function actionCreate()
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $model = new Departments();
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
            $model = $this->findModel($id)->findOne($id);
            $departs = Position::find()->leftJoin('user', 'user.position_id=position.id')->addSelect(["*", "user.name", "position.id id", "user.id user_id"])->where("position.depart_id=$id");
            $dataProvider = new ActiveDataProvider([
                'query' => $departs,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('view', [
                'model' => $model, 'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect('index.php');
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)){
            $model = $this->findModel($id)->findOne($id);
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
    public function actionDelete_department()
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            if(Yii::$app->request->post('id') && Departments::findOne(Yii::$app->request->post('id'))->delete()){

                $ids = Position::find()->select('id')->andWhere(['depart_id' => Yii::$app->request->post('id')])->column();
                Position::deleteAll(['id' => $ids]);

                \app\models\User::updateAll(['position_id' => 0], ['position_id' => $ids]);
                return true;
            }
            return $this->redirect(['index']);
        }
        return $this->redirect('index.php');
    }

    public function actionDelete_dep($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        return $this->redirect('index.php');
    }

    public function actionAdd_position($id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $model = new Position();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $id]);
            } else {
                return $this->render('add_position', [
                    'model' => $model, 'id' => $id,
                ]);
            }
        }
        return $this->redirect('index.php');
    }

    public function actionChoose_user($dep_id, $pos_id)
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            $model = $this->findModel($dep_id)->findOne($dep_id);
            $position = Position::findOne($pos_id);
            $user = User::find()->where("position_id = '0'");

            $dataProvider = new ActiveDataProvider([
                'query' => $user,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('choose_user', [
                'model' => $model, 'dataProvider' => $dataProvider, 'position' => $position,
            ]);
        }
        return $this->redirect('index.php');
    }

    public function actionChoose()
    {
        if (Yii::$app->user->identity && (Yii::$app->user->identity->privilege == 1)) {
            if($model = \app\models\User::findOne(Yii::$app->request->post('usr_id'))) {
                if ($model->position_id == 0) {
                    $model->position_id = Yii::$app->request->post('pos_id');
                    $model->save();
                    return Yii::$app->request->post('dep_id');
                }
                }
            return Yii::$app->request->post('dep_id');
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

//use yii\helpers\VarDumper;
//VarDumper::dump($this, 10, true);