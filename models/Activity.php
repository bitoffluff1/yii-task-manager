<?php


namespace app\models;

use app\components\CachedRecordBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

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
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id',
            ],

            TimestampBehavior::class,
            [
                'class' => CachedRecordBehavior::class,
                'prefix' => 'activity',
            ]
        ];
    }

    public function rules()
    {
        return [
            [['title', 'day_start', 'description'], 'required'],

            [['title', 'description'], 'string'],
            [['title'], 'string', 'min' => 2, 'max' => 160],

            [['day_end'], 'validateDayEnd'],
            [['day_end'], 'default', 'value' => function () {
                return $this->day_start;
            }],
            [['day_start', 'day_end'], 'date', 'format' => 'php:' . Yii::$app->params['formatDate']],

            [['user_id'], 'integer'],

            [['repeat', 'blocked'], 'boolean'],

            //[['uploadFile'], 'file', 'maxFiles' => 5],
        ];
    }

    public function validateDayEnd($attribute)
    {
        if ($this->day_start > $this->$attribute) {
            $this->addError($attribute, 'Дата окончания события должна быть позже даты начала события');
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