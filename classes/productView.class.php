<?php
class ProductView extends Product
{

    public function getProductsView()
    {
        $result = $this->getProducts();
        if ($result != "Record not found.") {
            return $result;
        } else {
            return  "Record not found.";
        }
    }

    public function getProductsViewByBrandView($id_brand)
    {
        $result = $this->getProductsByBrands($id_brand);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getProductViewByNumberPage($offset, $limit_per_page, $id_brand)
    {
        $result = $this->getProductsbyNumberPage($offset, $limit_per_page, $id_brand);
        if ($result) {
            return $result;
        }
        return false;
    }


    public function getProductByIdView($id)
    {
        $result = $this->getProductsById($id);
        if ($result) {
            return $result;
        }
        return false;
    }

    public function getProductsAdminView()
    {
        return $this->getProductsAdmin();
    }
    public function getProductsAdminByIdView($id)
    {
        return $this->getProductsAdminById($id);
    }

    public function getProductByASCView()
    {
        return $this->getProductByASC();
    }
    public function getProductDESCView()
    {
        return $this->getProductDESC();
    }
}
