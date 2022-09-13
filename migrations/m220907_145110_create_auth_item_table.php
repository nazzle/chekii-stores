<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth_item}}`.
 */
class m220907_145110_create_auth_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth_item}}', [
            'name' => $this->string(),
            'type' => $this->smallInteger(),
            'description' => $this->text(),
            'data' => $this->text(8),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'auth-item-name',
            'auth_item',
            'name',
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auth_item}}');
    }
}
