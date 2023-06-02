<?php
class BaohanhModel
{
    private $id_baohanh;
    private $tenbaohanh;
    private $thoigianbaohanh;
    private $trangthai;

    // set
    public function setID_baohanh($id_baohanh)
    {
        $this->id_baohanh = $id_baohanh;
    }
    public function setTenbaohanh($tenbaohanh)
    {
        $this->tenbaohanh = $tenbaohanh;
    }
    public function setthoigianbaohanh($thoigianbaohanh)
    {
        $this->thoigianbaohanh = $thoigianbaohanh;
    }
    
    public function setTrangthai($trangthai)
    {
        $this->trangthai = $trangthai;
    }
  

    // get
    public function getID_baohanh()
    {
        return $this->id_baohanh;
    }
    public function getTenbaohanh()
    {
        return $this->tenbaohanh;
    }
    public function getthoigianbaohanh()
    {
        return $this->thoigianbaohanh;
    }
   
    public function getTrangthai()
    {
        return $this->trangthai;
    }
 
}
