<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 */
class m220213_154557_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'parent_id' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->text(),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'product-category-updated-by_id',
            'product_category',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-product-category-updated-by_id',
            'product_category',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'codex-product-category_code',
            'product_category',
            'code',
            true
        );

        //2. Parent ID
        $this->createIndex(
            'parentx-product-parent_id',
            'product_category',
            'parent_id'
        );

        //3. status
        $this->createIndex(
            'product-category-status',
            'product_category',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_category}}');
    }
}
