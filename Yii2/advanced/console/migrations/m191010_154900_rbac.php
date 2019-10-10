<?php

use yii\db\Migration;

/**
 * Class m191010_154900_rbac
 */
class m191010_154900_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->runAction('migrate/up',[
            'migrationPath'=>'@yii/rbac/migrations',
            'interactive'=>true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191010_154900_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191010_154900_rbac cannot be reverted.\n";

        return false;
    }
    */
}
