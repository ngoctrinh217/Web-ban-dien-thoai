<?php
include('../../model/db.class.php');
include '../../model/ADMINsanpham.class.php';
include '../../view/ADMINsanphamView.php';




include('../../DB/dbconnect.php');
$sanpham = new sanphamview();
if(isset($_POST['key']) && isset($_POST['ID_dienthoai']) &&  isset($_POST['id_thuonghieu'])
  && isset($_POST['id_nhacungcap']) && isset($_POST['Tendt'])
  // && isset($_FILES['Anhdt'])
   && isset($_POST['Mota'])
  && isset($_POST['Gia']) && isset($_POST['soluong'])
   && isset($_POST['id_baohanh']) && isset($_POST['id_km']) && isset($_POST['image'])
){
  $key = $_POST['key'];
  
  // $id_product = $_POST['ID_dienthoai'];
  // $ID_th = $_POST['id_thuonghieu'];
  // $ID_ncc = $_POST['id_nhacungcap'];
  // $Tendt = $_POST['Tendt'];
  // // $Anhdt = $_FILES['Anhdt'];
  // $Mota = $_POST['Mota'];
  // $Gia = $_POST['Gia'];
  // $soluong = $_POST['soluong'];
  // $luotxem = $_POST['luotxem'];
  // $ID_bh = $_POST['id_baohanh'];
  // $ID_km = $_POST['id_km'];
}
if (isset($_FILES['Anhdt']) && ($_FILES['Anhdt']['name']) !== '') {
  $filename = $_FILES['Anhdt']['name'];
} 

if($_POST['key'] == 'edit'){ 
   $id_product = $_POST['ID_dienthoai'];
  $ID_th = $_POST['id_thuonghieu'];
  $ID_ncc = $_POST['id_nhacungcap'];
  $Tendt = $_POST['Tendt'];
  $Mota = $_POST['Mota'];
  $Gia = $_POST['Gia'];
  $soluong = $_POST['soluong'];
  $ID_bh = $_POST['id_baohanh'];
  $ID_km = $_POST['id_km'];
  $filename = $_POST['image'];

  $trangthai =$_POST['active'];

  $productModel = new ProductModel();
  $productModel->setId_dienthoai($id_product);
  $productModel->setid_thuonghieu($ID_th);
  $productModel->setid_nhacungcap($ID_ncc);
  $productModel->setTendt($Tendt);
  $productModel->setAnhdt($filename);
  $productModel->setMota($Mota);
  $productModel->setGiadt($Gia);
  $productModel->setSoluong($soluong);
  $productModel->setid_khuyenmai($ID_km);
  $productModel->setid_baohanh($ID_bh);
  $productModel->setTrangthai($trangthai);
  $productCtrl = new sanphamview();
  if ($productCtrl->updatesanphamView($productModel)) {
    echo 'Edit success';  
  } 
  // $sanpham->getUpdataProduct($id_product,$ID_th,$ID_ncc,$Tendt,$filename,$Mota,$Gia,$soluong,$luotxem,$ID_km,$ID_bh);
  // echo 'Edit success';  
}
else if( $_POST['key'] == 'insert'){
    // $sanpham->getInsertProduct($ID_th,$ID_ncc,$Tendt,$filename,$Mota,$Gia,$soluong,$luotxem,$ID_km,$ID_bh);
   
  $id_product = $_POST['ID_dienthoai'];
  $ID_th = $_POST['id_thuonghieu'];
  $ID_ncc = $_POST['id_nhacungcap'];
  $Tendt = $_POST['Tendt'];
  $Mota = $_POST['Mota'];
  $Gia = $_POST['Gia'];
  $soluong = $_POST['soluong'];
  $ID_bh = $_POST['id_baohanh'];
  

  $ID_km = $_POST['id_km'];
    $productModel = new ProductModel();
    $productModel->setid_thuonghieu($ID_th);
    $productModel->setid_nhacungcap($ID_ncc);
    $productModel->setTendt($Tendt);
    $productModel->setAnhdt($filename);
    $productModel->setMota($Mota);
    $productModel->setGiadt($Gia);
    $productModel->setSoluong($soluong);
    $productModel->setid_khuyenmai($ID_km);
    $productModel->setid_baohanh($ID_bh);

    $productCtrl = new sanphamview();
    if ($productCtrl->insertsanphamView($productModel)) {
        echo "Thêm sản phẩm thành công";
    } 
    echo 'Insert success';
      
}else{
    echo 'failure';
}

 
  
  
 