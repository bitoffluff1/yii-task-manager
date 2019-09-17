<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calendar}}`.
 */
class m190916_071408_create_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calendar', [
            'id' => $this->primaryKey(),
            'activityId' => $this->integer(),
            'userId' => $this->integer()
        ]);

        $this->addForeignKey('fk_calendar_userId',
            'calendar',
            'userId',
            'user',
            'id',
            'RESTRICT',
            'CASCADE');

        $this->addForeignKey('fk_calendar_activityId',
            'calendar',
            'activityId',
            'activities',
            'id',
            'RESTRICT',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('calendar');
    }
}
