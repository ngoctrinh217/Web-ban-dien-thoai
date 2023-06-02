<?php
class Guarantee extends Db
{
    protected function getGuaranteeAll()
    {
        $sql = "SELECT * from baohanh";
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
