<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enterprise_branch}}`.
 */
class m220114_084038_create_enterprise_branch_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enterprise_branch}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'name' => $this->string(),
            'address' => $this->text(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'enterprise_id' => $this->integer(11)->notNull(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'enterprise-branch-updated-by_id',
            'enterprise_branch',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-enterprise-branch-updated-by_id',
            'enterprise_branch',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'codex-enterprise_branch_code',
            'enterprise_branch',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'branch-status',
            'enterprise_branch',
            'status'
        );

        //3. status
        $this->createIndex(
            'enterprise-id',
            'enterprise_branch',
            'enterprise_id'
        );

        // add foreign key for category id column
        $this->addForeignKey(
            'fk-enterprise-branch_id',
            'enterprise_branch',
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
        $this->dropTable('{{%enterprise_branch}}');
    }
}
