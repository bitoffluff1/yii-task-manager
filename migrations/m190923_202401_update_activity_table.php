<?php

use yii\db\Migration;

/**
 * Class m190923_202401_update_activity_table
 */
class m190923_202401_update_activity_table extends Migration
{

    public function safeUp()
    {
        $this->addColumn('activity', 'created_at', $this->integer());
        $this->addColumn('activity', 'updated_at', $this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn('activity', 'created_at');
        $this->dropColumn('activity', 'updated_at');
    }
}
