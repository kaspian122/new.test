<?php
/**
 * Created by PhpStorm.
 * User: LyubimovBR
 * Date: 12.04.2018
 * Time: 12:26
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class Users extends ActiveRecord implements IdentityInterface
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

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}