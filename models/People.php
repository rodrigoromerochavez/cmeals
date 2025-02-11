<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "People".
 *
 * @property int $person_id ID de la persona
 * @property string|null $first_name Nombre
 * @property string|null $last_name Apellido
 * @property string|null $id_card Carnet de identidad
 * @property int|null $position_id ID del cargo o posición
 * @property string|null $created_at Fecha de creación del registro
 * @property int|null $status Estado del registro
 * @property int|null $active Registro activo o inactivo
 *
 * @property Positions $position
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'People';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_id', 'status', 'active'], 'integer'],
            [['created_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['id_card'], 'string', 'max' => 20],
            [['id_card'], 'unique'],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Positions::class, 'targetAttribute' => ['position_id' => 'position_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'ID de la persona'),
            'first_name' => Yii::t('app', 'Nombre'),
            'last_name' => Yii::t('app', 'Apellido'),
            'id_card' => Yii::t('app', 'Carnet de identidad'),
            'position_id' => Yii::t('app', 'ID del cargo o posición'),
            'created_at' => Yii::t('app', 'Fecha de creación del registro'),
            'status' => Yii::t('app', 'Estado del registro'),
            'active' => Yii::t('app', 'Registro activo o inactivo'),
        ];
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Positions::class, ['position_id' => 'position_id']);
    }
}
