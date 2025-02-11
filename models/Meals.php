<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Meals".
 *
 * @property int $meal_id ID de la comida
 * @property string|null $meal_name Nombre de la comida (desayuno, almuerzo, etc.)
 * @property string|null $created_at Fecha de creación del registro
 * @property int|null $status Estado del registro
 * @property int|null $active Registro activo o inactivo
 *
 * @property ShiftMeal[] $shiftMeals
 */
class Meals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Meals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['status', 'active'], 'integer'],
            [['meal_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meal_id' => 'ID de la comida',
            'meal_name' => 'Nombre de la comida (desayuno, almuerzo, etc.)',
            'created_at' => 'Fecha de creación del registro',
            'status' => 'Estado del registro',
            'active' => 'Registro activo o inactivo',
        ];
    }

    /**
     * Gets query for [[ShiftMeals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShiftMeals()
    {
        return $this->hasMany(ShiftMeal::class, ['meal_id' => 'meal_id']);
    }
}
