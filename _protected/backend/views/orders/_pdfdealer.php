<?php

use yii\helpers\Html;

?>

<div class="pdf-dealer container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</td>
<!--            <th>Name</td>-->
<!--            <th>Address</td>-->
<!--            <th>Phone</td>-->
<!--            <th>District</td>-->
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $model->getAttribute('IDOrder') ?></td>
<!--            <td><= $model->name ?></td>-->

        </tr>
        </tbody>
    </table>
</div>