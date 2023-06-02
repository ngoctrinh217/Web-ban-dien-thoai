<?php
class OrderModel
{
    private $id_donhang;
    private $id_nhanvien;
    private $ngaycapnhat;
    private $ngaygiaohang;
    private $trangthai;

    // SET
    public function setid_donhang($id_donhang)
    {
        $this->id_donhang = $id_donhang;
    }
    public function setid_nhanvien($id_nhanvien)
    {
        $this->id_nhanvien = $id_nhanvien;
    }
    public function setngaycapnhat($ngaycapnhat)
    {
        $this->ngaycapnhat = $ngaycapnhat;
    }
    public function setngaygiaohang($ngaygiaohang)
    {
        $this->ngaygiaohang = $ngaygiaohang;
    }
    public function settrangthai($trangthai)
    {
        $this->trangthai = $trangthai;
    }
    // GET
    public function getid_donhang()
    {
        return $this->id_donhang;
    }
    public function getid_nhanvien()
    {
        return $this->id_nhanvien;
    }
    public function getngaycapnhat()
    {
        return $this->ngaycapnhat;
    }
    public function getngaygiaohang()
    {
        return $this->ngaygiaohang;
    }
    public function gettrangthai()
    {
        return $this->trangthai;
    }
}
