<?php
use yii\helpers\Html;
?>
<table>
    <td>
        <?=$model->food->FoodName;?>
    </td>
    <td>
        <?=$model->food->FoodPrice;?>
    </td>

    <td>
        <?=$model->AmountFood;?>
    </td>

    <tr>
        <?=$model->foodDetails->FoodDetailName;?>
    </tr>
    <tr>
        <?=$model->foodDetails->FoodDetailsPrice;?>
    </tr>
</table>


