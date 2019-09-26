<?php

use yii\db\Migration;

/**
 * Class m190926_151924_products
 */
class m190926_151924_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'Id' => $this->primaryKey(),
            'Name' => $this->string()->notNull(),
            'Description' => $this->text(),
            'ProductImage' => $this->string()->notNull(),
            'Price' => $this->string()->notNull(),
            'Quantity' => $this->integer()->notNull(),
            'DiscountId' => $this->integer(),
            'CategoryId' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-products-CategoryId',
            'products',
            'CategoryId',
            'category',
            'Id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190926_151924_products cannot be reverted.\n";

        return false;
    }
    */
}
