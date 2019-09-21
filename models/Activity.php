<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Модель - Событие
 * @package app\models
 *
 * @property int $id
 * @property string $title
 * @property string $day_start
 * @property string $day_end
 * @property int $user_id
 * @property string $description
 * @property boolean $repeat
 * @property boolean $blocked
 *
 * @property-read User $user
 */
class Activity extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title', 'day_start', 'user_id', 'description'], 'required'],
            [['title', 'description'], 'string'],
            [['title'], 'string', 'min' => 2, 'max' => 160],
            [['day_end'], 'validateDayEnd'],
            [['day_start', 'day_end'], 'date', 'format' => Yii::$app->params['formatDate']],
            [['user_id'], 'integer'],
            [['repeat', 'blocked'], 'boolean'],
            [['day_end'], 'default', 'value' => function(){
                return $this->day_start;
            }]
            //[['uploadFile'], 'file', 'maxFiles' => 5],
        ];
    }

    public function validateDayEnd($attribute)
    {
        if($this->day_start > $this->$attribute){
            $this->addError($attribute, 'Дата окончания должна быть позже чем дата начала события');
        }
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'day_start' => 'Дата начала',
            'day_end' => 'Дата окончания',
            'user_id' => 'Пользователь',
            'description' => 'Описание события',
            'repeat' => 'Повтор',
            'blocked' => 'Блокирующее',
            'upload_file' => 'Прикрепленные файлы',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}