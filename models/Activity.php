<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $dayStart;
    public $dayEnd;
    public $userId;
    public $description;
    public $repeat = false;
    public $blocked = true;
    public $uploadFile;

    public function attributeLabels()
    {
        return [
            'title' => 'Тема события',
            'dayStart' => 'Начало события',
            'dayEnd' => 'Конец события',
            'userId' => 'Пользователь',
            'description' => 'Описание события',
            'repeat' => 'Повторяющееся',
            'blocked' => 'Главное',
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['dayStart', 'dayEnd'], 'date', 'format' =>'dd/MM/yyyy'],
            [['title'], 'string', 'min' => 5, 'max' => 30],
        ];
    }

}