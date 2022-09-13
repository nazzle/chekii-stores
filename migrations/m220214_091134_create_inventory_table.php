<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%inventory}}`.
 */
class m220214_091134_create_inventory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%inventory}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'product_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(11)->notNull(),
            'branch_id' => $this->integer(11)->notNull(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'inventory-updated-by_id',
            'inventory',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-inventory-updated-by_id',
            'inventory',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'codex-inventory_code',
            'inventory',
            'code',
            true
        );

        //2. product ID
        $this->createIndex(
            'productx-product_id',
            'inventory',
            'product_id'
        );

        // add foreign key for category id column
        $this->addForeignKey(
            'fk-product_id',
            'inventory',
            'product_id',
            'product',
            'code',
            'CASCADE'
        );

        //3. status
        $this->createIndex(
            'inventory-status',
            'inventory',
            'status'
        );

        //4. status
        $this->createIndex(
            'inventory-branch',
            'inventory',
            'branch_id'
        );

        // add foreign key for branch Id column
        $this->addForeignKey(
            'fk-branch_id',
            'inventory',
            'branch_id',
            'enterprise_branch',
            'code',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%inventory}}');
    }
}
