<?php

namespace app\models;

use yii\base\Model;

class form extends Model
{
    public $date;
    public $php;
    public $eng;
    public $sport;
    public $id;

    public function rules()
    {
        return [
            [['date', 'php', 'eng', 'sport'], 'required']
        ];
    }
}