<?php

use yii\db\Migration;

/**
 * Class m190921_153924_rename_columns_from_activity_table
 */
class m190921_153924_rename_columns_from_activity_table extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('activity', 'dayStart', 'day_start');
        $this->renameColumn('activity', 'dayEnd', 'day_end');
        $this->renameColumn('activity', 'userId', 'user_id');
    }
}
