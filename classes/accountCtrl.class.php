<?php
class AccountCtrl extends Account
{
    public function insertAccountCtrl(AccountModel $account)
    {
        return $this->insertAccount($account);
    }

   

    public function updateAccountCtrl(AccountModel $account)
    {
        return $this->updatetAccount($account);
    }

    public function deleteAccountCtrl(AccountModel $account)
    {
        return $this->deletetAccount($account);
    }

}
