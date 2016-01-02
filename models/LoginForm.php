<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;
    public $status;

    public function rules(){
        return [
            [['username','password'],'required'
//                , 'on', 'default'
            ],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute){
        if(!$this->hasErrors()):
            if($this->password != '1234'):
                $this->addError($attribute, 'Пароль не равен 1234.');
            endif;
        endif;
    }

    public function attributeLabels(){
        return [
            'username' => 'Имя пользователя',
            'email' => 'Почта',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    public function login(){
        if($this->validate()):
                return true;
            else:
                return false;
        endif;
    }
}
