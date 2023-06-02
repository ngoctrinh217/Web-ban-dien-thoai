<?php
class CartModel
{
    private $ID_khachhang;
    private $ID_nhanvien;
    private $ngaydathang;
    private $Tonggiatien;
    private $Diachigiaohang;
    private $Trangthaidonhang;
    private $Ngaygiaohang;

    public function getNgaygiaohang()
    {
        return $this->Ngaygiaohang;
    }
    public function getID_khachhang()
    {
        return $this->ID_khachhang;
    }
    public function getID_nhanvien()
    {
        return $this->ID_nhanvien;
    }
    public function getNgaydathang()
    {
        return $this->ngaydathang;
    }
    public function getTonggiatien()
    {
        return $this->Tonggiatien;
    }

    public function getDiachigiaohang()
    {
        return $this->Diachigiaohang;
    }
    public function getTrangthaidonhang()
    {
        return $this->Trangthaidonhang;
    }
    // Set
    public function setNgaygiaohang($Ngaygiaohang)
    {
        $this->Ngaygiaohang = $Ngaygiaohang;
    }
    public function setID_khachhang($ID_khachhang)
    {
        $this->ID_khachhang = $ID_khachhang;
    }
    public function setID_nhanvien($ID_nhanvien)
    {
        $this->ID_nhanvien = $ID_nhanvien;
    }
    public function setNgaydathang($Ngaydathang)
    {
        $this->ngaydathang = $Ngaydathang;
    }
    public function setTonggiatien($Tonggiatien)
    {
        $this->Tonggiatien = $Tonggiatien;
    }

    public function setDiachigiaohang($Diachigiaohang)
    {
        $this->Diachigiaohang = $Diachigiaohang;
    }
    public function setTrangthaidonhang($Trangthaidonhang)
    {
        $this->Trangthaidonhang = $Trangthaidonhang;
    }
}
