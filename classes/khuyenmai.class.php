<?php
include'../DTO/KhuyenMaiModel.php';
class KhuyenMai extends Db
{
    protected function AllKhuyenMai()
    {
        $sql = "SELECT * FROM khuyenmai";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
    protected function insertKhuyenMai(KhuyenMaiModel $KhuyenMai)
    {
        $tenKhuyenMai = $KhuyenMai->getTenKhuyenMai();
        $motaKM = $KhuyenMai->getmotaKM();
        $sogiamgia = $KhuyenMai->getsogiamgia();
        $trangthai = $KhuyenMai->getTrangthai();

        $sql = "INSERT into khuyenmai (tenkhuyenmai,motakhuyenmai,Sogiamgia,trangthai) values ('$tenKhuyenMai','$motaKM','$sogiamgia','$trangthai')";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    protected function InputKhuyenMai($input)
    {
        $sql = "SELECT * FROM khuyenmai WHERE tenkhuyenmai LIKE '%$input%'";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }

    protected function IdKhuyenMai($id)
    {
        $sql = "SELECT * FROM khuyenmai where id_khuyenmai = $id";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
    }
    // update
    protected function updatetKhuyenMai(KhuyenMaiModel $KhuyenMai)
    {
        $id_KM = $KhuyenMai->getID_KhuyenMai();
        $tenKhuyenMai = $KhuyenMai->getTenKhuyenMai();
        $motaKM = $KhuyenMai->getmotaKM();
        $sogiamgia = $KhuyenMai->getsogiamgia();
        $trangthai = $KhuyenMai->getTrangthai();

        $sql = "UPDATE khuyenmai SET tenkhuyenmai='$tenKhuyenMai',motakhuyenmai='$motaKM',Sogiamgia='$sogiamgia',trangthai='$trangthai' WHERE id_khuyenmai ='$id_KM'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    //delete
    protected function deletetKhuyenMai(KhuyenMaiModel $KhuyenMai)
    {
        $id_km = $KhuyenMai->getID_KhuyenMai();

        $sql = "UPDATE `khuyenmai` SET `trangthai`='F' WHERE id_khuyenmai =$id_km";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

}
