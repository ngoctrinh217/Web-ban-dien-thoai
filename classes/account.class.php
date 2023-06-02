<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'function') !== false) {
    $path = "../DTO/";
} else {
    $path = "DTO/";
}
include $path . 'AccountModel.php';
class Account extends Db
{
    protected function insertAccount(AccountModel $account)
    {
        $tendangnhap = $account->getTendangnhap();
        $matkhau = $account->getMatKhau();
        $loaitaikhoan = $account->getLoaiTaiKhoan();
        $trangthai = $account->getTrangthai();
        $ngaytao = $account->getNgayTao();

        $sql = "INSERT into taikhoan (tendangnhap,matkhau,loaitaikhoan,trangthai,ngaytao) values ('$tendangnhap','$matkhau','$loaitaikhoan','$trangthai','$ngaytao')";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    protected function AllAccount()
    {
        $sql = "SELECT * FROM taikhoan";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }

    protected function InputAccount($input)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap LIKE '%$input%'";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }

    protected function IdAccount($id)
    {
        $sql = "SELECT * FROM taikhoan where id_taikhoan = $id";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
    }
    // update
    protected function updatetAccount(AccountModel $account)
    {
        $id_taikhoan = $account->getID_TaiKhoan();
        $tendangnhap = $account->getTendangnhap();
        $matkhau = $account->getMatKhau();
        $loaitaikhoan = $account->getLoaiTaiKhoan();
        $trangthai = $account->getTrangthai();
        $ngaytao = $account->getNgayTao();

        $sql = "UPDATE `taikhoan` SET `tendangnhap`='$tendangnhap',`matkhau`='$matkhau',`loaitaikhoan`='$loaitaikhoan',`trangthai`='$trangthai',`ngaytao`='$ngaytao' WHERE id_taikhoan =$id_taikhoan";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    //delete
    protected function deletetAccount(AccountModel $account)
    {
        $id_taikhoan = $account->getID_TaiKhoan();

        $sql = "UPDATE `taikhoan` SET `trangthai`='F' WHERE id_taikhoan =$id_taikhoan";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    // exittendangnhap
    protected function exitAccount($tendangnhap)
    {

        $sql = "SELECT * from taikhoan where tendangnhap = '$tendangnhap'";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
    }
}
