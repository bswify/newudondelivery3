<?php



header("content-type:Application/json; charset=utf-8");

$con=mysqli_connect("localhost","root","","dbtest2");

$sql = "SELECT *
FROM restaurant ";


$re = mysqli_query($con,$sql);//การเรียกใช้ข้อมูลจากฐานข้อมูลมาใช้งานโดยกำหนดค่าการเรียกใช้

$lise = array();
$data3 = array();
$data23 = array();
while($row= mysqli_fetch_assoc($re))// คำสั่งให้แสดงข้อมูล
{

    $data =
        array(
            "IDRestaurant" => $row['IDRestaurant'],
            "ResName" => $row['ResName'],
            "ResLowPrice" => $row['ResLowPrice'],
            "ResImg" => $row['ResImg']


        );

    $sql2 = "SELECT *
            FROM food 
            WHERE IDRestaurant = ".$row['IDRestaurant'];
    $re2 = mysqli_query($con,$sql2);
    while ($row2= mysqli_fetch_assoc($re2)){
        $data2 =
            array(
                "IDFood" => $row2['IDFood'],
                "FoodImg" => $row2['FoodImg'],
                "FoodName" => $row2['FoodName'],
                "FoodPrice" => $row2['FoodPrice'],
                "IDFoodType" => $row2['IDFoodType'],
                "MenuTypeName" => $row2['MenuTypeName'],
                "IDRestaurant" => $row2['IDRestaurant']
            );
        $data3[] = $data2;
    }


    $sql3 = "SELECT *
            FROM respromotion 
            WHERE IDRestaurant = ".$row['IDRestaurant'];
    $re3 = mysqli_query($con,$sql3);
    while ($row3= mysqli_fetch_assoc($re3)){
        $data22 =
            array(
                "ResPromotionName" => $row3['ResPromotionName'],
                "ResPromotionStart" => $row3['ResPromotionStart'],
                "ResPromotionEnd" => $row3['ResPromotionEnd']
            );
        $data32[] = $data22;
    }

    $data4 = array("ชื่อร้าน" =>$data,"เมนูอาหาร" =>$data3,"โปรโมชั่น" =>$data32);
    $data3 = null;
    $data32 = null;
    $lise[] = $data4;
}



$a = array("success" => true,"data" =>$lise);
echo json_encode($a);

mysqli_close($con );
?>
