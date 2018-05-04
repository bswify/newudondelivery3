<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Fooddetails;

/**
 * FooddetailsSearch represents the model behind the search form of `backend\models\Fooddetails`.
 */
class FooddetailsSearch extends Fooddetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDFoodDetails', 'IDFood', 'FoodDetailsPrice'], 'integer'],
            [['FoodDetailName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Fooddetails::find();

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
            'IDFoodDetails' => $this->IDFoodDetails,
            'IDFood' => $this->IDFood,
            'FoodDetailsPrice' => $this->FoodDetailsPrice,
        ]);

        $query->andFilterWhere(['like', 'FoodDetailName', $this->FoodDetailName]);

        return $dataProvider;
    }
}
