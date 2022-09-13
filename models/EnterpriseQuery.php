<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Enterprise]].
 *
 * @see Enterprise
 */
class EnterpriseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Enterprise[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Enterprise|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
