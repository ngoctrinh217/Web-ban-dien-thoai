<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'function') !== false) {
    $path = "../DTO/";
} else {
    $path = "DTO/";
}
include  $path . 'OrderModel.php';
class Order extends Db
{
    protected function getAllsOrder()
    {
        $sql = "SELECT distinct donhang.Madh,donhang.Ngaydathang,donhang.NgayGiaoHang,donhang.Diachigiaohang,donhang.Trangthaidonhang,donhang.Tonggiatien,khachhang.tentaikhoan,nhanvien.tennhanvien,donhang.NgayCapNhat,donhang.id_donhang
        from donhang ,khachhang,nhanvien
        where donhang.ID_Khachhang = khachhang.id_khachhang and donhang.ID_nhanvien = nhanvien.id_nhanvien";
        $data = [];
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }


    protected function updateOrder(OrderModel $order)
    {
        $id_donhang = $order->getid_donhang();
        $id_nhanvien = $order->getid_nhanvien();
        $ngaycapnhat = $order->getngaycapnhat();
        $ngaygiaohang = $order->getngaygiaohang();
        $trangthai = $order->gettrangthai();
        $sql = "UPDATE donhang set ID_nhanvien = '$id_nhanvien' ,Trangthaidonhang='$trangthai',NgayGiaoHang = '$ngaygiaohang',NgayCapNhat='$ngaycapnhat' where id_donhang='$id_donhang'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else return false;
    }
}
