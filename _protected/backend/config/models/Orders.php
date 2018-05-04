<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $IDOrder รหัส
 * @property string $OrderDate วันที่
 * @property string $OrderNote หมายเหตุ
 * @property int $OrderTotalPrice ราคารวม
 * @property string $OrderStatus สถานะการสั่งซื้อ
 * @property int $IDPaymant รหัสประเภทการชำระเงิน
 * @property int $IDCustomer รหัสลูกค้า
 * @property int $IDEmp รหัสพนักงาน
 * @property int $IDCustomerAddress รหัสที่อยู่ลูกค้า
 * @property string $Orderpayprice จำนวนเงินที่จะจ่าย
 *
 * @property Delivery $deliveries
 * @property Orderdetails[] $orderdetails
 * @property Customer $customer
 * @property Employee $emp
 * @property Payment $paymant
 * @property Deliverytime $deliverytime
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OrderDate', 'OrderTotalPrice', 'OrderStatus', 'IDPaymant', 'IDCustomer', 'IDEmp','IDCustomerAddress',], 'required'],
            [['OrderDate'], 'safe'],
            [['OrderNote', 'OrderStatus','Orderpayprice'], 'string'],
            [['OrderTotalPrice', 'IDPaymant', 'IDCustomer', 'IDEmp'], 'integer'],
            [['IDCustomer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['IDCustomer' => 'IDCustomer']],
            [['IDEmp'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['IDEmp' => 'IDEmp']],
            [['IDPaymant'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['IDPaymant' => 'IDPaymant']],
            [['IDCustomerAddress'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerAddress::className(), 'targetAttribute' => ['IDCustomerAddress' => 'IDCustomerAddress']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDOrder' => 'รหัส',
            'OrderDate' => 'วันที่สั่งซื้อ',
            'OrderNote' => 'หมายเหตุ',
            'OrderTotalPrice' => 'ราคารวม',
            'OrderStatus' => 'สถานะการสั่งซื้อ',
            'IDPaymant' => 'รหัสประเภทการชำระเงิน',
            'IDCustomer' => 'รหัสลูกค้า',
            'IDEmp' => 'รหัสพนักงาน',
            'IDCustomerAddress' => 'รหัสที่อยู่',
            'Orderpayprice' => 'จำนวนเงินที่จะจ่าย'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getDeliveries()
    {
        return $this->hasOne(Delivery::className(), ['IDOrder' => 'IDOrder']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasMany(Orderdetails::className(), ['IDOrder' => 'IDOrder']);
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
    public function getEmp()
    {
        return $this->hasOne(Employee::className(), ['IDEmp' => 'IDEmp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymant()
    {
        return $this->hasOne(Payment::className(), ['IDPaymant' => 'IDPaymant']);
    }
    public function getCusadd()
    {
        return $this->hasOne(CustomerAddress::className(), ['IDCustomerAddress' => 'IDCustomerAddress']);
    }




}
