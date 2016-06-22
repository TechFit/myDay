<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class exercise extends ActiveRecord{


    public static function addExercise($nameEx, $userId)
    {
        $query = new exercise();
        $query->name = $nameEx;
        $query->user_id = $userId;
        $query->save();
    }

    public static function updateExercise($updateEx, $idEx, $userId)
    {
        $query = \Yii::$app->
        db->createCommand("UPDATE exercise SET name = '$updateEx' WHERE id = '$idEx' AND user_id = '$userId'")->execute();

        return $query;
    }
    
    public static function getAllExercises($userId)
    {
        $query = exercise::find()->asArray()->where("user_id = '$userId'")->all();

        return $query;
    }

    public static function getCountName($userId)
    {
        $query = exercise::find()->select(['COUNT(*)'])->asArray()->where("user_id = '$userId'")->all();

        return $query;
    }

    public static function ExDelete($id)
    {
        $delete = exercise::findOne($id);
        $delete->delete();
    }

}
