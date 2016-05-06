<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\form;
use app\models\training;
use yii\helpers\Url;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $model = new form();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                       
            $result = $model->php + $model->eng + $model->sport;
            $date = $model->date;
            $id = $model->id;
            
            //Добавляем данные в базу
            training::addRow($date, $result);
        }
        
        // Получение данных из базы
        $a = training::getAll();

        return $this->render('index',
            [
                'a' => $a,
                'model' => $model
            ]);
    }

    public function actionDel($id)
    {
        training::delAll(['in', 'id', $id]);
        return $this->redirect(['index']);

    }

}

