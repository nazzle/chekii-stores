<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%currency}}`.
 */
class m220214_083020_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'symbol' => $this->string(5),
            'name' => $this->string(115),
            'description' => $this->text(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'currency-updated-by_id',
            'currency',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-currency-updated-by_id',
            'currency',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'codex-currency_code',
            'currency',
            'code',
            true
        );

        //2. status
        $this->createIndex(
            'currency-status',
            'currency',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');
    }
}
