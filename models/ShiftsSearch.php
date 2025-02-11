<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shifts;

/**
 * ShiftsSearch represents the model behind the search form of `app\models\Shifts`.
 */
class ShiftsSearch extends Shifts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shift_id', 'status', 'active'], 'integer'],
            [['shift_name', 'start_time', 'end_time', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Shifts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'shift_id' => $this->shift_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'shift_name', $this->shift_name]);

        return $dataProvider;
    }
}
