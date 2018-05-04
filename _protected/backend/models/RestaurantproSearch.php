<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Restaurant;
use yii\db\Query;

/**
 * RestaurantproSearch represents the model behind the search form of `backend\models\Restaurant`.
 * @property mixed IDUser
 */
class RestaurantproSearch extends Restaurant
{

    public $ResPromotionStart;
    public $ResPromotionEnd;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDRestaurant', 'ResLowPrice', 'IDLocation', 'IDUser'], 'integer'],
            [['ResName', 'ResAddress', 'ResStatus', 'ResTel', 'ResTimeStart', 'ResTimeEnd', 'ResImg', 'latlng', 'LoginType',
                'ResPromotionEnd','ResPromotionStart'], 'safe'],
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
     * @throws \yii\db\Exception
     */
    public function search($params)
    {
        $query = Restaurant::find()->innerJoinWith(['respromotion']);


//        $query = new Query;
//        $query->select([
//                'restaurant.ResName',
//                'restaurant.ResLowPrice',
//                'restaurant.ResImg',
//                'respromotion.ResPromotionName',
//                'respromotion.ResPromotionStart',
//                'respromotion.ResPromotionEnd'
//            ]
//        )
//            ->from('respromotion')
//            ->join('INNER JOIN', 'restaurant',
//                'respromotion.IDRestaurant = restaurant.IDRestaurant')
//            ->andWhere('respromotion.ResPromotionStart <= "2018-02-20"')
//            ->andWhere('respromotion.ResPromotionEnd >= "2018-02-20"')
//            ->LIMIT(50);
//
//        $command = $query->createCommand();
//        $data = $command->queryAll();


//        print("<pre>".print_r($query,true)."</pre>");

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
            'IDRestaurant' => $this->IDRestaurant,
            'ResLowPrice' => $this->ResLowPrice,
            'ResTimeStart' => $this->ResTimeStart,
            'ResTimeEnd' => $this->ResTimeEnd,
            'IDLocation' => $this->IDLocation,
            'IDUser' => $this->IDUser,
        ]);

        $query->andFilterWhere(['like', 'ResName', $this->ResName])
            ->andFilterWhere(['like', 'ResAddress', $this->ResAddress])
            ->andFilterWhere(['like', 'ResStatus', $this->ResStatus])
            ->andFilterWhere(['like', 'ResTel', $this->ResTel])
            ->andFilterWhere(['like', 'ResImg', $this->ResImg])
            ->andFilterWhere(['like', 'latlng', $this->latlng])
            ->andFilterWhere(['like', 'LoginType', $this->LoginType]);

        $query->andFilterWhere(['<=','respromotion.ResPromotionStart',$this->ResPromotionStart])
            ->andFilterWhere(['>=','respromotion.ResPromotionEnd',$this->ResPromotionEnd]);

        return $dataProvider;
//        return $query;

    }

}
