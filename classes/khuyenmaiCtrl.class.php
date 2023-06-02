<?php
class KhuyenMaiCtrl extends KhuyenMai
{
    public function insertKhuyenMaiCtrl(KhuyenMaiModel $KhuyenMai)
    {
        return $this->insertKhuyenMai($KhuyenMai);
    }

   

    public function updateKhuyenMaiCtrl(KhuyenMaiModel $KhuyenMai)
    {
        return $this->updatetKhuyenMai($KhuyenMai);
    }

    public function deleteKhuyenMaiCtrl(KhuyenMaiModel $KhuyenMai)
    {
        return $this->deletetKhuyenMai($KhuyenMai);
    }

}
