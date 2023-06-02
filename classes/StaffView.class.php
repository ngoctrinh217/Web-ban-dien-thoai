<?php
class StaffView extends Staff{
    public function getAllStaff()
    {
        return $this->AllStaff();
    } 
    public function getIdStaff($id)
    {
        return $this->IdStaff($id);
    } 

    public function getIFtennhanvien($tennhanvien)
    {
        return $this->gettennhanvien($tennhanvien);
    } 

    public function getInputStaff($tennhanvien)
    {
        return $this->InputStaff($tennhanvien);
    } 
}

?> 