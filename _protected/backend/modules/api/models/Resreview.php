<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "resreview".
 *
 * @property int $IDResReview รหัส
 * @property string $ResReviewDate วันที่
 * @property int $ResReviewScore คะแนน
 * @property string $ResComment ความคิดเห็น
 * @property string $ResReviewImage รูปภาพ
 * @property int $IDRestaurant รหัสร้านอาหาร
 * @property int $IDCustomer ชื่อลูกค้า
 *
 * @property Customer $customer
 * @property Restaurant $restaurant
 */
class Resreview extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resreview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ResReviewDate', 'ResReviewScore', 'ResComment', 'ResReviewImage', 'IDRestaurant', 'IDCustomer'], 'required'],
            [['ResReviewDate'], 'safe'],
            [['ResReviewScore', 'IDRestaurant', 'IDCustomer'], 'integer'],
            [['ResComment', 'ResReviewImage'], 'string'],
            [['IDCustomer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['IDCustomer' => 'IDCustomer']],
            [['IDRestaurant'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['IDRestaurant' => 'IDRestaurant']],
        ];
    }

    public function scenarios(){
        $scenarios =  parent::scenarios();
        $scenarios['create'] = ['ResReviewDate','ResReviewScore','ResComment','ResReviewImage','IDRestaurant','IDCustomer'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDResReview' => 'Idres Review',
            'ResReviewDate' => 'Res Review Date',
            'ResReviewScore' => 'Res Review Score',
            'ResComment' => 'Res Comment',
            'ResReviewImage' => 'Res Review Image',
            'IDRestaurant' => 'Idrestaurant',
            'IDCustomer' => 'Idcustomer',
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
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['IDRestaurant' => 'IDRestaurant']);
    }
}
