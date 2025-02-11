// models/Person.php
<?php
namespace app\models;

use yii\db\ActiveRecord;

class Person extends ActiveRecord
{
    public static function tableName()
    {
        return 'People';
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['id_card'], 'string', 'max' => 20],
            [['position_id'], 'integer'],
            [['created_at'], 'safe'],
            [['status', 'active'], 'integer'],
            [['id_card'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'person_id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'id_card' => 'ID Card',
            'position_id' => 'Position',
            'created_at' => 'Created At',
            'status' => 'Status',
            'active' => 'Active',
        ];
    }

    public function getPosition()
    {
        return $this->hasOne(Position::class, ['position_id' => 'position_id']);
    }
}

