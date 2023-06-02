<?php
class CustommerView extends Custommer
{
    public function getCustommerByIdView($id)
    {
        return $this->getCustommerById($id);
    }

    public function getIFKhachhang($tenkhachhang)
    {
        return $this->getKhachhang($tenkhachhang);
    }


    public function getInputKH($input)
    {
        return $this->InputKH($input);
    }
    public function getInForKH()
    {
        return $this->IFKhachhang();
    }
}

