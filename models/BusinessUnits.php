<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "BusinessUnits".
 *
 * @property int $business_unit_id ID de la unidad de negocio
 * @property string|null $business_name Nombre de la unidad de negocio
 * @property string|null $created_at Fecha de creación del registro
 * @property int|null $status Estado del registro
 * @property int|null $active Registro activo o inactivo
 *
 * @property Positions[] $positions
 */
class BusinessUnits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'BusinessUnits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['status', 'active'], 'integer'],
            [['business_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'business_unit_id' => 'ID de la unidad de negocio',
            'business_name' => 'Nombre de la unidad de negocio',
            'created_at' => 'Fecha de creación del registro',
            'status' => 'Estado del registro',
            'active' => 'Registro activo o inactivo',
        ];
    }

    /**
     * Gets query for [[Positions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Positions::class, ['business_unit_id' => 'business_unit_id']);
    }
}
