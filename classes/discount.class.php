<?php

class Discount extends Db
{
    protected function getDiscountAll()
    {
        $data  = [];
        $sql = "SELECT * from khuyenmai";
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
}
