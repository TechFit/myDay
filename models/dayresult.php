<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class dayresult extends ActiveRecord{


    public static function getAll($userId){

        return self::find()->asArray()->where("user_id = '$userId'")->all();
        
    }

    public static function addRow($date, $result, $userId){
        $query = new dayresult();
        $query->date = $date;
        $query->result = $result;
        $query->user_id = $userId;
        $query->save();
    }
        
    public static function delAll($id)
    {
        $delete = dayresult::findOne($id);
        $delete->delete();
    }

}
