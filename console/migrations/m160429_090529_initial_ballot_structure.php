<?php

use yii\db\Migration;

/**
 * creates the initial structure of the ballot system.
 * includes:
 * - user_group
 * - ballot
 * - ballot_category
 * - ballot_option
 * - comments
 * 
 * @author Joss
 *
 */
class m160429_090529_initial_ballot_structure extends Migration
{
    public function up()
    {
    	$tables = Yii::$app->db->schema->getTableNames();
    	$dbType = $this->db->driverName;
    	$tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
    	$tableOptions_mssql = "";
    	$tableOptions_pgsql = "";
    	$tableOptions_sqlite = "";
    	/* MYSQL */
    	if (!in_array('user_group', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%user_group}}', [
    					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
    					0 => 'PRIMARY KEY (`id`)',
    					'name' => 'VARCHAR(255) NOT NULL',
    					'description' => 'MEDIUMTEXT NULL',
    					'created_at' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
    					'updated_at' => 'TIMESTAMP NULL',
    					'status' => 'SMALLINT(6) NOT NULL DEFAULT \'0\'',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	/* MYSQL */
    	if (!in_array('ballot_category', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%ballot_category}}', [
    					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
    					0 => 'PRIMARY KEY (`id`)',
    					'name' => 'VARCHAR(255) NOT NULL',
    					'description' => 'VARCHAR(255) NULL',
    					'created_at' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
    					'updated_at' => 'TIMESTAMP NULL',
    					'create_user_id' => 'INT(11) NOT NULL',
    					'status' => 'SMALLINT(6) NOT NULL DEFAULT \'0\'',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	/* MYSQL */
    	if (!in_array('ballot', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%ballot}}', [
    					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
    					0 => 'PRIMARY KEY (`id`)',
    					'code' => 'VARCHAR(80) NOT NULL',
    					'name' => 'VARCHAR(255) NOT NULL',
    					'description' => 'MEDIUMTEXT NULL',
    					'description_long' => 'LONGTEXT NULL',
    					'created_at' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
    					'updated_at' => 'TIMESTAMP NULL',
    					'create_user_id' => 'INT(11) NOT NULL',
    					'start_at' => 'DATETIME NOT NULL',
    					'finish_at' => 'DATETIME NOT NULL',
    					'category_id' => 'INT(11) NOT NULL',
    					'status' => 'SMALLINT(6) NOT NULL DEFAULT \'0\'',
    					'visible_from' => 'DATETIME NULL',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	/* MYSQL */
    	if (!in_array('ballot_option', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%ballot_option}}', [
    					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
    					0 => 'PRIMARY KEY (`id`)',
    					'name' => 'VARCHAR(255) NOT NULL',
    					'description' => 'LONGTEXT NULL',
    					'status' => 'SMALLINT(6) NOT NULL',
    					'vote_count' => 'BIGINT(11) UNSIGNED NOT NULL DEFAULT \'0\'',
    					'ballot_id' => 'INT(11) NOT NULL',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	/* MYSQL */
    	if (!in_array('comments', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%comments}}', [
    					'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
    					0 => 'PRIMARY KEY (`id`)',
    					'title' => 'VARCHAR(255) NOT NULL',
    					'description' => 'TINYTEXT NULL',
    					'content' => 'LONGTEXT NULL',
    					'created_at' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
    					'updated_at' => 'TIMESTAMP NULL',
    					'user_id' => 'INT(11) NOT NULL',
    					'rating' => 'INT(8) NOT NULL DEFAULT \'0\'',
    					'ballot_id' => 'INT(11) NOT NULL',
    					8 => 'KEY (`ballot_id`)',
    					'ballot_option_id' => 'INT(11) NOT NULL',
    					9 => 'KEY (`ballot_option_id`)',
    					'status' => 'SMALLINT(6) NULL',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	/* MYSQL */
    	if (!in_array('ballot_has_user_group', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%ballot_has_user_group}}', [
    					'ballot_id' => 'INT(11) NOT NULL',
    					0 => 'PRIMARY KEY (`ballot_id`)',
    					'user_group_id' => 'INT(11) NOT NULL',
    					1 => 'KEY (`user_group_id`)',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	/* MYSQL */
    	if (!in_array('user_has_ballot', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%user_has_ballot}}', [
    					'user_id' => 'INT(11) NOT NULL',
    					0 => 'PRIMARY KEY (`user_id`)',
    					'ballot_id' => 'INT(11) NOT NULL',
    					1 => 'KEY (`ballot_id`)',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	/* MYSQL */
    	if (!in_array('user_has_user_group', $tables))  {
    		if ($dbType == "mysql") {
    			$this->createTable('{{%user_has_user_group}}', [
    					'user_id' => 'INT(11) NOT NULL',
    					0 => 'PRIMARY KEY (`user_id`)',
    					'user_group_id' => 'INT(11) NOT NULL',
    					1 => 'KEY (`user_group_id`)',
    			], $tableOptions_mysql);
    		}
    	}
    	
    	
    	$this->createIndex('idx_UNIQUE_code_9037_00','ballot','code',1);
    	$this->createIndex('idx_create_user_id_9037_01','ballot','create_user_id',0);
    	$this->createIndex('idx_category_id_9037_02','ballot','category_id',0);
    	$this->createIndex('idx_ballot_id_9051_03','ballot_option','ballot_id',0);
    	$this->createIndex('idx_user_id_9067_04','comments','user_id',0);
    	$this->createIndex('idx_ballot_id_9067_05','comments','ballot_id',0);
    	$this->createIndex('idx_ballot_option_id_9067_06','comments','ballot_option_id',0);
    	$this->createIndex('idx_user_group_id_9079_07','ballot_has_user_group','user_group_id',0);
    	$this->createIndex('idx_ballot_id_9079_08','ballot_has_user_group','ballot_id',0);
    	$this->createIndex('idx_ballot_id_9093_09','user_has_ballot','ballot_id',0);
    	$this->createIndex('idx_user_id_9093_10','user_has_ballot','user_id',0);
    	$this->createIndex('idx_user_group_id_9107_11','user_has_user_group','user_group_id',0);
    	$this->createIndex('idx_user_id_9107_12','user_has_user_group','user_id',0);
    	
    	$this->execute('SET foreign_key_checks = 0');
    	$this->addForeignKey('fk_ballot_category_9034_00','{{%ballot}}', 'category_id', '{{%ballot_category}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_user_9034_01','{{%ballot}}', 'create_user_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_ballot_9049_02','{{%ballot_option}}', 'ballot_id', '{{%ballot}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_ballot_9064_03','{{%comments}}', 'ballot_id', '{{%ballot}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_ballot_option_9064_04','{{%comments}}', 'ballot_option_id', '{{%ballot_option}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_user_9064_05','{{%comments}}', 'user_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_ballot_9077_06','{{%ballot_has_user_group}}', 'ballot_id', '{{%ballot}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_user_group_9077_07','{{%ballot_has_user_group}}', 'user_group_id', '{{%user_group}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_ballot_909_08','{{%user_has_ballot}}', 'ballot_id', '{{%ballot}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_user_909_09','{{%user_has_ballot}}', 'user_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_user_9103_010','{{%user_has_user_group}}', 'user_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->addForeignKey('fk_user_group_9103_011','{{%user_has_user_group}}', 'user_group_id', '{{%user_group}}', 'id', 'NO ACTION', 'NO ACTION' );
    	$this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `user_group`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `ballot_category`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `ballot`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `ballot_option`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `comments`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `ballot_has_user_group`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `user_has_ballot`');
		$this->execute('SET foreign_key_checks = 1;');
		$this->execute('SET foreign_key_checks = 0');
		$this->execute('DROP TABLE IF EXISTS `user_has_user_group`');
		$this->execute('SET foreign_key_checks = 1;');
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
