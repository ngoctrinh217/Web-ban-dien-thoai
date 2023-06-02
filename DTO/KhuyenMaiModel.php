<?php
class KhuyenMaiModel
{
    private $id_khuyenmai;
    private $tenkhuyenmai;
    private $motaKM;
    private $sogiamgia;
    private $trangthai;

    // set
    public function setID_khuyenmai($id_khuyenmai)
    {
        $this->id_khuyenmai = $id_khuyenmai;
    }
    public function setTenkhuyenmai($tenkhuyenmai)
    {
        $this->tenkhuyenmai = $tenkhuyenmai;
    }
    public function setmotaKM($motaKM)
    {
        $this->motaKM = $motaKM;
    }
    public function setsogiamgia($sogiamgia)
    {
        $this->sogiamgia = $sogiamgia;
    }
    
    public function setTrangthai($trangthai)
    {
        $this->trangthai = $trangthai;
    }
  

    // get
    public function getID_khuyenmai()
    {
        return $this->id_khuyenmai;
    }
    public function getTenkhuyenmai()
    {
        return $this->tenkhuyenmai;
    }
    public function getmotaKM()
    {
        return $this->motaKM;
    }
    public function getsogiamgia()
    {
        return $this->sogiamgia;
    }
   
    public function getTrangthai()
    {
        return $this->trangthai;
    }
 
}
