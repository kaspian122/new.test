<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userspost".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $authKey
 */
class Users extends \yii\db\ActiveRecord
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
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 65],
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
            'email' => 'Email',
            'authKey' => 'Auth Key',
        ];
    }
}
