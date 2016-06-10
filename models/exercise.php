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

    public static function updateExercise($updateEx, $idEx)
    {
        $query = \Yii::$app->
        db->createCommand("UPDATE exercise SET name = '$updateEx' WHERE id = '$idEx'")->execute();

        return $query;
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

    public static function ExDelete($id)
    {
        $delete = exercise::findOne($id);
        $delete->delete();
    }

}
