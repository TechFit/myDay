<?php

namespace app\controllers;

use app\models\brain;
use app\models\pressureForm;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\addform;
use app\models\Signup;
use app\models\updateForm;
use app\models\Login;
use app\models\form;
use app\models\dayresult;
use app\models\exercise;

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
        $userId = Yii::$app->user->id;
        
        $model = new form();

        // Form with tasks on main page

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->saveDayResult();

        }
                
            $getDayResult = dayresult::getAll($userId);

            $allNameEx = exercise::getAllExercises($userId);

            $countName = exercise::getCountName($userId);


        // for highcharts

        if  (!empty($getDayResult))
        {
            $shedule = dayresult::getDataShedule($getDayResult);
        }

            return $this->render('index',
                [
                    'allNameEx' => $allNameEx,
                    'countName' => $countName,
                    'shedule' => $shedule
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

            exercise::addExercise($nameEx, Yii::$app->getUser()->id);
        }

        $updateForm = new updateForm();

        if ($updateForm->load(Yii::$app->request->post()))
        {
            $updateEx = $updateForm->updateEx;
            
            $idEx = $updateForm->idEx;
            
            exercise::updateExercise($updateEx, $idEx,Yii::$app->getUser()->id);
        }

        $allNameEx = exercise::getAllExercises(Yii::$app->getUser()->id);

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

    public function actionBrain()
    {
        $pressure = pressureForm::getAtPressure();

        $userId = Yii::$app->user->id;

        $pressureForm = new pressureForm();

        if ($pressureForm->load(Yii::$app->request->post()))
        {
            brain::addPressure($pressureForm->date, $pressureForm->pressure, (int)$pressureForm->brain, $userId);
        }

        $showPressure = brain::showPressure($userId);
        foreach ($showPressure as $item) {
            $showPressureDate[] = $item['date'];
            $showPressureValue[] = (int)$item['pressure'];
            $showPressureResult[] = (int)$item['brain'];
        }

        $sort = new Sort([
            'attributes' => [
                'date',
            ],
        ]);
        $query = brain::showPressurePagination($userId);
        $pages = new Pagination(['totalCount' => $query->count(),  'pageSize' => 5]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)->orderBy($sort->orders)
            ->all();

        return $this->render('brain',[
            'pressureForm' => $pressureForm,
            'showPressure' => $showPressure,
            'pressure' => $pressure,
            'showPressureDate' => $showPressureDate,
            'showPressureValue' => $showPressureValue,
            'showPressureResult' => $showPressureResult,
            'models' => $models,
            'pages' => $pages,
            'sort' => $sort
        ]);
    }

    public function actionPressureDelete($userId, $id)
    {
        brain::pressureDelete(['in','userId','id',$userId,$id]);
        return $this->redirect(['brain']);
    }
}

