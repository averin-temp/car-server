<?php

namespace app\models;


use Yii;
use Firebase\JWT\JWT;


class RegistrationModel extends \yii\base\Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['username', 'required'],
            ['password', 'required'],
        ];
    }


    public function register()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        $user->save(false);

        return $user;
    }
}