<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class dayresult extends ActiveRecord{


    public static function getAll(){
        return self::find()->asArray()->all();
    }

    public static function addRow($date, $result){
        $query = new dayresult();
        $query->date = $date;
        $query->result = $result;
        $query->save();
    }
        
    public static function delAll($id)
    {
        $delete = dayresult::findOne($id);
        $delete->delete();
    }

}
