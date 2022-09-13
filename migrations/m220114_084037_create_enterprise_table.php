<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enterprise}}`.
 */
class m220114_084037_create_enterprise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enterprise}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'name' => $this->string(),
            'address' => $this->text(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'registration_details' => $this->text(),
            'other_info' => $this->text(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'enterprise-updated-by_id',
            'enterprise',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-enterprise-updated-by_id',
            'enterprise',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'codex-enterprise_code',
            'enterprise',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'enterprise-status',
            'enterprise',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%enterprise}}');
    }
}
