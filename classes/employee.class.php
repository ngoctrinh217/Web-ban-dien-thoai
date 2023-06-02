<?php
class Employee extends Db
{
    protected function getAllEmp()
    {
        $sql = "SELECT *
        from nhanvien
        where nhanvien.tennhanvien !='Mặc định'";
        $data = [];
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
}
