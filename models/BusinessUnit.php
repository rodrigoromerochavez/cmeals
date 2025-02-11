// models/BusinessUnit.php
<?php
namespace app\models;

use yii\db\ActiveRecord;

class BusinessUnit extends ActiveRecord
{
    public static function tableName()
    {
        return 'BusinessUnits';
    }

    public function rules()
    {
        return [
            [['business_name'], 'string', 'max' => 100],
            [['created_at'], 'safe'],
            [['status', 'active'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'business_unit_id' => 'ID',
            'business_name' => 'Business Name',
            'created_at' => 'Created At',
            'status' => 'Status',
            'active' => 'Active',
        ];
    }

    public function getPositions()
    {
        return $this->hasMany(Position::class, ['business_unit_id' => 'business_unit_id']);
    }
}