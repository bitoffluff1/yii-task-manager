<?php


namespace app\models\forms;


use app\models\User;
use yii\base\Model;

class UpdateUserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeatPassword;

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string', 'min' => 4, 'max' => 20],
           // [['username'], 'validateUsername'],
            [['email'], 'email'],
            [['password', 'repeatPassword'], 'string', 'min' => 5],
            [['repeatPassword'], 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false,
                'when' => function (UpdateUserForm $form) {
                    return !empty($form->password);
                }]
        ];
    }

    //сделать проверку на уникальность
    public function validateUsername($attr)
    {
        if($this->username !== $this->$attr){
            if(!empty(User::find(['username' => $this->$attr]))){
                $this->addError($attr, 'Этот логин уже используется');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'repeatPassword' => 'Повторите пароль',
        ];
    }

    public function update(User $user)
    {
        if (!$this->validate()) {
            return false;
        }

        $user->username = $this->username;

        if (!empty($this->password)) {
            $user->password = $this->password;
        }

        if (!empty($this->email)) {
            $user->email = $this->email;
        }

        return $user->save();
    }
}