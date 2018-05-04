<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Deliverypro;

/**
 * DeliveryproSearch represents the model behind the search form of `backend\models\Deliverypro`.
 */
class DeliveryproSearch extends Deliverypro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDDeliveryPro', 'DeliveryProPiont', 'DeliveryProPrice'], 'integer'],
            [['DeliveryProName', 'DeliveryProStart', 'DeliveryProEnd'], 'safe'],
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
        $query = Deliverypro::find();

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
            'IDDeliveryPro' => $this->IDDeliveryPro,
            'DeliveryProPiont' => $this->DeliveryProPiont,
            'DeliveryProPrice' => $this->DeliveryProPrice,
            'DeliveryProStart' => $this->DeliveryProStart,
            'DeliveryProEnd' => $this->DeliveryProEnd,
        ]);

        $query->andFilterWhere(['like', 'DeliveryProName', $this->DeliveryProName]);

        return $dataProvider;
    }
}
