<?php
class ProductCtrl extends Product
{
    public function updateProductQuantityCtrl($id, $quantity)
    {
        // if ($this->updateProductQuantity($id, $quantity)) {
        //     return true;
        // }
        // return false;
        return $this->updateProductQuantity($id, $quantity);
    }

    public function insertProductCtrl(ProductModel $product)
    {
        if ($this->insertProduct($product)) {
            return true;
        } else return false;
    }

    public function deleteProductCtrl($id)
    {
        return $this->deleteProduct($id);
    }

    public function updateProductCtrl(ProductModel $product)
    {
        return $this->updateProduct($product);
    }
}
