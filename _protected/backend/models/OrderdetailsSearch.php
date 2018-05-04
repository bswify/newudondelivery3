<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Orderdetails;

/**
 * OrderdetailsSearch represents the model behind the search form of `backend\models\Orderdetails`.
 */
class OrderdetailsSearch extends Orderdetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDOrderDetails', 'IDFood', 'IDFoodDetails', 'AmountFood', 'IDOrder'], 'integer'],
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
        $query = Orderdetails::find();
        $query2 = Orderdetails::find()->where('IDOrder = '.$params);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query2,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IDOrderDetails' => $this->IDOrderDetails,
            'IDFood' => $this->IDFood,
            'IDFoodDetails' => $this->IDFoodDetails,
            'AmountFood' => $this->AmountFood,
            'IDOrder' => $this->IDOrder,
        ]);

        return $dataProvider;
    }
}
