<?php

namespace app\models;

use yii\base\Model;

class addform extends Model
{
    public $nameEx;

    public function rules()
    {
        return [
            [['nameEx'], 'required']
        ];
    }
}