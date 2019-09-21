<?php

use yii\db\Migration;

/**
 * Class m190921_154155_rename_columns_from_calendar_table
 */
class m190921_154155_rename_columns_from_calendar_table extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('calendar', 'activityId', 'activity_id');
        $this->renameColumn('calendar', 'userId', 'user_id');
    }
}
