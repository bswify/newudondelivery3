
# newudondelivery3
newudondelivery3 management

## How to Run Project
 1. run composer update 
    - run cmd by administrator --> Right click on cmd and Run as administrator
    - cd to **root project** and write command ``` composer update ``` for load or update dependencies
 2. run php init
    - cd to **_protected** and write command ``` php init ```

 3. coppy setting to config
    - coppy below code to **_protected/common/config/param-local**
 ``` php 
<?php
Yii::setAlias('@uploadUrl','/uploads/');//for show

Yii::setAlias('@UploadFoodPhoto','@appRoot2/uploads/images/Food/');//for upload อาหาร
Yii::setAlias('@ShowFoodPhoto','@appRoot3/uploads/images/Food/');//for show อาหาร

Yii::setAlias('@UploadResReview','@appRoot2/uploads/images/Resreview/');//for upload รีวิว
Yii::setAlias('@ShowResReview','@appRoot3/uploads/images/Resreview/');//for show รีวิว


Yii::setAlias('@UploadRes','@appRoot2/uploads/images/Restaurantimg/');//for upload ร้านอาหาร
Yii::setAlias('@ShowRes','@appRoot3/uploads/images/Restaurantimg/');//for show ร้านอาหาร

Yii::setAlias('@UploadCus','@appRoot2/uploads/images/Customer/');//for upload ลูกค้า
Yii::setAlias('@ShowCus','@appRoot3/uploads/images/Customer/');//for show ลูกค้า

Yii::setAlias('@ShowPhotoAdmin','@appRoot3/uploads/img/man.png');//for show ลูกค้า

Yii::setAlias('@ShowimgF','@appRoot3/uploads/cutlery.png');//for show ร้านอาหาร

return [
];

``` 


