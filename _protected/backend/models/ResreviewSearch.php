<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Resreview;

/**
 * ResreviewSearch represents the model behind the search form of `backend\models\Resreview.php`.
 */
class ResreviewSearch extends Resreview
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDResReview', 'ResReviewScore', 'IDRestaurant', 'IDCustomer'], 'integer'],
            [['ResReviewDate', 'ResComment', 'ResReviewImage'], 'safe'],
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
        $query = Resreview::find();

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
            'IDResReview' => $this->IDResReview,
            'ResReviewDate' => $this->ResReviewDate,
            'ResReviewScore' => $this->ResReviewScore,
            'IDRestaurant' => $this->IDRestaurant,
            'IDCustomer' => $this->IDCustomer,
        ]);

        $query->andFilterWhere(['like', 'ResComment', $this->ResComment])
            ->andFilterWhere(['like', 'ResReviewImage', $this->ResReviewImage]);

        return $dataProvider;
    }
}
