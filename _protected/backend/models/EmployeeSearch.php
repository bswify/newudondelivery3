<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `backend\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDEmp', 'EmpPhone'], 'integer'],
            [['EmpFName', 'EmpLname', 'EUsername', 'Epasswords', 'LoginType'], 'safe'],
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
        $query = Employee::find();

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
            'IDEmp' => $this->IDEmp,
            'EmpPhone' => $this->EmpPhone,
        ]);

        $query->andFilterWhere(['like', 'EmpFName', $this->EmpFName])
            ->andFilterWhere(['like', 'EmpLname', $this->EmpLname])
            ->andFilterWhere(['like', 'EUsername', $this->EUsername])
            ->andFilterWhere(['like', 'Epasswords', $this->Epasswords])
            ->andFilterWhere(['like', 'LoginType', $this->LoginType]);

        return $dataProvider;
    }
}
