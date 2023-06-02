<?php
class CustommerModel
{
    private $tenkh;
    private $gioitinh;
    private $diachi;
    private $sdt;
    private $email;
    private $id_kh;
    // get
    public function getId()
    {
        return $this->id_kh;
    }
    public function getTenKH()
    {
        return $this->tenkh;
    }
    public function getGioitinh()
    {
        return $this->gioitinh;
    }
    public function getDiachi()
    {
        return $this->diachi;
    }
    public function getSdt()
    {
        return $this->sdt;
    }
    public function getEmail()
    {
        return $this->email;
    }
    // Set
    public function setId($id)
    {
        $this->id_kh = $id;
    }
    public function setTenKH($tenkh)
    {
        $this->tenkh = $tenkh;
    }
    public function setGioitinh($gioitinh)
    {
        $this->gioitinh = $gioitinh;
    }
    public function setDiachi($diachi)
    {
        $this->diachi = $diachi;
    }
    public function setSdt($sdt)
    {
        $this->sdt = $sdt;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
