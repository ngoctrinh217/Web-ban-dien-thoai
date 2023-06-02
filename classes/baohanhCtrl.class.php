<?php
class BaohanhCtrl extends Baohanh
{
    public function insertBaohanhCtrl(BaohanhModel $baohanh)
    {
        return $this->insertBaohanh($baohanh);
    }

   

    public function updateBaohanhCtrl(BaohanhModel $Baohanh)
    {
        return $this->updatetBaohanh($Baohanh);
    }

    public function deleteBaohanhCtrl(BaohanhModel $Baohanh)
    {
        return $this->deletetBaohanh($Baohanh);
    }

}
