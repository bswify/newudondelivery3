<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $IDEmp รหัส
 * @property string $EmpFName ชื่อ
 * @property string $EmpLname นามสกุล
 * @property int $EmpPhone เบอร์โทร
 * @property string $EUsername Username
 * @property string $Epasswords password
 * @property string $LoginType ประเภท
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EmpFName', 'EmpLname', 'EmpPhone', 'EUsername', 'Epasswords', 'LoginType'], 'required'],
            [['EmpFName', 'EmpLname', 'EmpPhone','EUsername', 'Epasswords', 'LoginType'], 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDEmp' => 'รหัส',
            'EmpFName' => 'ชื่อ',
            'EmpLname' => 'นามสกุล',
            'EmpPhone' => 'เบอร์โทร',
            'EUsername' => 'Username',
            'Epasswords' => 'password',
            'LoginType' => 'ประเภท',
        ];
    }
}
