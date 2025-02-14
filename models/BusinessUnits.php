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
 * @property string|null $internal_code
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
            [['internal_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'business_unit_id' => Yii::t('app', 'ID de la unidad de negocio'),
            'business_name' => Yii::t('app', 'Nombre de la unidad de negocio'),
            'created_at' => Yii::t('app', 'Fecha de creación del registro'),
            'status' => Yii::t('app', 'Estado del registro'),
            'active' => Yii::t('app', 'Registro activo o inactivo'),
            'internal_code' => Yii::t('app', 'Codigo'),
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
