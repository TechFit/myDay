<?php

namespace app\controllers;

use app\models\addform;
use app\models\updateForm;
use Yii;
use yii\web\Controller;
use yii\helpers\Html;
use app\models\form;
use app\models\dayresult;
use app\models\exercise;

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

            $result =count($model->check);
            $date = $model->date;

            dayresult::addRow($date, $result);
        }

            $getDayResult = dayresult::getAll();
            $allNameEx = exercise::getAllExercises();
            $countName = exercise::getCountName();

            return $this->render('index',
                [
                    'getDayResult' => $getDayResult,
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

            exercise::addExercise($nameEx);
        }

        $updateForm = new updateForm();

        if ($updateForm->load(Yii::$app->request->post()))
        {
            $updateEx = $updateForm->updateEx;
            $idEx = $updateForm->idEx;

            exercise::updateExercise($updateEx, $idEx);
        }

        $allNameEx = exercise::getAllExercises();

        return $this->render('add',[
            'addform' => $addform,
            'allNameEx' => $allNameEx,
            'updateForm' => $updateForm,
        ]);
    }

    public function actionExDelete($id)
    {
        exercise::ExDelete(['in', 'id', $id]);
        return $this->redirect(['add']);

    }
}

