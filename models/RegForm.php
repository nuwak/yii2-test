<?php
/**
 * Created by PhpStorm.
 * User: Nuwak
 * Date: 02.01.2016
 * Time: 6:05
 */

namespace app\models;

use yii\base\Model;
use Yii;
use app\models\User;


class RegForm extends Model {

    public $username;
    public $email;
    public $password;
    public $status;

    public function rules(){
        return [
            [['username','email','password'],'filter', 'filter' => 'trim'],
            [['username','email','password'],'required'],
            ['username','string','min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['username', 'unique', 'targetClass' => User::ClassName(), 'message' => 'Это имя уже занято.'],
            ['email','email'],
            ['email', 'unique', 'targetClass' => User::ClassName(), 'message' => 'Эта почта уже занята.'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE,
                'on' => 'default'
            ],
            ['status', 'in', 'range' =>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE,
            ]],
//            ['username', 'string', 'min' => 5, 'on' => 'test']
            ]
            ;
    }

    public function reg()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if($user->save()):
            return $user;
        else:
            return null;
        endif;
    }

    public function attributeLabels(){
        return [
            'username' => 'Имя пользователя',
            'email' => 'Эл. почта',
            'password' => 'Пароль',
        ];
    }
}