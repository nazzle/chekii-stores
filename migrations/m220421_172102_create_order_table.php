<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m220421_172102_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'branch_id' => $this->integer(11)->notNull(),
            'customer_id' => $this->integer(11)->notNull(),
            'payment_id' => $this->integer(11)->notNull(),
            'promotion_id' => $this->integer(11)->notNull(),
            'product_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'order-updated-by_id',
            'order',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-order-updated-by_id',
            'order',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'index2-customer-code',
            'customer',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'index2-customer-status',
            'customer',
            'status'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
