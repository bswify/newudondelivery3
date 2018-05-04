<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Restaurant;

/**
 * RestaurantSearch represents the model behind the search form of `frontend\models\Restaurant`.
 */
class RestaurantSearch extends Restaurant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDRestaurant', 'ResLowPrice', 'IDLocation', 'IDUser'], 'integer'],
            [['ResName', 'ResAddress', 'ResStatus', 'ResTel', 'ResTimeStart', 'ResTimeEnd', 'ResImg', 'latlng', 'LoginType'], 'safe'],
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
        $query = Restaurant::find();

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
        $query->where(['IDUser' => $this->IDUser = $params]);
//        $query->andFilterWhere([
//            'IDUser' => $this->IDUser,
////            'IDRestaurant' => $this->IDRestaurant,
////            'ResLowPrice' => $this->ResLowPrice,
////            'ResTimeStart' => $this->ResTimeStart,
////            'ResTimeEnd' => $this->ResTimeEnd,
////            'IDLocation' => $this->IDLocation,
//        ]);

//        $query->andFilterWhere(['like', 'ResName', $this->ResName])
//            ->andFilterWhere(['like', 'ResAddress', $this->ResAddress])
//            ->andFilterWhere(['like', 'ResStatus', $this->ResStatus])
//            ->andFilterWhere(['like', 'ResTel', $this->ResTel])
////            ->andFilterWhere(['like', 'RUsername', $this->RUsername])
////            ->andFilterWhere(['like', 'Rpasswords', $this->Rpasswords])
//            ->andFilterWhere(['like', 'ResImg', $this->ResImg])
//            ->andFilterWhere(['like', 'latlng', $this->latlng])
//            ->andFilterWhere(['like', 'LoginType', $this->LoginType]);

        return $dataProvider;
    }
}
