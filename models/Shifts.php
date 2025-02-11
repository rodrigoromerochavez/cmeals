<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Shifts".
 *
 * @property int $shift_id ID del turno
 * @property string|null $shift_name Nombre del turno
 * @property string|null $start_time Hora de inicio del turno
 * @property string|null $end_time Hora de finalización del turno
 * @property string|null $created_at Fecha de creación del registro
 * @property int|null $status Estado del registro
 * @property int|null $active Registro activo o inactivo
 *
 * @property ShiftMeal[] $shiftMeals
 */
class Shifts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Shifts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_time', 'end_time', 'created_at'], 'safe'],
            [['status', 'active'], 'integer'],
            [['shift_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shift_id' => Yii::t('app', 'ID del turno'),
            'shift_name' => Yii::t('app', 'Nombre del turno'),
            'start_time' => Yii::t('app', 'Hora de inicio del turno'),
            'end_time' => Yii::t('app', 'Hora de finalización del turno'),
            'created_at' => Yii::t('app', 'Fecha de creación del registro'),
            'status' => Yii::t('app', 'Estado del registro'),
            'active' => Yii::t('app', 'Registro activo o inactivo'),
        ];
    }

    /**
     * Gets query for [[ShiftMeals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShiftMeals()
    {
        return $this->hasMany(ShiftMeal::class, ['shift_id' => 'shift_id']);
    }
}
