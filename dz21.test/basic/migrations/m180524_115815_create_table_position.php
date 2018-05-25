<?php

use yii\db\Migration;

/**
 * Class m180524_115815_create_table_position
 */
class m180524_115815_create_table_position extends Migration
{
    /**
     * {@inheritdoc}
     */


  public function up()
  {
      $this->createTable('position', [
          'id' => $this->primaryKey(),
          'name' => $this->string(255)->notNull(),
      ]);

  }

  public function down()
  {
      $this->dropTable('position');
  }



//
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
//        echo "m180524_115815_create_table_position cannot be reverted.\n";
//
//        return false;
//    }


}
