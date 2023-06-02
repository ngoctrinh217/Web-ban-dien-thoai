<?php
class BaohanhView extends Baohanh

{
    public function getAllBaohanh(){
        return $this->AllBaohanh();
    }
    public function getIdBaohanh($id){
        return $this->IdBaohanh($id);
    }
    public function getInputBaohanh($input){
        return $this->InputBaohanh($input);
    }

    
}