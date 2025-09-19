<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m250917_113207_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'status' => $this->string(32)->notNull()->defaultValue('new'),
            'note' => $this->text(),
            'created_at' => $this->timestamp()->null(),
            'updated_at' => $this->timestamp()->null(),
        ]);
        $this->createIndex('idx-order-user_id', '{{%order}}', 'user_id');
        $this->createIndex('idx-order-service_id', '{{%order}}', 'service_id');
        $this->addForeignKey('fk-order-user', '{{%order}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-order-service', '{{%order}}', 'service_id', '{{%service}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order-user', '{{%order}}');
        $this->dropForeignKey('fk-order-service', '{{%order}}');
        $this->dropIndex('idx-order-user_id', '{{%order}}');
        $this->dropIndex('idx-order-service_id', '{{%order}}');
        $this->dropTable('{{%order}}');
    }
}
