<?php
class CartView extends Cart
{
    public function getOrderByIdCustomerView($id)
    {
        return $this->getOrderByIdCustomer($id);
    }

    public function getOrderDetailByIdOrderView($id)
    {
        return $this->getOrderDetailByIdOrder($id);
    }
}
