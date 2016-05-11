<?php

namespace app\controllers;



use app\models\addform;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\form;
use app\models\dayresult;
use app\models\exercise;
use yii\helpers\Url;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new form();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                       
            $result = $model->php + $model->eng + $model->sport;
            $date = $model->date;
            $id = $model->id;
            
            //Добавляем данные в базу
            dayresult::addRow($date, $result);
        }
        
        // Получение данных из базы
        $a = dayresult::getAll();
        $allNameEx = exercise::getAllExercises();
        $countName = exercise::getCountName();

        return $this->render('index',
            [
                'a' => $a,
                'model' => $model,
                'allNameEx' => $allNameEx,
                'countName' => $countName
            ]);
    }

    public function actionDel($id)
    {
        dayresult::delAll(['in', 'id', $id]);
        return $this->redirect(['index']);

    }

    public function actionAdd()
    {
        $addform = new addform();

        if ($addform->load(Yii::$app->request->post())) {

            $nameEx = $addform->nameEx;

            //Добавляем данные в базу
            exercise::addExercise($nameEx);
        }

        return $this->render('add',[
            'addform' => $addform
        ]);
    }
}

