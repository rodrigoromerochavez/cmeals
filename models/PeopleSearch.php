<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\People;

/**
 * PeopleSearch represents the model behind the search form of `app\models\People`.
 */
class PeopleSearch extends People
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'position_id', 'status', 'active'], 'integer'],
            [['first_name', 'last_name', 'id_card', 'created_at'], 'safe'],
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
        $query = People::find();

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
            'person_id' => $this->person_id,
            'position_id' => $this->position_id,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'id_card', $this->id_card]);

        return $dataProvider;
    }
}
