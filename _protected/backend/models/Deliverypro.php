<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "deliverypro".
 *
 * @property int $IDDeliveryPro รหัส
 * @property string $DeliveryProName ชื่อโปรโมชั่นการจัดส่ง
 * @property int $DeliveryProPiont แต้มที่ใช้
 * @property int $DeliveryProPrice ราคาส่วนลด
 * @property string $DeliveryProStart วันที่เริ่ม
 * @property string $DeliveryProEnd วันที่สิ้นสุด
 *
 * @property Delivery $delivery
 */
class Deliverypro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deliverypro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DeliveryProName', 'DeliveryProPiont', 'DeliveryProPrice', 'DeliveryProStart', 'DeliveryProEnd','kvdate'], 'required'],
            [['DeliveryProName','kvdate'], 'string'],
            [['DeliveryProPiont', 'DeliveryProPrice'], 'integer'],
            [['DeliveryProPiont'],'unique'],
            [['DeliveryProStart', 'DeliveryProEnd'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDDeliveryPro' => 'รหัส',
            'DeliveryProName' => 'ชื่อโปรโมชั่นการจัดส่ง',
            'DeliveryProPiont' => 'แต้มที่ใช้',
            'DeliveryProPrice' => 'ราคาค่าจัดส่ง',
            'DeliveryProStart' => 'วันที่เริ่ม',
            'DeliveryProEnd' => 'วันที่สิ้นสุด',
            'kvdate' => 'วันที่เริ่มต้น-สิ้นสุด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasOne(Delivery::className(), ['IDDeliveryPro' => 'IDDeliveryPro']);
    }
}
