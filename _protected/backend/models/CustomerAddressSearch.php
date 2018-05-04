<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CustomerAddress;

/**
 * CustomerAddressSearch represents the model behind the search form of `backend\models\CustomerAddress`.
 */
class CustomerAddressSearch extends CustomerAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDCustomerAddress', 'CustomerAddNo', 'IDCustomer'], 'integer'],
            [['CustomerAddRoad'], 'safe'],
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
        $query = CustomerAddress::find();
        $query2 = CustomerAddress::find()->where('IDCustomer = '.$params);

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
            'IDCustomerAddress' => $this->IDCustomerAddress,
            'CustomerAddNo' => $this->CustomerAddNo,
            'IDCustomer' => $this->IDCustomer,
        ]);

        $query->andFilterWhere(['like', 'CustomerAddRoad', $this->CustomerAddRoad]);

        return $dataProvider;
    }
}
