<?php
include'../DTO/BaohanhModel.php';
class Baohanh extends Db
{
    protected function AllBaohanh()
    {
        $sql = "SELECT * FROM baohanh";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
    protected function insertBaohanh(BaohanhModel $Baohanh)
    {
        $tenbaohanh = $Baohanh->getTenbaohanh();
        $Thoigianbaohanh = $Baohanh->getthoigianbaohanh();
        $trangthai = $Baohanh->getTrangthai();

        $sql = "INSERT into baohanh (Tenbaohanh,Thoigianbaohanh,Trangthai) values ('$tenbaohanh','$Thoigianbaohanh','$trangthai')";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    protected function InputBaohanh($input)
    {
        $sql = "SELECT * FROM baohanh WHERE Tenbaohanh LIKE '%$input%'";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }

    protected function IdBaohanh($id)
    {
        $sql = "SELECT * FROM baohanh where ID_Baohanh = $id";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
    }
    // update
    protected function updatetBaohanh(BaohanhModel $Baohanh)
    {
        $id_baohanh = $Baohanh->getID_baohanh();
        $tenbaohanh = $Baohanh->getTenbaohanh();
        $Thoigianbaohanh = $Baohanh->getthoigianbaohanh();
        $trangthai = $Baohanh->getTrangthai();

        $sql = "UPDATE baohanh SET Tenbaohanh='$tenbaohanh',Thoigianbaohanh='$Thoigianbaohanh',Trangthai='$trangthai' WHERE ID_Baohanh ='$id_baohanh'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    //delete
    protected function deletetBaohanh(BaohanhModel $Baohanh)
    {
        $id_baohanh = $Baohanh->getID_baohanh();

        $sql = "UPDATE `baohanh` SET `Trangthai`='F' WHERE ID_Baohanh =$id_baohanh";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

}
