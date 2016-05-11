<?php

namespace app\models;

use yii\base\Model;

class form extends Model
{
    //Ex = exercise, data for Add page
    public $nameEx;
    //data for form on main page
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