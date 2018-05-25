<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180521_194250_create_table_person
 */
class m180521_194250_create_table_person extends Migration
{
   
    const PERSON_TABLE_NAME = 'person';

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable(self::PERSON_TABLE_NAME, [
           'id' =>  $this->primaryKey(),
           'name' => $this->string(30)->notNull(),
           'surname' =>$this->string(30)->notNull(),
           'department' => $this->string(255)->notNull(),
           'position' =>$this->string(255)->notNull(),
           'hobby' =>$this->string(255),
        ]);

    }

    public function down()
    {
        $this->dropTable(self::PERSON_TABLE_NAME);
    }

//    /
//     * {@inheritdoc}
//     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m180521_065039_create_table_person cannot be reverted.\n";
//
//        return false;
//    }
   
   
}
