<?php

use yii\db\Migration;

/**
 * Class m190924_165445_category
 */
class m190924_165445_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'Id' => $this->primaryKey(),
            'Name' => $this->string()->notNull(),
            'Description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190924_165445_category cannot be reverted.\n";

        return false;
    }
    */
}
