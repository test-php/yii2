<?php

use yii\db\Migration;

/**
 * Class m180522_165236_create_table_department
 */
class m180522_165236_create_table_department extends Migration
{

    public function up()
    {
        $this->createTable('department', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('department');
    }
}

//    public function safeUp()
//    {
//
//    }
//
//
//    public function safeDown()
//    {
//        echo "m180522_165236_create_table_department cannot be reverted.\n";
//
//        return false;
//    }
