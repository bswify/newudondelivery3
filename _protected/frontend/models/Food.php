<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "food".
 *
 * @property int $IDFood รหัส
 * @property string $FoodImg
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
            [[ 'FoodName', 'FoodPrice', 'IDFoodType', 'IDRestaurant', 'MenuTypeName'], 'required'],
            [[ 'FoodName', 'MenuTypeName'], 'string'],
            [['FoodPrice', 'IDFoodType', 'IDRestaurant'], 'integer'],
//            [['IDRestaurant'], 'unique'],
//            [['IDFoodType'], 'unique'],
            [
                ['FoodImg'],'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ],
            [['IDFoodType'], 'exist', 'skipOnError' => true, 'targetClass' => Foodtype::className(), 'targetAttribute' => ['IDFoodType' => 'IDFoodType']],
            [['IDRestaurant'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['IDRestaurant' => 'IDRestaurant']],
        ];
    }
    //เพิ่มมา
    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        //$path = 'C:/xampp/htdocs/udondelivery3/uploads/images/Food/';
        $path = Yii::getAlias('@UploadFoodPhoto');
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
    public $upload_foler ='uploads';
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
            'IDFood' => 'รหัส',
            'FoodImg' => 'รูปภาพ',
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
