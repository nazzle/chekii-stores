<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220109_090326_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'username' => $this->string(),
            'auth_key' => $this->string(),
            'password_hash' => $this->string(255),
            'password_reset_token' => $this->string(255),
            'email' => $this->string(100),
            'role' => $this->integer(8)->notNull(),
            'status' => $this->integer(11)->notNull(),
        ]);

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'promotion-code',
            'user',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'user-status',
            'user',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
