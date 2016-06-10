<?php

namespace app\models;

use app\models\exercise;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class form extends Model
{

    public $date;
    public $check;
    public static function checkFormData()
    {
      $allNameEx = exercise::getAllExercises();

        return ArrayHelper::map($allNameEx, 'name', 'name');
        
    }

    public function rules()
    {
        return [
            [['date', 'check'], 'required'],
        ];
    }
}