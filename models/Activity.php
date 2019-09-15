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
            'title' => 'Название',
            'dayStart' => 'Начало события',
            'dayEnd' => 'Конец события',
            'userId' => 'Пользователь',
            'description' => 'Описание события',
            'repeat' => 'Повтор',
            'blocked' => 'Главное',
            'uploadFile' => 'Добавить файл'
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description'], 'string'],
            [['dayStart', 'dayEnd'], 'date', 'format' => 'php:Y-m-d'],
            [['title'], 'string', 'min' => 2, 'max' => 30],
            [['repeat', 'blocked'], 'boolean'],
            [['uploadFile'], 'file', 'maxFiles' => 5]
        ];
    }

}