<?php

use yii\db\Migration;

class m160518_214942_fix_comments_relations extends Migration
{
    public function up()
    {
    	$this->alterColumn('comments', 'ballot_id', 'INT(11)');
    	$this->alterColumn('comments', 'ballot_option_id', 'INT(11)');
    }

    public function down()
    {
        echo "m160518_214942_fix_comments_relations cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
