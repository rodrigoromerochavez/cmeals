<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Positions".
 *
 * @property int $position_id ID del cargo o posición
 * @property string|null $position_name Nombre del cargo o posición
 * @property int|null $business_unit_id ID de la unidad de negocio
 * @property string|null $created_at Fecha de creación del registro
 * @property int|null $status Estado del registro
 * @property int|null $active Registro activo o inactivo
 *
 * @property BusinessUnits $businessUnit
 * @property People[] $peoples
 */
class Positions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_unit_id', 'status', 'active'], 'integer'],
            [['created_at'], 'safe'],
            [['position_name'], 'string', 'max' => 100],
            [['business_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessUnits::class, 'targetAttribute' => ['business_unit_id' => 'business_unit_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'position_id' => Yii::t('app', 'ID del cargo o posición'),
            'position_name' => Yii::t('app', 'Nombre del cargo o posición'),
            'business_unit_id' => Yii::t('app', 'ID Centro de Costos'),
            'created_at' => Yii::t('app', 'Fecha de creación del registro'),
            'status' => Yii::t('app', 'Estado del registro'),
            'active' => Yii::t('app', 'Registro activo o inactivo'),
        ];
    }

    /**
     * Gets query for [[BusinessUnit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessUnit()
    {
        return $this->hasOne(BusinessUnits::class, ['business_unit_id' => 'business_unit_id']);
    }

    /**
     * Gets query for [[Peoples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::class, ['position_id' => 'position_id']);
    }
}
