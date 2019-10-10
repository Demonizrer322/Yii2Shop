<?php

use yii\db\Migration;

/**
 * Class m191010_155209_roles
 */
class m191010_155209_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('admin'));
        $auth->add($auth->createRole('adManager'));
        $auth->add($auth->createRole('contentManager'));
        $auth->add($auth->createRole('merchendaiser'));
        $adminRole=$auth->getRole('admin');
        $auth->assign($adminRole, 7);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191010_155209_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191010_155209_roles cannot be reverted.\n";

        return false;
    }
    */
}
