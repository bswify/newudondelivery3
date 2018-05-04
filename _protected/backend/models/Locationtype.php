<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "locationtype".
 *
 * @property int $IDLocationType รหัส
 * @property string $LocationTypeName ชื่อประเภทตำแหน่ง
 *
 * @property Location $location
 */
class Locationtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locationtype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LocationTypeName'], 'required'],
            [['LocationTypeName'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDLocationType' => 'รหัส',
            'LocationTypeName' => 'ชื่อประเภทตำแหน่ง',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['IDLocationType' => 'IDLocationType']);
    }
}
