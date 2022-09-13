<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promotion}}`.
 */
class m220421_172100_create_promotion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promotion}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'promotion_code' => $this->string(),
            'promotion_description' => $this->string(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'promotion-updated-by_id',
            'promotion',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-promotion-updated-by_id',
            'promotion',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'index-promotion-code',
            'promotion',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'promotion-status',
            'promotion',
            'status'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promotion}}');
    }
}
