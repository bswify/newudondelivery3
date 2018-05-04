<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "deliverytime".
 *
 * @property int $IDDeliveryTime รหัส
 * @property string $DeliveryTime เวลา
 *
 * @property Delivery $delivery
 */
class Deliverytime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deliverytime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DeliveryTime'], 'required'],
            [['DeliveryTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDDeliveryTime' => 'รหัส',
            'DeliveryTime' => 'เวลา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasOne(Delivery::className(), ['IDDeliveryTime' => 'IDDeliveryTime']);
    }
}
