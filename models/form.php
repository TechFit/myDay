<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class form extends Model
{

    public $date;

    public $check;

    public function rules()
    {
        return [
            [['date'], 'required'],
            ['check', 'default', 'value' => 0]
        ];
    }

    public function checkFormData(){

      $allNameEx = exercise::getAllExercises(Yii::$app->user->id);

      return ArrayHelper::map($allNameEx, 'name', 'name');
        
    }

    public function saveDayResult(){

        // Form with tasks on main page

        $this->check == 0 ? $result = 0 : $result = count($this->check);

        $date = $this->date;

        $listResult[] = $this->check;

        dayresult::addRow($date, $result, serialize($listResult), Yii::$app->user->id);
    }
}