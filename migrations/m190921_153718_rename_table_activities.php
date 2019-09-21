<?php

use yii\db\Migration;

/**
 * Class m190921_153718_rename_table_activities
 */
class m190921_153718_rename_table_activities extends Migration
{

    public function safeUp()
    {
        $this->renameTable('activities', 'activity');
    }
}
