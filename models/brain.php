<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class brain extends ActiveRecord
{
    public static function addPressure($date, $pressure, $brainStatus, $userId)
    {
        $query = new brain();
        $query->date = $date;
        $query->pressure = $pressure;
        $query->brain = $brainStatus;
        $query->user_id = $userId;
        $query->save();
    }

    public static function showPressure($userId)
    {
        return self::find()->asArray()->where("user_id = '$userId'")->all();
    }

    public static function showPressurePagination($userId)
    {
        return self::find()->asArray()->where("user_id = '$userId'");
    }

    public static function pressureDelete($id)
    {
        $delete = brain::findOne($id);
        $delete->delete();
    }
}

