<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MealRecords".
 *
 * @property int $record_id ID del registro de comida
 * @property int|null $person_id ID de la persona
 * @property string|null $first_name Nombre de la persona
 * @property string|null $last_name Apellido de la persona
 * @property string|null $id_card Carnet de identidad de la persona
 * @property string|null $position_name Nombre del cargo o posición
 * @property string|null $business_unit_name Nombre de la unidad de negocio
 * @property int|null $shift_id ID del turno
 * @property string|null $shift_name Nombre del turno
 * @property string|null $shift_start_time Hora de inicio del turno
 * @property string|null $shift_end_time Hora de finalización del turno
 * @property int|null $meal_id ID de la comida
 * @property string|null $meal_name Nombre de la comida
 * @property string|null $date Fecha del consumo de la comida
 * @property string|null $time Hora del consumo de la comida
 * @property string|null $created_at Fecha de creación del registro
 * @property int|null $status Estado del registro
 * @property int|null $active Registro activo o inactivo
 */
class MealRecords extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MealRecords';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'shift_id', 'meal_id', 'status', 'active'], 'integer'],
            [['shift_start_time', 'shift_end_time', 'date', 'time', 'created_at'], 'safe'],
            [['first_name', 'last_name', 'position_name', 'business_unit_name', 'shift_name', 'meal_name'], 'string', 'max' => 100],
            [['id_card'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'record_id' => Yii::t('app', 'ID del registro de comida'),
            'person_id' => Yii::t('app', 'ID de la persona'),
            'first_name' => Yii::t('app', 'Nombre de la persona'),
            'last_name' => Yii::t('app', 'Apellido de la persona'),
            'id_card' => Yii::t('app', 'Carnet de identidad de la persona'),
            'position_name' => Yii::t('app', 'Nombre del cargo o posición'),
            'business_unit_name' => Yii::t('app', 'Nombre de la unidad de negocio'),
            'shift_id' => Yii::t('app', 'ID del turno'),
            'shift_name' => Yii::t('app', 'Nombre del turno'),
            'shift_start_time' => Yii::t('app', 'Hora de inicio del turno'),
            'shift_end_time' => Yii::t('app', 'Hora de finalización del turno'),
            'meal_id' => Yii::t('app', 'ID de la comida'),
            'meal_name' => Yii::t('app', 'Nombre de la comida'),
            'date' => Yii::t('app', 'Fecha del consumo de la comida'),
            'time' => Yii::t('app', 'Hora del consumo de la comida'),
            'created_at' => Yii::t('app', 'Fecha de creación del registro'),
            'status' => Yii::t('app', 'Estado del registro'),
            'active' => Yii::t('app', 'Registro activo o inactivo'),
        ];
    }
}
