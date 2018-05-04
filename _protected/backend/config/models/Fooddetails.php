<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fooddetails".
 *
 * @property int $IDFoodDetails รหัส
 * @property string $FoodDetailName รายละเอียดอาหาร
 * @property int $IDFood รหัสอาหาร
 * @property int $FoodDetailsPrice ราคา
 *
 * @property Food $food
 * @property Orderdetails $orderdetails
 */
class Fooddetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fooddetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FoodDetailName', 'IDFood', 'FoodDetailsPrice'], 'required'],
            [['FoodDetailName'], 'string'],
            [['IDFood', 'FoodDetailsPrice'], 'integer'],
            // [['IDFood'], 'unique'],
            [['IDFood'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['IDFood' => 'IDFood']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDFoodDetails' => 'รหัส',
            'FoodDetailName' => 'รายละเอียดอาหาร',
            'IDFood' => 'รหัสอาหาร',
            'FoodDetailsPrice' => 'ราคา',
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
    public function getOrderdetails()
    {
        return $this->hasOne(Orderdetails::className(), ['IDFoodDetails' => 'IDFoodDetails']);
    }
}
