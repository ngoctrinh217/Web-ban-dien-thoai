<?php
include('../../model/db.class.php');
include '../../model/ADMINsanpham.class.php';
include '../../view/ADMINsanphamView.php';
$sanpham = new sanphamview();

if(isset($_POST['id_product'])){
    $id_product = $_POST['id_product'];
    if($id_product){
        // $data = $sanpham->getdeleteSP($id_product);
        $productCtrl = new sanphamview();
        if ($productCtrl->deleteProductView($id_product))
         if ($id_product) {
                echo 'success';
            } else {
                echo 'failure';
            }
    }else{
        echo 'failure';
    }
}
?>