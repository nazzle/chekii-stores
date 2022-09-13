<?php

namespace app\models;

use Yii;

/**
 * This is the ActiveQuery class for [[Currency]].
 *
 * @see Currency
 */
class CurrencyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Currency[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Currency|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    // Quering all currencies
    public function currencyAll()
    {
      $posts = Yii::$app->db->createCommand('SELECT * FROM currency')
            ->queryAll();

      return $posts;
    }
}
