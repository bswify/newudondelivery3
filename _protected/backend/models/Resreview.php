<?php

namespace backend\models;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "resreview".
 *
 * @property int $IDResReview รหัส
 * @property string $ResReviewDate วันที่
 * @property int $ResReviewScore คะแนน
 * @property string $ResComment ความคิดเห็น
 * @property string $ResReviewImage รูปภาพ
 * @property int $IDRestaurant รหัสร้านอาหาร
 * @property int $IDCustomer ชื่อลูกค้า
 *
 * @property Restaurant $restaurant
 * @property Customer $customer
 */
class Resreview extends \yii\db\ActiveRecord
{



    public $upload_foler ='uploads';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resreview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ResReviewDate', 'ResReviewScore', 'ResComment','IDRestaurant', 'IDCustomer'], 'required'],
            [['ResReviewDate'], 'safe'],
            [['ResReviewScore', 'IDRestaurant', 'IDCustomer'], 'integer'],
            [['ResComment','ResReviewImage'], 'string'],
            // [['IDRestaurant'], 'unique'],
            // [['IDCustomer'], 'unique'],
            //เพิ่มรูปหลายๆรูป
//            [['ResReviewImage'], 'file',
//              'skipOnEmpty' => true,
//              'extensions' => 'png,jpg'
//            ],
            [['IDRestaurant'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['IDRestaurant' => 'IDRestaurant']],
            [['IDCustomer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['IDCustomer' => 'IDCustomer']],
        ];
    }

    const SCENARIO_CREATE = 'create';

    public function scenarios(){
        $scenarios =  parent::scenarios();
        $scenarios['create'] = ['ResReviewDate','ResReviewScore','ResComment','ResReviewImage','IDRestaurant','IDCustomer'];
        return $scenarios;
    }

    //เพิ่มมา
    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        //$path = 'C:/xampp/htdocs/udondelivery3/uploads/images/Resreview.php/';
        $path = Yii::getAlias('@UploadResReview');
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
   // public $upload_foler ='uploads';
    public function getUploadUrl(){
        return Yii::getAlias('@uploadUrl').'/'.$this->upload_foler.'/';
    }
    public function getPhotoViewer(){
        return empty($this->photo) ? Yii::getAlias('@uploadUrl').'/img/none.png' : $this->getUploadUrl().$this->photo;
    }
    //ถึงนี้

    //จบเพิ่มรูปภาพหลายๆรูป
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDResReview' => 'รหัส',
            'ResReviewDate' => 'วันที่',
            'ResReviewScore' => 'คะแนน',
            'ResComment' => 'ความคิดเห็น',
            'ResReviewImage' => 'รูปภาพ',
            'IDRestaurant' => 'รหัสร้านอาหาร',
            'IDCustomer' => 'รหัสเขียนรีวิว',
        ];
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
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['IDCustomer' => 'IDCustomer']);
    }
}
