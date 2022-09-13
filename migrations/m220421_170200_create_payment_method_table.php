<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_method}}`.
 */
class m220421_170200_create_payment_method_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_method}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'payment_name' => $this->integer(11)->notNull(),
            'payment_description' => $this->string(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'payment-method-updated-by_id',
            'payment_method',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-payment-method-updated-by_id',
            'payment_method',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'payment-method-code',
            'payment_method',
            'code',
            true
        );

        //2. statue
        $this->createIndex(
            'payment-method-status',
            'payment_method',
            'status'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment_method}}');
    }
}
