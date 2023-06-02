<?php
class StaffCtrl extends Staff{
    public function insertStaffCtrl(StaffModel $Staff)
    {
        return $this->insertStaff($Staff);
    }
    
    public function updateStaffCtrl(StaffModel $Staff)
    {
        return $this->updatetStaff($Staff);
    }

   
}
?>