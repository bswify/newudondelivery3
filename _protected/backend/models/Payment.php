<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $IDPaymant รหัส
 * @property string $PaymentName ชื่อการชำระเงิน
 *
 * @property Orders[] $orders
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PaymentName'], 'required'],
            [['PaymentName'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDPaymant' => 'รหัส',
            'PaymentName' => 'ชื่อการชำระเงิน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['IDPaymant' => 'IDPaymant']);
    }
}
