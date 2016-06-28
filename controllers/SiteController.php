<?php

namespace app\controllers;

use app\models\User;
use simplehtmldom_1_5\simple_html_dom;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\addform;
use app\models\Signup;
use app\models\updateForm;
use app\models\Login;
use app\models\form;
use app\models\dayresult;
use app\models\exercise;
use yii\helpers\Html;
use Sunra\PhpSimple\HtmlDomParser;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup', 'index', 'add'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index', 'add'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
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

    public function actionIndex()
    {

        $model = new form();

        $userId = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $result =count($model->check);
            $date = $model->date;

            dayresult::addRow($date, $result, $userId);
        }
            $getDayResult = dayresult::getAll($userId);
            $allNameEx = exercise::getAllExercises($userId);
            $countName = exercise::getCountName($userId);

            // for highcharts

            $getDayResultDate[] = 0;
            $getDayResultCount[] = 0;

            foreach ($getDayResult as $item)
            {
                $getDayResultDate[] = $item['date'];
                $getDayResultCount[] = (int)($item['result']  * 100 / count($allNameEx));
            }
            // parse At.pre
            $parsePressure = HtmlDomParser::file_get_html('http://meteo.gov.ua/ua/');
            foreach ($pressureGetData = $parsePressure->find('span[id=curWeatherPr]') as $item)
            {
                $pressureFind = preg_match_all('!\d+!',$item,$pressureArray);
            }

            $pressure = (int)$pressureArray[0][0];

            return $this->render('index',
                [
                    'getDayResult' => $getDayResult,
                    'getDayResultDate' => $getDayResultDate,
                    'getDayResultCount' => $getDayResultCount,
                    'model' => $model,
                    'allNameEx' => $allNameEx,
                    'countName' => $countName,
                    'pressure' => $pressure
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
            $userId = Yii::$app->user->id;

            exercise::addExercise($nameEx, $userId);
        }

        $updateForm = new updateForm();

        if ($updateForm->load(Yii::$app->request->post()))
        {
            $updateEx = $updateForm->updateEx;
            $idEx = $updateForm->idEx;
            $userId = Yii::$app->user->id;

            exercise::updateExercise($updateEx, $idEx,$userId);
        }

        $userId = Yii::$app->user->id;

        $allNameEx = exercise::getAllExercises($userId);

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

