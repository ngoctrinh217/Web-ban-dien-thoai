<?php
class ProductModel
{
    private $tendt;
    private $anhdt;
    private $mota;
    private $giadt;
    private $soluong;
    private $id_thuonghieu;
    private $id_nhacungcap;
    private $id_khuyenmai;
    private $id_baohanh;
    private $trangthai;
    private $ID_dienthoai;

    //get
    public function getId_dienthoai()
    {
        return $this->ID_dienthoai;
    }
    public function getTrangthai()
    {
        return $this->trangthai;
    }
    public function getTendt()
    {
        return $this->tendt;
    }
    public function getAnhdt()
    {
        return $this->anhdt;
    }
    public function getMota()
    {
        return $this->mota;
    }
    public function getGiadt()
    {
        return $this->giadt;
    }
    public function getSoluong()
    {
        return $this->soluong;
    }
    public function getid_thuonghieu()
    {
        return $this->id_thuonghieu;
    }
    public function getid_nhacungcap()
    {
        return $this->id_nhacungcap;
    }
    public function getid_khuyenmai()
    {
        return $this->id_khuyenmai;
    }
    public function getid_baohanh()
    {
        return $this->id_baohanh;
    }
    //    set
    public function setId_dienthoai($id_dienthoai)
    {
        $this->ID_dienthoai = $id_dienthoai;
    }
    public function setTrangthai($trangthai)
    {
        $this->trangthai = $trangthai;
    }
    public function setTendt($tendt)
    {
        $this->tendt = $tendt;
    }
    public function setAnhdt($anhdt)
    {
        $this->anhdt = $anhdt;
    }
    public function setMota($mota)
    {
        $this->mota = $mota;
    }
    public function setGiadt($giadt)
    {
        $this->giadt = $giadt;
    }
    public function setSoluong($soluong)
    {
        $this->soluong = $soluong;
    }
    public function setid_thuonghieu($id_thuonghieu)
    {
        $this->id_thuonghieu = $id_thuonghieu;
    }
    public function setid_nhacungcap($id_nhacungcap)
    {
        $this->id_nhacungcap = $id_nhacungcap;
    }
    public function setid_khuyenmai($id_khuyenmai)
    {
        $this->id_khuyenmai = $id_khuyenmai;
    }
    public function setid_baohanh($id_baohanh)
    {
        $this->id_baohanh = $id_baohanh;
    }
}
