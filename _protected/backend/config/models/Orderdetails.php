<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orderdetails".
 *
 * @property int $IDOrderDetails รหัส
 * @property int $IDFood รหัสอาหาร
 * @property int $IDFoodDetails รหัสรายละเอียดอาหาร
 * @property int $AmountFood จำนวน
 * @property int $IDOrder รหัสการสั่งซื้อ
 *
 * @property Food $food
 * @property Fooddetails $foodDetails
 * @property Orders $order
 */
class Orderdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderdetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDFood', 'IDFoodDetails', 'AmountFood', 'IDOrder'], 'required'],
            [['IDFood', 'IDFoodDetails', 'AmountFood', 'IDOrder'], 'integer'],
            [['reason'],'string'],
            [['IDFood'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['IDFood' => 'IDFood']],
            [['IDFoodDetails'], 'exist', 'skipOnError' => true, 'targetClass' => Fooddetails::className(), 'targetAttribute' => ['IDFoodDetails' => 'IDFoodDetails']],
            [['IDOrder'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['IDOrder' => 'IDOrder']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDOrderDetails' => 'รหัส',
            'IDFood' => 'อาหาร',
            'IDFoodDetails' => 'รายละเอียดอาหาร',
            'AmountFood' => 'จำนวน',
            'IDOrder' => 'รหัสการสั่งซื้อ',
            'FoodDetailsPrice' => 'ราคาเพิ่ม',
            'FoodPrice' => 'ราคาอาหาร',
            'FoodImg' => 'รูป',
            'reason'=>'หมายเหตุ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['IDFood' => 'IDFood']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodDetails()
    {
        return $this->hasOne(Fooddetails::className(), ['IDFoodDetails' => 'IDFoodDetails']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['IDOrder' => 'IDOrder']);
    }


}
