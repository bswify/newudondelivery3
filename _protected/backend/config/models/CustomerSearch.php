<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Customer;
use yii\db\Query;

/**
 * CustomerSearch represents the model behind the search form of `backend\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDCustomer', 'CustomerPoint'], 'integer'],
            [['CustomerFName', 'CustomerLName', 'CustomerImage', 'CustomerPhone', 'CUsername', 'CPasswords', 'LoginType'], 'safe'],
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
        //phpstrom 
//        $query = new Query();


        


        $query = Customer::find();

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
            'IDCustomer' => $this->IDCustomer,
            'CustomerPoint' => $this->CustomerPoint,
        ]);

        $query->andFilterWhere(['like', 'CustomerFName', $this->CustomerFName])
            ->andFilterWhere(['like', 'CustomerLName', $this->CustomerLName])
            ->andFilterWhere(['like', 'CustomerImage', $this->CustomerImage])
            ->andFilterWhere(['like', 'CustomerPhone', $this->CustomerPhone])
            ->andFilterWhere(['like', 'CUsername', $this->CUsername])
            ->andFilterWhere(['like', 'CPasswords', $this->CPasswords])
            ->andFilterWhere(['like', 'LoginType', $this->LoginType]);

        return $dataProvider;
    }
}
