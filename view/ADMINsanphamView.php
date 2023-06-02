<?php
class sanphamview extends sanpham
{
  
    public function getNhacungcapView(){
        $result = $this->getNhacungcap();
        if($result == false) {
            return false;
        }
        return $result;
    }
    public function getKhuyenmaiView(){
        $result = $this->getKhuyenmai();
        if($result == false) {
            return false;
        }
        return $result;
    }
    public function getBaohanhView(){
        $result = $this->getBaohanh();
        if($result == false) {
            return false;
        }
        return $result;
    }

    
   // display catelogy 
    public function getCartegoryView(){
        $result = $this->getCartegory();
        if($result == false) {
            return false;
        }
        return $result;
    }

      // display all product and input ==''
      public function getInforSPView($offset, $limit_per_pages){
        $result = $this->getInforSP($offset, $limit_per_pages);
        if($result ==false) {
            return false;
        }
        return $result;
    }
    
// display all product and input  !=''
public function getInforSPProductView($input,$offset, $limit_per_pages){
    $result = $this->getInforSPProduct($input,$offset, $limit_per_pages);
    if($result == false) {
        return false;
    }
    return $result;
}


  // display all product of brand and input = ''
    public function getSpBrandView($id_brand,$offset, $limit_per_pages){
        $result = $this->getSpBrand($id_brand,$offset, $limit_per_pages);
        if($result == false) {
            return false;
        }
        return $result;
    }

    // display all product of brand and !input = ''
    public function getSpBrand_InputView($input,$id_brand,$offset, $limit_per_pages){
        $result = $this->getSpBrandInput($input,$id_brand,$offset, $limit_per_pages);
        if($result == false) {
            return false;
        }
        return $result;
    }


      // pagination all product and input == ''
      public function getsanphamView(){
        $result = $this->getSanpham();
        if($result == false) {
            return false;
        }
        return $result;
    }
    
    public function getAlldataProductView($id){
        $result = $this->getAlldataProduct($id);
        if($result == false) {
            return false;
        }
        return $result;
    }
      // pagination all product and input != ''
      public function getsanpham_inputView($input){
        $result = $this->getSanpham_Input($input);
        if($result == false) {
            return false;
        }
        return $result;
    }

    // paginatin display product in catelogy  and input == ''
    public function getSpBrandProductView($id_brand){
        $result = $this->getSpBrandProduct($id_brand);
        if($result == false) {
            return false;
        }
        return $result;
    }
      // paginatin display product in catelogy  and input != ''
      public function getSpBrandProduct_inputView($input, $id_brand){
        $result = $this->getSpBrandProduct_input($input,$id_brand);
        if($result == false) {
            return false;
        }
        return $result;
    }

     // deltete product
     public function getdeleteSP($id_product){
        $result = $this->deleteSP($id_product);
        if($result == false) {
            return false;
        }
        return $result;
    }
    public function getUpdataProduct($id_product,$ID_th,$ID_ncc,$Tendt,$filename,$Mota,$Gia,$soluong,$luotxem,$ID_km,$ID_bh){
        $result = $this->UpdateProduct($id_product,$ID_th,$ID_ncc,$Tendt,$filename,$Mota,$Gia,$soluong,$luotxem,$ID_km,$ID_bh);
        if($result == false) {
            return false;
        }
        return $result;
    }
    public function getInsertProduct($ID_th,$ID_ncc,$Tendt,$filename,$Mota,$Gia,$soluong,$luotxem,$ID_km,$ID_bh){
        $result = $this->InsertProduct($ID_th,$ID_ncc,$Tendt,$filename,$Mota,$Gia,$soluong,$luotxem,$ID_km,$ID_bh);
        if($result == false) {
            return false;
        }
        return $result;
    }


//DTO 
public function deleteProductView($id_product){
    $result = $this->deleteProduct($id_product);
    if($result == false) {
        return false;
    }
    return $result;
}
public function insertsanphamView(ProductModel $product)
{
    if ($this->insertsanpham($product)) {
        return true;
    } else return false;
}
public function updatesanphamView(ProductModel $product)
{
    if ($this->updatesanpham($product)) {
        return true;
    } else return false;
}

}