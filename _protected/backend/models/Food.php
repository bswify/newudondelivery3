<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $IDFood รหัส
 * @property string $FoodName ชื่ออาหาร
 * @property int $FoodPrice ราคา
 * @property int $IDFoodType ประเภท
 * @property int $IDRestaurant รหัสร้านอาหาร
 * @property string $MenuTypeName ชื่อเมนู
 *
 * @property Favoritemenu $favoritemenu
 * @property Foodtype $foodType
 * @property Restaurant $restaurant
 * @property Fooddetails $fooddetails
 * @property Orderdetails $orderdetails
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FoodName', 'FoodPrice', 'IDFoodType', 'IDRestaurant', 'MenuTypeName'], 'required'],
            [['FoodName', 'MenuTypeName'], 'string'],
            [['FoodPrice', 'IDFoodType', 'IDRestaurant'], 'integer'],
            // [['IDRestaurant'], 'unique'],
            // [['IDFoodType'], 'unique'],
            [['IDFoodType'], 'exist', 'skipOnError' => true, 'targetClass' => Foodtype::className(), 'targetAttribute' => ['IDFoodType' => 'IDFoodType']],
            [['IDRestaurant'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['IDRestaurant' => 'IDRestaurant']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDFood' => 'รหัส',
            'FoodName' => 'ชื่ออาหาร',
            'FoodPrice' => 'ราคา',
            'IDFoodType' => 'ประเภท',
            'IDRestaurant' => 'รหัสร้านอาหาร',
            'MenuTypeName' => 'ชื่อเมนู',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritemenu()
    {
        return $this->hasOne(Favoritemenu::className(), ['IDFood' => 'IDFood']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodType()
    {
        return $this->hasOne(Foodtype::className(), ['IDFoodType' => 'IDFoodType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['IDRestaurant' => 'IDRestaurant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFooddetails()
    {
        return $this->hasOne(Fooddetails::className(), ['IDFood' => 'IDFood']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasOne(Orderdetails::className(), ['IDFood' => 'IDFood']);
    }
}
