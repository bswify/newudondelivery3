<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "foodtype".
 *
 * @property int $IDFoodType รหัส
 * @property string $FoodTypeName ชื่อประเภทอาหาร
 *
 * @property Food $food
 */
class Foodtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foodtype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FoodTypeName'], 'required'],
            [['FoodTypeName'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDFoodType' => 'รหัส',
            'FoodTypeName' => 'ชื่อประเภทอาหาร',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['IDFoodType' => 'IDFoodType']);
    }
}
