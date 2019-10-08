<?php

use yii\db\Migration;

/**
 * Class m191008_161441_orders
 */
class m191008_161441_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'Id' => $this->primaryKey(),
            'CustomerId' => $this->integer(),
            'ProductId' => $this->integer(),
            'Quantity' => $this->integer(),
            'TotalPrice' => $this->string(),
        ]);
        $this->addForeignKey(
            'fk-orders-ProductId',
            'orders',
            'ProductId',
            'products',
            'Id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-orders-CustomerId',
            'orders',
            'CustomerId',
            'user',
            'Id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('orders');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191008_161441_orders cannot be reverted.\n";

        return false;
    }
    */
}
