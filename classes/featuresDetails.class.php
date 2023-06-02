<?php
class FeaturesDetails extends Db
{
    protected function insertFtDetails($id_pers, $id_features)
    {
        $sql = "INSERT into chitietchucnang (id_quyen,id_chucnang,trangthai) VALUES ('$id_pers','$id_features','T')";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else return false;
    }

    protected function deleteFtDetails($id_pers)
    {
        $sql = "DELETE FROM chitietchucnang where chitietchucnang.id_quyen = '$id_pers'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else return false;
    }
}
