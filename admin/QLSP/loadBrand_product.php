<?php
include('../../model/db.class.php');
include '../../model/ADMINsanpham.class.php';
include '../../view/ADMINsanphamView.php';

$sanpham = new sanphamview();
if (isset($_POST['id_brand'])) {
    $id_brand =  $_POST['id_brand'];
} else {
    $id_brand = 0;
}
echo $id_brand;


$output = '';
            // <select class="form-select " id ="brand"  style="margin-bottom:20px;text-align:center;">

$output .= '


<div class ="col-2">
            <select id="brand">
            <option id="catelogy" value="">ALL</option>';


$brand = $sanpham->getCartegoryView();
foreach ($brand as $dataBrand) {
    $TenTH = $dataBrand['tenthuonghieu'];
    $ID_TH = $dataBrand['id_thuonghieu'];

    if ($ID_TH == $id_brand) {
        $output .= "<option value='$ID_TH' selected>$TenTH</option>";
    } else {
        $output .= "<option value='$ID_TH'>$TenTH</option>";
    }
}

$output .= '</select>
   </div>
';
echo $output;
