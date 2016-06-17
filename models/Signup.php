<?php

namespace app\models;

use yii\base\Model;
use app\models\User;

class Signup extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return[
           [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\Models\User'],
            ['password', 'string', 'min' => 2, 'max' => 10]
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->password = $this->password;
        return $user->save();
    }
}