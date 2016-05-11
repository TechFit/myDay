<?php

namespace app\models;

use yii\base\Model;

class addform extends Model
{
    //Ex = exercise, data for Add page
    public $nameEx;

    public function rules()
    {
        return [
            [['nameEx'], 'required']
        ];
    }
}