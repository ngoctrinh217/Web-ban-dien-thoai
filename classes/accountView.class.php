<?php
class AccountView extends Account

{
    public function getAllAccount(){
        return $this->AllAccount();
    }
    public function getIdAccount($id){
        return $this->IdAccount($id);
    }
    public function getInputAccount($input){
        return $this->InputAccount($input);
    }

    public function getExitAccount($tendangnhap){
        return $this->exitAccount($tendangnhap);
    }
}