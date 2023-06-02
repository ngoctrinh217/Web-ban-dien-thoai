<?php
class CustommerCtrl extends Custommer
{
    public function updateCustommerProfileCtrl(CustommerModel $cust)
    {
        return $this->updateCustommerProfile($cust);
    }
}
