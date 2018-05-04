<?php
use yii\helpers\Html;
?>

<table>
    <tr>
        <td>
            <?=Html::img(Yii::getAlias('@frontend').'/web/images/logo_iop_doc.png', ['width' => 120])?>
        </td>
        <td>
            <h4>Organization Name</h4>
            <strong><i>Subtitle Here</i></strong><br />
            <small>Address Tel and Email</small>
            <h3>What is this report</h3>
        </td>
    </tr>
</table>
<table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
    <tr>
        <td colspan="2">Patient Name: <br />Patient Name</td>
        <td>Age:<br />อายุ ปี</td>
        <td>Lab Number:<br /> Lab No.</td>
        <td>Patient ID Number:</td>
    </tr>
    <tr>
        <td colspan="3">RequestingHospital / Clinic:<br />Hospital</td>

        <td colspan="2">Requesting Physician:<br /> Physician</td>
    </tr>
    <tr>
        <td>Specimen ID Number:<br /> Block No.</td>
        <td colspan="2">Date of Request:<br /> Request Date</td>
        <td>Date of Accession:<br /> Register Date</td>
        <td>Date of Report:<br /> Report at</td>
    </tr>
    <tr>
        <td colspan="5">Diagnosis:<br /> Diagnosis</td>
    </tr>
</table>

<table cellspacing="0" cellpadding="2" border="0" width="100%">
    <tr>
        <td width="50%">
            <table cellspacing="0" cellpadding="0" class="table_bordered" width="100%">
                <tr>
                    <td colspan="2">
                        <u>PROCEDURES :</u><br />
                        Procedures
                    </td>
                </tr>

            </table>
        </td>
        <td width="50%">

            <?=Html::img(Yii::getAlias('@frontend/web/images/').'spacer.gif', ['width' => 300])?>

        </td>
    </tr>
</table>

<table>
    <tr>
        <td>
            Reference
        </td>
    </tr>
    <tr>
        <td>
            <h3>INTERPRETATION:</h3>
            Interpretation
        </td>
    </tr>
    <tr>
        <td>
            <h3>Comment :</h3>
            Comment
        </td>
    </tr>
    <tr>
        <td>
            Report signed :
            Report by
        </td>
    </tr>
</table>


<table width="100%">
    <tr>
        <td>Pathologist:</td>
        <td>
            <br/>
            Pathologist Name
        </td>
        <td>(Phone: 01234567890)</td>
    </tr>
</table>