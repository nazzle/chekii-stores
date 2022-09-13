<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enterprise".
 *
 * @property int $id
 * @property int $code
 * @property string|null $name
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $registration_details
 * @property string|null $other_info
 * @property int $status
 * @property int $updated_by
 * @property string|null $updated_at
 *
 * @property Employee[] $employees
 * @property EnterpriseBranch[] $enterpriseBranches
 * @property User $updatedBy
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'status', 'updated_by'], 'required'],
            [['code', 'status', 'updated_by'], 'default', 'value' => null],
            [['code', 'status', 'updated_by'], 'integer'],
            [['address', 'registration_details', 'other_info'], 'string'],
            [['updated_at'], 'safe'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
            'registration_details' => 'Registration Details',
            'other_info' => 'Other Info',
            'status' => 'Status',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery|EmployeeQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['enterprise_id' => 'code']);
    }

    /**
     * Gets query for [[EnterpriseBranches]].
     *
     * @return \yii\db\ActiveQuery|EnterpriseBranchQuery
     */
    public function getEnterpriseBranches()
    {
        return $this->hasMany(EnterpriseBranch::className(), ['enterprise_id' => 'code']);
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
     * @return EnterpriseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnterpriseQuery(get_called_class());
    }
}
