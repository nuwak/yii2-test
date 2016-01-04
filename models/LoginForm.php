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

    private $_user = false;

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
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)):
                $this->addError($attribute, 'Пароль или логин не корректны');
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
            $user = $this->getUser();
            $this->status = ($user ? $user->status : User::STATUS_NOT_ACTIVE);
            if($this->status === User::STATUS_ACTIVE):
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 30);
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    public function getUser(){
        if($this->_user === false):
            $this->_user = User::findByUsername($this->username);
        endif;

        return $this->_user;
    }
}
