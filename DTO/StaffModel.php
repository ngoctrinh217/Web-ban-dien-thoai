<?php
class StaffModel
{
    private $id_nhanvien;
    private $tennhanvien;
    private $ngaysinh;
    private $diachi;
    private $gioitinh;
    private $sdt;
    private $id_quyen;

    public function getID_nhanvien()
    {
        return $this->id_nhanvien;
    }
    public function getTenNV()
    {
        return $this->tennhanvien;
    }
    public function getNgaysinh()
    {
        return $this->ngaysinh;
    }
    public function getDiachi()
    {
        return $this->diachi;
    }
    public function getGioiTinh()
    {
        return $this->gioitinh;
    }
    public function getSDT()
    {
        return $this->sdt;
    }
    public function getID_Quyen()
    {
        return $this->id_quyen;
    }

    // Set
    public function setID_nhanvien($id_nhanvien)
    {
        $this->id_nhanvien = $id_nhanvien;
    }
    public function setTennv($tennhanvien)
    {
        $this->tennhanvien = $tennhanvien;
    }
    public function setNgaysinh($ngaysinh)
    {
        $this->ngaysinh = $ngaysinh;
    }
    public function setDiachi($diachi)
    {
        $this->diachi = $diachi;
    }
    public function setGioiTinh($gioitinh)
    {
        $this->gioitinh = $gioitinh;
    }
    public function setSDT($sdt)
    {
        $this->sdt = $sdt;
    }
    public function setID_Quyen($id_quyen)
    {
        $this->id_quyen = $id_quyen;
    }
}
