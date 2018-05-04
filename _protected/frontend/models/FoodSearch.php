<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Food;

/**
 * FoodSearch represents the model behind the search form of `frontend\models\Food`.
 */
class FoodSearch extends Food
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDFood', 'FoodPrice', 'IDFoodType', 'IDRestaurant'], 'integer'],
            [['FoodImg', 'FoodName', 'MenuTypeName'], 'safe'],
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
        $query = Food::find();
//        $query2 = Food::find()->select('FoodName,FoodPrice,IDFoodType')
//            ->from('Food');


        $restaurantId = $this->searchResId($params);

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
//        $query->andFilterWhere([
//            'IDFood' => $this->IDFood,
//            'FoodPrice' => $this->FoodPrice,
//            'IDFoodType' => $this->IDFoodType,
//            'IDRestaurant' => $this->IDRestaurant,
//        ]);

//        $query->andFilterWhere(['like', 'FoodImg', $this->FoodImg])
//            ->andFilterWhere(['like', 'FoodName', $this->FoodName])
//            ->andFilterWhere(['like', 'MenuTypeName', $this->MenuTypeName]);
        $query->where(['IDRestaurant' => $this->IDRestaurant = $restaurantId]);

        return $dataProvider;
    }

    /**
     * @param $userid
     * @return \yii\db\ActiveQuery
     */
    private function searchResId($userid){
        return $qurey = Restaurant::find()
            ->select("IDRestaurant")
            ->where(['IDUser' => $userid]);
    }
}
