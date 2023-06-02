<?php
class AccountModel
{
    private $id_taikhoan;
    private $tendangnhap;
    private $matkhau;
    private $loaitaikhoan;
    private $trangthai;
    private $ngaytao;

    // set
    public function setID_TaiKhoan($id_taikhoan)
    {
        $this->id_taikhoan = $id_taikhoan;
    }
    public function setTendangnhap($tendangnhap)
    {
        $this->tendangnhap = $tendangnhap;
    }
    public function setMatKhau($matkhau)
    {
        $this->matkhau = $matkhau;
    }
    public function setLoaiTaiKhoan($loaitaikhoan)
    {
        $this->loaitaikhoan = $loaitaikhoan;
    }
    public function setTrangthai($trangthai)
    {
        $this->trangthai = $trangthai;
    }
    public function setNgayTao($ngaytao)
    {
        $this->ngaytao = $ngaytao;
    }

    // get
    public function getID_TaiKhoan()
    {
        return $this->id_taikhoan;
    }
    public function getTendangnhap()
    {
        return $this->tendangnhap;
    }
    public function getMatKhau()
    {
        return $this->matkhau;
    }
    public function getLoaiTaiKhoan()
    {
        return $this->loaitaikhoan;
    }
    public function getTrangthai()
    {
        return $this->trangthai;
    }
    public function getNgayTao()
    {
        return $this->ngaytao;
    }
}
