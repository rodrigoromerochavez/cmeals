<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusinessUnits;

/**
 * BusinessUnitsSearch represents the model behind the search form of `app\models\BusinessUnits`.
 */
class BusinessUnitsSearch extends BusinessUnits
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_unit_id', 'status', 'active'], 'integer'],
            [['business_name', 'created_at'], 'safe'],
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
        $query = BusinessUnits::find();

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
            'business_unit_id' => $this->business_unit_id,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'business_name', $this->business_name]);

        return $dataProvider;
    }
}
