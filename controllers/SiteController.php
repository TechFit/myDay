<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\addform;
use app\models\Signup;
use app\models\updateForm;
use app\models\Login;
use app\models\form;
use app\models\dayresult;
use app\models\exercise;
use yii\helpers\Html;

class SiteController extends Controller
{


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

    public function actionSignup()
    {
        $model = new Signup();

        if (isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');

            if ($model->validate() && $model->signup())
            {
                return $this->goHome();
            }
        }

        return $this->render('signup',
            ['model'=>$model]);
    }

    public function actionLogin()
    {
        $login_model = new Login();

        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        if( Yii::$app->request->post('Login'))
        {
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login',
            [
                'login_model' => $login_model
            ]);
    }

    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();

            return $this->redirect(['login']);
        }
    }
}

