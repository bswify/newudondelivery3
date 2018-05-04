<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "favoritemenu".
 *
 * @property int $IDFavoriteManu รหัส
 * @property int $IDFood รหัสอาหาร
 * @property int $IDCustomer รหัสสมาชิก
 *
 * @property Customer $customer
 * @property Food $food
 */
class Favoritemenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favoritemenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDFood', 'IDCustomer'], 'required'],
            [['IDFood', 'IDCustomer'], 'integer'],
            [['IDCustomer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['IDCustomer' => 'IDCustomer']],
            [['IDFood'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['IDFood' => 'IDFood']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDFavoriteManu' => 'รหัส',
            'IDFood' => 'รหัสอาหาร',
            'IDCustomer' => 'รหัสสมาชิก',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['IDCustomer' => 'IDCustomer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['IDFood' => 'IDFood']);
    }

    const SCENARIO_CREATE = 'create';

    public function scenarios(){
        $scenarios =  parent::scenarios();
        $scenarios['create'] = ['IDFood','IDCustomer'];
        return $scenarios;
    }
}
