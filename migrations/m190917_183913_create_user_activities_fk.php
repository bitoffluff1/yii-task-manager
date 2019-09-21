<?php

use yii\db\Migration;

/**
 * Class m190917_183913_create_user_activities_fk
 */
class m190917_183913_create_user_activities_fk extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_activities_user',
            'activities', 'userId',
            'user', 'id',
            'restrict', 'cascade'
        );
    }
}
