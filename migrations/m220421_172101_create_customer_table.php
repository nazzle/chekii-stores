<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m220421_172101_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'name' => $this->string(),
            'address' => $this->string(),
            'phone' => $this->string(),
            'whatsapp_available' => $this->integer(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'customer-updated-by_id',
            'customer',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-customer-updated-by_id',
            'customer',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'index-customer-code',
            'customer',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'index-customer-status',
            'customer',
            'status'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customer}}');
    }
}
