<?php

use yii\db\Migration;

/**
 * Class m191001_165937_news
 */
class m191001_165937_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'Id' => $this->primaryKey(),
            'Name' => $this->string()->notNull(),
            'Description' => $this->string(),
            'UrlImage' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191001_165937_news cannot be reverted.\n";

        return false;
    }
    */
}
