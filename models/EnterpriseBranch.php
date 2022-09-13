<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enterprise_branch".
 *
 * @property int $id
 * @property int $code
 * @property string|null $name
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property int $enterprise_id
 * @property int $status
 * @property int $updated_by
 * @property string|null $updated_at
 *
 * @property Enterprise $enterprise
 * @property Inventory[] $inventories
 * @property User $updatedBy
 */
class EnterpriseBranch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enterprise_branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'enterprise_id', 'status', 'updated_by'], 'required'],
            [['code', 'enterprise_id', 'status', 'updated_by'], 'default', 'value' => null],
            [['code', 'enterprise_id', 'status', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['updated_at'], 'safe'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['enterprise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enterprise::className(), 'targetAttribute' => ['enterprise_id' => 'code']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'code']],
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
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'enterprise_id' => 'Enterprise ID',
            'status' => 'Status',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Enterprise]].
     *
     * @return \yii\db\ActiveQuery|EnterpriseQuery
     */
    public function getEnterprise()
    {
        return $this->hasOne(Enterprise::className(), ['code' => 'enterprise_id']);
    }

    /**
     * Gets query for [[Inventories]].
     *
     * @return \yii\db\ActiveQuery|InventoryQuery
     */
    public function getInventories()
    {
        return $this->hasMany(Inventory::className(), ['branch_id' => 'code']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['code' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return EnterpriseBranchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnterpriseBranchQuery(get_called_class());
    }
}
