<?php
class CartDetailModel
{
    private $ID_donhang;
    private $ID_dienthoai;
    private $soluong;
    private $gia;
    private $ID_khuyenmai;
    private $ID_baohanh;
    private $Giasaukm;

    public function getID_donhang()
    {
        return $this->ID_donhang;
    }
    public function getID_dienthoai()
    {
        return $this->ID_dienthoai;
    }
    public function getSoluong()
    {
        return $this->soluong;
    }
    public function getGia()
    {
        return $this->gia;
    }
    public function getID_khuyenmai()
    {
        return $this->ID_khuyenmai;
    }
    public function getID_baohanh()
    {
        return $this->ID_baohanh;
    }
    public function getGiasaukm()
    {
        return $this->Giasaukm;
    }

    // Set
    public function setID_donhang($ID_donhang)
    {
        $this->ID_donhang = $ID_donhang;
    }
    public function setID_dienthoai($ID_dienthoai)
    {
        $this->ID_dienthoai = $ID_dienthoai;
    }
    public function setSoluong($soluong)
    {
        $this->soluong = $soluong;
    }
    public function setGia($gia)
    {
        $this->gia = $gia;
    }
    public function setID_khuyenmai($ID_khuyenmai)
    {
        $this->ID_khuyenmai = $ID_khuyenmai;
    }
    public function setID_baohanh($ID_baohanh)
    {
        $this->ID_baohanh = $ID_baohanh;
    }
    public function setGiasaukm($giasaukm)
    {
        $this->Giasaukm = $giasaukm;
    }
}
