<?php
class Suppli extends Db
{
    protected function getSuppliAll()
    {
        $data = [];
        $sql = "SELECT * from nhacungcap";
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
}
