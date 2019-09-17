<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activities}}`.
 */
class m190915_165608_create_activities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activities', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'dayStart' => $this->string(),
            'dayEnd' => $this->string(),
            'userId' => $this->integer(),
            'description' => $this->text(),
            'repeat' => $this->boolean(),
            'blocked' => $this->boolean(),

            //'uploadFile' =>$this->
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activities');
    }
}
