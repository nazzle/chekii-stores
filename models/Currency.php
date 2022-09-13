<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property int $code
 * @property string|null $symbol
 * @property string|null $name
 * @property string|null $description
 *
 * @property Product[] $products
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'symbol'], 'required'],
            [['code'], 'default', 'value' => null],
            [['code'], 'integer'],
            [['description'], 'string'],
            [['symbol'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 115],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'symbol' => 'Symbol',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery|ProductQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['price_currency' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CurrencyQuery(get_called_class());
    }
}
