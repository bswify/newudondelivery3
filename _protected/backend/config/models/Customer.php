<?php

namespace backend\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $IDCustomer รหัส
 * @property string $CustomerFName ชื่อ
 * @property string $CustomerLName นามสกุล
 * @property string $CustomerImage รูปภาพ
 * @property int $CustomerPoint แต้มสะสม
 * @property string $CustomerPhone เบอร์โทร
 * @property string $CUsername Username
 * @property string $CPasswords Password
 * @property string $LoginType ประเภท
 *
 * @property CustomerAddress $customeraddress
 * @property Favoritemenu $favoritemenu
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CustomerFName', 'CustomerLName',  'CustomerPoint', 'CustomerPhone', 'CUsername', 'CPasswords', 'LoginType'], 'required'],
            [[ 'CUsername', 'CPasswords', 'LoginType'], 'string'],
            [['CustomerPoint'], 'integer'],
            [['CustomerFName', 'CustomerLName'], 'string', 'max' => 255],
            [
                ['CustomerImage'],'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
              ],
           
        ];
    }

    public function upload($model,$attribute)
    {
      $photo  = UploadedFile::getInstance($model, $attribute);
      //$path = 'C:/xampp/htdocs/udondelivery3/uploads/images/Customer/';
      $path = Yii::getAlias('@UploadCus');
      if ($this->validate() && $photo !== null) {
 
        // $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
        $fileName = $photo->baseName . '.' . $photo->extension;
        if($photo->saveAs($path.'/'.$fileName)){
          return $fileName;
        }
      }
      return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }
    //เพิ่มมา
    public function getUploadUrl(){
        return Yii::getAlias('@uploadUrl').'/'.$this->upload_foler.'/';
      }
    public function getPhotoViewer(){
        return empty($this->photo) ? Yii::getAlias('@uploadUrl').'/img/none.png' : $this->getUploadUrl().$this->photo;
      }
      //ถึงนี้

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDCustomer' => 'รหัส',
            'CustomerFName' => 'ชื่อ',
            'CustomerLName' => 'นามสกุล',
            'CustomerImage' => 'รูปภาพ',
            'CustomerPoint' => 'แต้มสะสม',
            'CustomerPhone' => 'เบอร์โทร',
            'CUsername' => 'Username',
            'CPasswords' => 'Password',
            'LoginType' => 'ประเภท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomeraddress()
    {
        return $this->hasOne(CustomerAddress::className(), ['IDCustomer' => 'IDCustomer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritemenu()
    {
        return $this->hasOne(Favoritemenu::className(), ['IDCustomer' => 'IDCustomer']);
    }
}
