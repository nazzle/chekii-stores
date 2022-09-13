<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m220210_040326_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'enterprise_id' => $this->integer(11)->notNull(),
            'code' => $this->smallInteger(8)->notNull(),
            'name' => $this->string(),
            'address' => $this->string(),
            'phone' => $this->string(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'employee-updated-by_id',
            'employee',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-employee-updated-by_id',
            'employee',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'employee-code',
            'employee',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'employee-status',
            'employee',
            'status'
        );

        //3. interprise_id
        $this->createIndex(
            'employee-interprise-id',
            'employee',
            'enterprise_id'
        );

        // add foreign key for employee enterprise id column
        $this->addForeignKey(
            'fk-employee-enterprse_id',
            'employee',
            'enterprise_id',
            'enterprise',
            'code',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
