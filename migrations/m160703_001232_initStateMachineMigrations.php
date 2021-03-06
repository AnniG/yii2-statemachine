<?php

use yii\db\Migration;

class m160703_001232_initStateMachineMigrations extends Migration
{
    public function up()
    {
        $this->createTable('sm_timeout', [
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'model' => 'varchar(255) NOT NULL DEFAULT \'\'',
            'model_pk' => 'varchar(60) NOT NULL DEFAULT \'\'',
            'virtual_attribute' => 'varchar(64) NOT NULL DEFAULT \'\'',
            'sm_name' => 'varchar(128) NOT NULL DEFAULT \'\'',
            'event_name' => 'varchar(255) NOT NULL DEFAULT \'\'',
            'expires_at' => 'timestamp NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
            'PRIMARY KEY (`id`)',
        ]);
        $this->createIndex('expires_at_idx', 'sm_timeout', 'expires_at');

        $this->createTable('sm_journal', [
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'model' => 'varchar(255) DEFAULT NULL',
            'model_pk' => 'varchar(60) DEFAULT NULL',
            'sm_name' => 'varchar(128) DEFAULT NULL',
            'attr' => 'varchar(64) DEFAULT NULL',
            'from_state' => 'varchar(255) DEFAULT NULL',
            'to_state' => 'varchar(255) DEFAULT NULL',
            'created_at' => 'timestamp NULL DEFAULT NULL',
            'created_by' => 'int(11) unsigned DEFAULT NULL',
            'PRIMARY KEY (`id`)',
        ]);
        $this->createIndex('created_by_idx', 'sm_journal', 'created_by');

        // Uncomment (and adjust) the following if you want to relate created_by with your users
        // $this->addForeignKey('sm_journal_created_by_user', 'sm_journal', 'created_by', 'user', 'id');
    }

    public function down()
    {
        echo "m160703_001232_initStateMachineMigrations cannot be reverted.\n";

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
