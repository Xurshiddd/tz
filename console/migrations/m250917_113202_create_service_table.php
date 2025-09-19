<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m250917_113202_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'price' => $this->decimal(10,2)->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->null(),
            'updated_at' => $this->dateTime()->null(),
        ]);
        $this->createIndex('idx-service-title', '{{%service}}', 'title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-service-title', '{{%service}}');
        $this->dropTable('{{%service}}');
    }
}
