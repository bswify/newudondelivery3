<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customeraddress".
 *
 * @property int $IDCustomerAddress รหัส
 * @property int $CustomerAddNo บ้านเลขที่
 * @property string $CustomerAddRoad ซอย/ถนน
 * @property int $IDCustomer รหัสสมาชิก
 *
 * @property Customer $customer
 */
class CustomerAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customeraddress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDCustomer'], 'required'],
            [['CustomerAddNo', 'IDCustomer'], 'integer'],
            [['CustomerAddRoad','map'], 'string'],
//            [['IDCustomer'], 'unique'],
            [['IDCustomer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['IDCustomer' => 'IDCustomer']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDCustomerAddress' => 'รหัส',
            'CustomerAddNo' => 'บ้านเลขที่',
            'CustomerAddRoad' => 'ซอย/ถนน',
            'IDCustomer' => 'ชื่อลูกค้า',
            'map' => 'แผ่นที่',
            // 'CustomerFName' => 'ชื่อสมาชิก',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['IDCustomer' => 'IDCustomer']);
    }



    const SCENARIO_CREATE = 'create';

//    public function scenarios(){
//        $scenarios =  parent::scenarios();
//        $scenarios['create'] = ['CustomerAddNo','CustomerAddRoad','IDCustomer'];
//        return $scenarios;
//    }
    public function scenarios(){
        $scenarios =  parent::scenarios();
        $scenarios['create'] = ['map','IDCustomer'];
        return $scenarios;
    }


}
