<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'function') !== false) {
    $path = "../DTO/";
} else {
    $path = "DTO/";
}
include  $path . 'CustommerModel.php';
class Custommer extends Db
{
    protected function getCustommerById($id)
    {
        $sql = "SELECT * FROM khachhang where id_khachhang='$id'";
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        } else return false;
    }

    protected function updateCustommerProfile(CustommerModel $custommer)
    {
        $id_kh = $custommer->getId();
        $tenkh = $custommer->getTenKH();
        $gioitinh = $custommer->getGioitinh();
        $diachi = $custommer->getDiachi();
        $sdt = $custommer->getSdt();
        $email = $custommer->getEmail();
        $sql = "UPDATE khachhang 
        set tenkhachhang = '$tenkh',gioitinh='$gioitinh',diachi='$diachi',sdt='$sdt',email='$email'
        where khachhang.id_khachhang = '$id_kh'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else return false;
    }

    protected function getKhachhang($tentaikhoan)
    {
        $sql = "SELECT * FROM khachhang where tentaikhoan='$tentaikhoan'";
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        } else return false;
    }
    protected function InputKH($input)
    {
        $sql = "SELECT * FROM khachhang where tentaikhoan like '%$input%'";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
    protected function IFKhachhang()
    {
        $sql = "SELECT * FROM khachhang";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
}
