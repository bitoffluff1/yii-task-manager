<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
        ];
    }

    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['email'], 'email'],
            [['username'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'username'], //в классе юзер, в атрибуте юзер нейм
            [['username'], 'string', 'min' => 4, 'max' => 20],
            [['password'], 'string', 'min' => 5]
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User([
                'username' => $this->username,
                'email' => $this->email,
                'password_reset_token' => "{$this->username}-token",
            ]);

            $user->generateAuthKey();
            $user->password = $this->password;

            $user->save();

            if (!Yii::$app->user->can('admin')) {
                return Yii::$app->getUser()->login($user);
            }
            return true;
        }
        return false;
    }

}
