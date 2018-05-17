<?php
/**
 * Created by PhpStorm.
 * User: LyubimovBR
 * Date: 03.05.2018
 * Time: 13:20
 */

namespace app\models;

use Yii;
use yii\base\Model;

class LoginuForm extends Model
{
    public $username;
    public $password;
    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'trim'],
        ];
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByEmail($this->username);
        }
        if ($this->_user === null) {
            $this->_user = Users::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function login()
    {
        $user = $this->getUser();
        if ($this->validate()) {

            return Yii::$app->user->login($user);
        }
        return false;
    }

    public function validatePassword()
    {
        $user = $this->getUser();

        if ($user !=false && $user != null && $user->password === $this->password)
        {
            return true;
        }
        return false;
    }


}