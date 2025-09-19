<?php

use yii\db\Migration;

class m250917_113212_add_role_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'role', $this->string(32)->notNull()->defaultValue('client'));
        $this->createIndex('idx-user-role', '{{%user}}', 'role');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-user-role', '{{%user}}');
        $this->dropColumn('{{%user}}', 'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250917_113212_add_role_to_user cannot be reverted.\n";

        return false;
    }
    */
}
