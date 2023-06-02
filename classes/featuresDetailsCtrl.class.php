<?php
class FeaturesDetailsCtrl extends FeaturesDetails
{
    public function insertFtDetailsCtrl($id_quyen, $id_features)
    {
        return $this->insertFtDetails($id_quyen, $id_features);
    }
    public function deleteFtDetailsCtrl($id_quyen)
    {
        return $this->deleteFtDetails($id_quyen);
    }
}
