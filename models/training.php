<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class training extends ActiveRecord{


    public static function getAll(){
        return self::find()->asArray()->all();
    }

    public static function addRow($date, $result){
        $query = new training();
        $query->date = $date;
        $query->result = $result;
        $query->save();
    }
    
    public static function delAll($id)
    {
        $delete = training::findOne($id);
        $delete->delete();
    }

}
