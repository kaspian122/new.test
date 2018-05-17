<?php

namespace app\models\post;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "userspost".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $authKey
 */
class Users extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userspost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['username'], 'string','min' => 8 , 'max' => 30],
            [['username', 'email'], 'trim'],
            [['password'], 'string', 'min' => 4 , 'max' => 40],
            [['email'], 'string', 'max' => 65],
            [['email'], 'email'],
           // [['password'], 'password'],
            [['authKey'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'E-mail',
            'authKey' => 'Auth Key',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    public function getId()
    {
        return $this->id;
    }


    public function getPassword($password)
    {
        return $this->password;
    }

    public function generateAuthKey()
    {
        return Yii::$app->security->generateRandomKey(100);
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


}
