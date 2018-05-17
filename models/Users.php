<?php
/**
 * Created by PhpStorm.
 * User: LyubimovBR
 * Date: 12.04.2018
 * Time: 12:26
 */

namespace app\models;


use yii\db\ActiveRecord;


class Users extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $_password;
    public static function tableName()
    {
        return 'users';
    }
    public static function findByUsername($_username){
        return static::findOne(['username' => $_username]);
    }
    public static function findByEmail($_email){
        return static::findOne(['email' => $_email]);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'email'], 'required'],
            ['email','email'],
            ['email','unique'],
            ['username','unique'],
            ['email','trim'],
            ['username','trim'],
            // password is validated by validatePassword()
            ['password', 'string', 'min'=> 6],
            ['_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
        ];
    }

}