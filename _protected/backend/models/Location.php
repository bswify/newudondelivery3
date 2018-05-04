<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $IDLocation รหัส
 * @property string $LocationName ชื่อตำแหน่ง
 * @property int $IDLocationType รหัสประเภทตำแหน่ง
 *
 * @property Locationtype $locationType
 * @property Restaurant $restaurant
 */
class Location extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LocationName', 'IDLocationType','letlng'], 'required'],
            [['LocationName','letlng'], 'string'],
            [['IDLocationType'], 'integer'],
            // [['IDLocationType'], 'unique'],
            [['IDLocationType'], 'exist', 'skipOnError' => true, 'targetClass' => Locationtype::className(), 'targetAttribute' => ['IDLocationType' => 'IDLocationType']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDLocation' => 'รหัส',
            'LocationName' => 'ชื่อตำแหน่ง',
            'IDLocationType' => 'ชื่อประเภทตำแหน่ง',
            'letlng' => 'พิกัด',
//            'longitude',
//            'latitude',
            // 'LocationTypeName' => 'ชื่อประเภทตำแหน่ง',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationType()
    {
        return $this->hasOne(Locationtype::className(), ['IDLocationType' => 'IDLocationType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['IDLocation' => 'IDLocation']);
    }
}
