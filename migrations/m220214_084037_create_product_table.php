<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220214_084037_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'code' => $this->smallInteger(8)->notNull(),
            'category_id' => $this->integer(),
            'supplier_id' => $this->integer(),
            'name' => $this->string(115)->notNull(),
            'description' => $this->text(),
            'price_currency' => $this->integer(11)->notNull(),
            'price' => $this->integer(11)->notNull(),
            'size' => $this->string(25),
            'color' => $this->string(25),
            'picture' => $this->string(155),
            'status' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->dateTime(6),
        ]);

        $this->createIndex(
            'product-updated-by_id',
            'product',
            'updated_by'
        );

        $this->addForeignKey(
            'fk-product-updated-by_id',
            'product',
            'updated_by',
            'user',
            'code',
            'CASCADE'
        );

        // creating indeces for database columns
        //1. Code
        $this->createIndex(
            'codex-product_code',
            'product',
            'code',
            true
        );

        //2. category ID
        $this->createIndex(
            'categoryx-category_id',
            'product',
            'category_id'
        );

        // add foreign key for category id column
        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'product_category',
            'code',
            'CASCADE'
        );

        //3. price currency ID
        $this->createIndex(
            'currencyx-currency_id',
            'product',
            'price_currency'
        );

        // add foreign key for currency id column
        $this->addForeignKey(
            'fk-price-currency_id',
            'product',
            'price_currency',
            'currency',
            'code',
            'CASCADE'
        );

        //4. Supplier ID
        $this->createIndex(
            'supplierx-supplier_id',
            'product',
            'supplier_id'
        );

        // add foreign key for supplier id column
        $this->addForeignKey(
            'fk-supplierx-supplier_id',
            'product',
            'supplier_id',
            'supplier',
            'code',
            'CASCADE'
        );

        //2. status
        $this->createIndex(
            'product-status',
            'product',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
