<?php


namespace app\models;


use app\components\CachedRecordBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 * @package app\models
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property-write $password -> setPassword()
 */
class User extends ActiveRecord implements IdentityInterface
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => CachedRecordBehavior::class,
                'prefix' => 'user',
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password_hash' => 'Пароль',
            'auth_key' => 'Ключ авторизации',
            'password_reset_token' => 'Токен доступа',
            'email' => 'Почтовый адрес',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего изменения',
        ];
    }

    public function rules()
    {
        return [
            [['email'], 'email'],
            [['username'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'username'],
            [['username'], 'string', 'min' => 4, 'max' => 20],
        ];
    }

    //методы для identity interface чтобы можно было авторизоваться и аутентифцироваться на сайте
    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['password_reset_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }


    //помогают login form проверить что пользователь ввел правильные данные и данные соответствуют
    public static function findByUserName($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        //возвращает true если введеный пароль сравнить с хешем пароля из бд
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    //геренация auth key, и функция хеширования пароля
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


}