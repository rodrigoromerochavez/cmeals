// models/Meal.php
<?php
namespace app\models;

use yii\db\ActiveRecord;

class Meal extends ActiveRecord
{
    public static function tableName()
    {
        return 'Meals';
    }

    public function rules()
    {
        return [
            [['meal_name'], 'string', 'max' => 100],
            [['created_at'], 'safe'],
            [['status', 'active'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'meal_id' => 'ID',
            'meal_name' => 'Meal Name',
            'created_at' => 'Created At',
            'status' => 'Status',
            'active' => 'Active',
        ];
    }

    public function getShiftMeals()
    {
        return $this->hasMany(ShiftMeal::class, ['meal_id' => 'meal_id']);
    }
}
