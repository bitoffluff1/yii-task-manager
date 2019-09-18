<?php

namespace app\models;

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

    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['email'], 'email'],
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
                'created_at' => time(),
                'updated_at' => time(),
            ]);

            $user->generateAuthKey();
            $user->password = $this->password;

            $user->save();

            return $user;
        }
        return false;
    }

}
