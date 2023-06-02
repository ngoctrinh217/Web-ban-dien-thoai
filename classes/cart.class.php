<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'function') !== false) {
    $path = "../DTO/";
} else {
    $path = "DTO/";
}
include  $path . 'CartModel.php';
include  $path . 'CartDetailModel.php';


class Cart extends Db
{
    protected function insertCart(CartModel $cart)
    {
        $conn = $this->connect();
        $id_khachhang = $cart->getID_khachhang();
        $id_nhanvien = $cart->getID_nhanvien();
        $Ngaydathang = $cart->getNgaydathang();
        $Tonggiatien = $cart->getTonggiatien();
        $Diachigiaohang = $cart->getDiachigiaohang();
        $Trangthaidonhang = $cart->getTrangthaidonhang();
        $Ngaygiaohang = $cart->getNgaygiaohang();
        $sql = "INSERT INTO donhang (ID_khachhang,ID_nhanvien,Ngaydathang,Tonggiatien,Diachigiaohang,Trangthaidonhang,NgayGiaoHang)
        VALUES('$id_khachhang','$id_nhanvien','$Ngaydathang','$Tonggiatien','$Diachigiaohang','$Trangthaidonhang','$Ngaygiaohang')";
        if (mysqli_query($conn, $sql)) {
            $order_id = mysqli_insert_id($conn);
            if ($order_id != 0) {
                echo "day la order id";
                echo $order_id;
                echo "day la order id";
                return $order_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    protected function insertDetailCart(CartDetailModel $cart)
    {
        $id_donhang = $cart->getID_donhang();
        $id_dienthoai = $cart->getID_dienthoai();
        $soluong = $cart->getSoluong();
        $gia = $cart->getGia();
        $id_khuyenmai = $cart->getID_khuyenmai();
        $id_baohanh = $cart->getID_baohanh();
        $giasaukm = $cart->getGiasaukm();
        $sql = "INSERT into chitietdonhang(id_donhangnew,id_dienthoai,soluong,gia,ID_khuyenmai,ID_baohanh,Giasaukm) 
        VALUES('$id_donhang','$id_dienthoai','$soluong','$gia','$id_khuyenmai','$id_baohanh','$giasaukm')";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    protected function getOrderByIdCustomer($id_cust)
    {
        $sql = "SELECT * from  donhang where donhang.ID_Khachhang ='$id_cust'";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    protected function getOrderDetailByIdOrder($id_order)
    {
        $sql = "SELECT dienthoai.Anhdt,dienthoai.Tendt,chitietdonhang.soluong,chitietdonhang.gia,chitietdonhang.Giasaukm,donhang.Tonggiatien,donhang.Ngaydathang,dienthoai.id_dienthoai,donhang.NgayGiaoHang,donhang.Trangthaidonhang,donhang.Diachigiaohang
        from chitietdonhang,dienthoai,donhang
        where chitietdonhang.id_donhangnew = '$id_order' and dienthoai.ID_dienthoai = chitietdonhang.id_dienthoai and chitietdonhang.id_donhangnew = donhang.id_donhang";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    protected function updateCancelStatusOrder($id_order)
    {
        $sql = "UPDATE donhang SET Trangthaidonhang = 'Đã hủy' where id_donhang = '$id_order'";
        $result = mysqli_query($this->connect(), $sql);
        if ($result) {
            return true;
        } else return false;
    }
}
