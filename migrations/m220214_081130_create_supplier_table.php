<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%supplier}}`.
 */
class m220214_081130_create_supplier_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%supplier}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'supplier_name' => $this->string()->notNull(),
            'supplier_description' => $this->string(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'supplier-updated-by_id',
            'supplier',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-supplier-updated-by_id',
            'supplier',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'supplier-code',
            'supplier',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'supplier-status',
            'supplier',
            'status'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%supplier}}');
    }
}
