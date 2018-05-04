<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Respromotion;

/**
 * RespromotionSearch represents the model behind the search form of `frontend\models\Respromotion`.
 */
class RespromotionSearch extends Respromotion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDResPromotion',  'IDRestaurant'], 'integer'],
            [['ResPromotionName', 'ResPromotionStart', 'ResPromotionEnd'], 'safe'],
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
        $query = Respromotion::find();

        // add conditions that should always apply here

        $restaurantId = $this->searchResId($params);

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
//            'IDResPromotion' => $this->IDResPromotion,
//
//            'ResPromotionStart' => $this->ResPromotionStart,
//            'ResPromotionEnd' => $this->ResPromotionEnd,
//            'IDRestaurant' => $this->IDRestaurant,
//        ]);
//
//        $query->andFilterWhere(['like', 'ResPromotionName', $this->ResPromotionName]);

        $query->where(['IDRestaurant' => $this->IDRestaurant = $restaurantId]);
        return $dataProvider;
    }

    public function searchResId($userid){
        return $qurey = Restaurant::find()
            ->select("IDRestaurant")
            ->where(['IDUser' => $userid]);
    }
}
