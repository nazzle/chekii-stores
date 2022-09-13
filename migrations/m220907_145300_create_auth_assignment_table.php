<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth_assignment}}`.
 */
class m220907_145300_create_auth_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(),
            'user_id' => $this->integer(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'auth-assignment-item',
            'auth_assignment',
            'item_name'
        );

        // add foreign key
        $this->addForeignKey(
            'fk-auth-assignment-item',
            'auth_assignment',
            'item_name',
            'auth_item',
            'name',
            'CASCADE'
        );

        $this->createIndex(
            'auth-assignment-user',
            'auth_assignment',
            'user_id'
        );

        // add foreign key 
        $this->addForeignKey(
            'fk-auth-assignment-user',
            'auth_assignment',
            'user_id',
            'user',
            'code',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auth_assignment}}');
    }
}
