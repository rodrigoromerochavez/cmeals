<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShiftMeal;

/**
 * ShiftMealSearch represents the model behind the search form of `app\models\ShiftMeal`.
 */
class ShiftMealSearch extends ShiftMeal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shift_meal_id', 'shift_id', 'meal_id', 'status', 'active'], 'integer'],
            [['created_at'], 'safe'],
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
        $query = ShiftMeal::find();

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
            'shift_meal_id' => $this->shift_meal_id,
            'shift_id' => $this->shift_id,
            'meal_id' => $this->meal_id,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'active' => $this->active,
        ]);

        return $dataProvider;
    }
}
