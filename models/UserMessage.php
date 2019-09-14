<?php


namespace app\models;


use yii\base\Model;

class UserMessage extends Model
{
    public $email;
    public $title;
    public $content;

    public function attributeLabels()
    {
        return [
            'email' => 'Ваш e-mail',
            'title' => 'Тема обращения',
            'content' => 'Текст'
        ];
    }

    public function rules()
    {
        return [
            [['email', 'title', 'content'], 'required'],
            [['email'], 'email'],
            [['title'], 'string', 'min' => 5, 'max' => 30]
        ];
    }
}