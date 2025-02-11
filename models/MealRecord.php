// models/MealRecord.php
<?php
namespace app\models;

use yii\db\ActiveRecord;

class MealRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'MealRecords';
    }

    public function rules()
    {
        return [
            [['person_id', 'shift_id', 'meal_id'], 'integer'],
            [['first_name', 'last_name', 'position_name', 'business_unit_name', 'shift_name', 'meal_name'], 'string', 'max' => 100],
            [['id_card'], 'string', 'max' => 20],
            [['shift_start_time', 'shift_end_time', 'time'], 'safe'],
            [['date', 'created_at'], 'safe'],
            [['status', 'active'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'record_id' => 'ID',
            'person_id' => 'Person ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'id_card' => 'ID Card',
            'position_name' => 'Position',
            'business_unit_name' => 'Business Unit',
            'shift_id' => 'Shift ID',
            'shift_name' => 'Shift',
            'shift_start_time' => 'Shift Start',
            'shift_end_time' => 'Shift End',
            'meal_id' => 'Meal ID',
            'meal_name' => 'Meal',
            'date' => 'Date',
            'time' => 'Time',
            'created_at' => 'Created At',
            'status' => 'Status',
            'active' => 'Active',
        ];
    }
}
