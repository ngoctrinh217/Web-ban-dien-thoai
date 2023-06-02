<?php
class KhuyenMaiView extends KhuyenMai

{
    public function getAllKhuyenMai(){
        return $this->AllKhuyenMai();
    }
    public function getIdKhuyenMai($id){
        return $this->IdKhuyenMai($id);
    }
    public function getInputKhuyenMai($input){
        return $this->InputKhuyenMai($input);
    }

    
}