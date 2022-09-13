<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth_child_item}}`.
 */
class m220907_145233_create_auth_child_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth_child_item}}', [
            //'id' => $this->primaryKey(),
            'parent' => $this->string(),
            'child' => $this->string(),
        ]);

        $this->createIndex(
            'auth-item-parent',
            'auth_child_item',
            'parent'
        );

        // add foreign key
        $this->addForeignKey(
            'fk-auth-child-parent',
            'auth_child_item',
            'parent',
            'auth_item',
            'name',
            'CASCADE'
        );

        $this->createIndex(
            'auth-item-child',
            'auth_child_item',
            'child'
        );

        // add foreign key 
        $this->addForeignKey(
            'fk-auth-child-child',
            'auth_child_item',
            'child',
            'auth_item',
            'name',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auth_child_item}}');
    }
}
