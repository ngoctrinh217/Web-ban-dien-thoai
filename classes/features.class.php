<?php
class Features extends Db
{
    protected function getAllFeatures()
    {
        $sql = "SELECT * from chucnang";
        $data = [];
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }

    protected function getFeaturesByIdPer($perId)
    {
        $sql = "SELECT chitietchucnang.id_chucnang 
            from quyen,chitietchucnang
            where quyen.id_quyen = '$perId' and quyen.id_quyen = chitietchucnang.id_quyen";
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
