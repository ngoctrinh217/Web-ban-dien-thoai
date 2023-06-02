<?php
session_start();
include '../includes/autoload.php';

if (isset($_POST['loadPer'])) {
    $permissionView = new PermissionView();
    $result = $permissionView->getAllPerView();
    echo "Day la id quyen";
    echo $_SESSION['auth_user']['id_quyen'];
    echo "Day la id quyen";
    $output = "";
    if ($result) {
        foreach ($result as $item) {
            $perName = $item['tenquyen'];
            $perId = $item['id_quyen'];
            if ($perId ==  $_SESSION['auth_user']['id_quyen']) {
                $className = 'selected';
            } else {
                $className = '';
            }
            $output .= "
            <option $className value='{$perId}'>{$perName}</option>";
        }
        echo $output;
    } else {
        echo 'Not found Permission';
    }
}

if (isset($_POST['insertPermission'])) {
    $fid = $_POST['fid'];
    $perid = $_POST['perid'];
    $featuresDetailCtrl = new FeaturesDetailsCtrl();
    if ($featuresDetailCtrl->insertFtDetailsCtrl($perid, $fid)) {
        echo "Them chi tiet chuc nang thanh cong";
    } else {
        echo "Khong them chi tiet chuc nang thanh cong";
    }
}

if (isset($_POST['deletePermission'])) {
    $perid = $_POST['perid'];
    $featuresDetailCtrl = new FeaturesDetailsCtrl();
    if ($featuresDetailCtrl->deleteFtDetailsCtrl($perid)) {
        echo "Xoa chi tiet chuc nang thanh cong";
    } else {
        echo " Xoa chi tiet chuc nang khong thanh cong";
    }
}
