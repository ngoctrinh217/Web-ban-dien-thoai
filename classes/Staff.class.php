<?php
include('../DTO/StaffModel.php');

class Staff extends Db{
    
    protected function insertStaff(StaffModel $Staff)
    {
        $tennhanvien = $Staff->getTenNV();
        $ngaysinh = $Staff->getNgaysinh();
        $diachi = $Staff->getDiachi();
        $giotinh = $Staff->getGioiTinh();
        $sdt = $Staff->getSDT();
        $id_quyen = $Staff->getID_Quyen();

        $sql = "INSERT INTO `nhanvien`( `tennhanvien`, `ngaysinh`, `diachi`, `gioitinh`, `sdt`, `ID_quyen`) VALUES ('$tennhanvien','$ngaysinh','$diachi','$giotinh','$sdt','$id_quyen')";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    protected function AllStaff()
    {
        // $sql = "SELECT * FROM nhanvien";
        $sql ='  SELECT nhanvien.id_nhanvien,nhanvien.tennhanvien,nhanvien.ngaysinh,
        nhanvien.diachi,nhanvien.gioitinh,nhanvien.sdt,nhanvien.ID_quyen,quyen.tenquyen FROM nhanvien,quyen where nhanvien.ID_quyen = quyen.id_quyen';
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
   
    protected function IdStaff($id)
    {
        // $sql = "SELECT * FROM nhanvien where id_nhanvien = $id";
        $sql = "SELECT nhanvien.tennhanvien,nhanvien.ngaysinh,nhanvien.diachi,nhanvien.gioitinh,nhanvien.sdt,nhanvien.ID_quyen,
        quyen.tenquyen FROM nhanvien,quyen where nhanvien.ID_quyen = quyen.id_quyen and nhanvien.id_nhanvien = $id";

        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
        }

        protected function gettennhanvien($tennhanvien)
    {
        //  $sql = "SELECT * FROM nhanvien where id_nhanvien = $tennhanvien";
        $sql = "SELECT nhanvien.tennhanvien,nhanvien.ngaysinh,nhanvien.diachi,nhanvien.gioitinh,nhanvien.sdt,nhanvien.ID_quyen,
        quyen.tenquyen FROM nhanvien,quyen where nhanvien.ID_quyen = quyen.id_quyen and nhanvien.tennhanvien = '$tennhanvien'";

        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
        }
    // update
    protected function updatetStaff(StaffModel $Staff)
    {
        $tennhanvien = $Staff->getTenNV();
        $ngaysinh = $Staff->getNgaysinh();
        $diachi = $Staff->getDiachi();
        $gioitinh = $Staff->getGioiTinh();
        $sdt = $Staff->getSDT();
        $id_quyen = $Staff->getID_Quyen();

        $sql = "UPDATE `nhanvien` SET `ngaysinh`='$ngaysinh',`diachi`='$diachi',`gioitinh`='$gioitinh',`sdt`='$sdt',`ID_quyen`='$id_quyen' WHERE tennhanvien = '$tennhanvien'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    protected function InputStaff($input)
    {
        $sql = "SELECT nhanvien.id_nhanvien,nhanvien.tennhanvien,nhanvien.ngaysinh,nhanvien.diachi,nhanvien.gioitinh,nhanvien.sdt,nhanvien.ID_quyen,
        quyen.tenquyen FROM nhanvien,quyen where nhanvien.ID_quyen = quyen.id_quyen and nhanvien.tennhanvien LIKE '%$input%'";
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
?>
