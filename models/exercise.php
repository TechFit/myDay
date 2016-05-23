<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class exercise extends ActiveRecord{


    public static function addExercise($nameEx)
    {
        $query = new exercise();
        $query->name = $nameEx;
        $query->save();
    }
    
    public static function getAllExercises()
    {
        $query = exercise::find()->asArray()->all();

        return $query;
    }

    public static function getCountName()
    {
        $query = exercise::find()->select(['COUNT(*)'])->asArray()->all();

        return $query;
    }

    public static function ExDel($name)
    {
        $delete = exercise::findOne($name);
        $delete->delete();
    }

}
