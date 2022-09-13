<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property int $enterprise_id
 * @property int $code
 * @property string|null $name
 * @property string|null $address
 * @property string|null $phone
 * @property int $status
 * @property int $updated_by
 * @property string|null $updated_at
 *
 * @property Enterprise $enterprise
 * @property User $updatedBy
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enterprise_id', 'code', 'status', 'updated_by'], 'required'],
            [['enterprise_id', 'code', 'status', 'updated_by'], 'default', 'value' => null],
            [['enterprise_id', 'code', 'status', 'updated_by'], 'integer'],
            [['updated_at'], 'safe'],
            [['name', 'address', 'phone'], 'string', 'max' => 255],
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
            'enterprise_id' => 'Enterprise ID',
            'code' => 'Code',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
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
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }
}
