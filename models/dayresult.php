<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class dayresult extends ActiveRecord{

    public static function getAll($userId){

        return self::find()->asArray()->where("user_id = '$userId'")->orderBy('date')->all();
        
    }

    public static function getAllPagination($userId){

        return self::find()->asArray()->where("user_id = '$userId'")->orderBy('date');

    }

    public static function addRow($date, $result, $listResult, $userId){
        $query = new dayresult();
        $query->date = $date;
        $query->result = $result;
        $query->listResult = $listResult;
        $query->user_id = $userId;

        $query->save();
    }
        
    public static function delAll($id)
    {
        $delete = dayresult::findOne($id);
        $delete->delete();
    }

}
