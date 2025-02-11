<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ShiftMeal".
 *
 * @property int $shift_meal_id ID de la relación entre turno y comida
 * @property int|null $shift_id ID del turno
 * @property int|null $meal_id ID de la comida
 * @property string|null $created_at Fecha de creación del registro
 * @property int|null $status Estado del registro
 * @property int|null $active Registro activo o inactivo
 *
 * @property Meals $meal
 * @property Shifts $shift
 */
class ShiftMeal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ShiftMeal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shift_id', 'meal_id', 'status', 'active'], 'integer'],
            [['created_at'], 'safe'],
            [['shift_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shifts::class, 'targetAttribute' => ['shift_id' => 'shift_id']],
            [['meal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meals::class, 'targetAttribute' => ['meal_id' => 'meal_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shift_meal_id' => Yii::t('app', 'ID de la relación entre turno y comida'),
            'shift_id' => Yii::t('app', 'ID del turno'),
            'meal_id' => Yii::t('app', 'ID de la comida'),
            'created_at' => Yii::t('app', 'Fecha de creación del registro'),
            'status' => Yii::t('app', 'Estado del registro'),
            'active' => Yii::t('app', 'Registro activo o inactivo'),
        ];
    }

    /**
     * Gets query for [[Meal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeal()
    {
        return $this->hasOne(Meals::class, ['meal_id' => 'meal_id']);
    }

    /**
     * Gets query for [[Shift]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShift()
    {
        return $this->hasOne(Shifts::class, ['shift_id' => 'shift_id']);
    }
}
