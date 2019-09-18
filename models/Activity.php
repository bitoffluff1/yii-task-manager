<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Модель - Событие
 * @package app\models
 *
 * @property-read User $user
 */
class Activity extends ActiveRecord
{
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * Правила валидации данных модели
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'dayStart', 'userId', 'description'], 'required'],
            [['title', 'description'], 'string'],
            [['title'], 'string', 'min' => 2, 'max' => 160],
            [['dayEnd'], 'validateDayEnd'],
            [['dayStart', 'dayEnd'], 'date', 'format' => Yii::$app->params['formatDate']],
            [['userId'], 'integer'],
            [['repeat', 'blocked'], 'boolean'],
            [['dayEnd'], 'default', 'value' => function($model){
                return $model->dayStart;
            }]
            //[['uploadFile'], 'file', 'maxFiles' => 5],
        ];
    }

    public function validateDayEnd($attribute)
    {
        if($this->dayStart > $this->$attribute){
            $this->addError($attribute, 'Дата окончания должна быть позже чем дата начала события');
        }
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'dayStart' => 'Дата начала',
            'dayEnd' => 'Дата окончания',
            'userId' => 'Пользователь',
            'description' => 'Описание события',
            'repeat' => 'Повтор',
            'blocked' => 'Блокирующее',
            'uploadFile' => 'Прикрепленные файлы',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}