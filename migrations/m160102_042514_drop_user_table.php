<?php
/*
./yii migrate/create drop_user_table
./yii migrate/create create_user_table
./yii gii/model --tableName=user --modelClass=User
*/

use yii\db\Schema;
use yii\db\Migration;

class m160102_042514_drop_user_table extends Migration
{
    public function up()
    {
        $this->dropTable('user');
    }

    public function down()
    {
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
