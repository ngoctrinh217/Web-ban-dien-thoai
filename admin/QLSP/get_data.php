<?php

include('../../model/db.class.php');
include '../../model/ADMINsanpham.class.php';
include '../../view/ADMINsanphamView.php';
$sanpham = new sanphamview();



// Get the user ID from the AJAX request
if(isset($_POST['id'])){
  $id = $_POST['id'];
}
$result = $sanpham->getAlldataProductView($id);
// Trả về kết quả dưới dạng JSON

if ($result) {
  $row = $result[0];
  $respons = array(
    'ID_dienthoai' => $row['ID_dienthoai'],
    'ID_thuonghieu' => $row['ID_thuonghieu'],
    'ID_ncc' => $row['ID_Nhacungcap'],
    'Tendt' => $row['Tendt'],
    'Anhdt' => $row['Anhdt'],
    'Motadt' => $row['Motadt'],
    'Giadt' => $row['Giadt'],
    'Soluong' => $row['Soluong'],
    // 'Luotxem' => $row['Luotxem'],
    'id_km' => $row['ID_khuyenmai'],
    'id_bh' => $row['ID_baohanh'],
    'trangthai' => $row['trangthai'],
  );
  echo json_encode($respons);
} else {
  echo json_encode(['error' => 'Truy vấn không thành công']);
}
?>

