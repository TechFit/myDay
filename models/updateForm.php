<?php

namespace app\models;

use yii\base\Model;

class updateForm extends Model
{
    public $updateEx;
    public $idEx;

    public function rules()
    {
        return [
            [['updateEx', 'idEx'], 'required']
        ];
    }
}