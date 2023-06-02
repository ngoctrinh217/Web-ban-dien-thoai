<?php
class OrderCtrl extends Order
{
    public function updateOrderCtrl(OrderModel $order)
    {
        return $this->updateOrder($order);
    }
}
