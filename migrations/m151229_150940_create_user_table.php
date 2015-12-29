<?php

use yii\db\Schema;
use yii\db\Migration;

class m151229_150940_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'password' => Schema::TYPE_SMALLINT.' NOT NULL',
            'email' => Schema::TYPE_SMALLINT.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
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
