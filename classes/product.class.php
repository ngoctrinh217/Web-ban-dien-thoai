<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'function') !== false) {
    $path = "../DTO/";
} else {
    $path = "DTO/";
}
include $path . 'ProductModel.php';
class Product extends Db
{
    protected function getProducts()
    {
        $sql = "SELECT distinct dienthoai.Tendt, dienthoai.Anhdt,dienthoai.Motadt,dienthoai.Giadt,thuonghieu.tenthuonghieu, dienthoai.ID_dienthoai,dienthoai.ID_thuonghieu FROM dienthoai,thuonghieu WHERE dienthoai.ID_thuonghieu = thuonghieu.id_thuonghieu and dienthoai.soluong <>'0' and dienthoai.trangthai='Active'";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        $data = [];
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return "Record not found.";
        }
        $this->close();
    }

    protected function getProductsbyNumberPage($offset, $limit_per_page, $id_brand)
    {

        if ($id_brand == 0) {
            $sql = "SELECT distinct dienthoai.Tendt, dienthoai.Anhdt,dienthoai.Motadt,dienthoai.Giadt,thuonghieu.tenthuonghieu,dienthoai.ID_dienthoai FROM dienthoai,thuonghieu WHERE dienthoai.ID_thuonghieu = thuonghieu.id_thuonghieu and dienthoai.soluong <>'0' and dienthoai.trangthai='Active' LIMIT {$offset},{$limit_per_page}";
        } else {
            $sql = "SELECT distinct dienthoai.Tendt, dienthoai.Anhdt,dienthoai.Motadt,dienthoai.Giadt,thuonghieu.tenthuonghieu,dienthoai.ID_dienthoai FROM dienthoai,thuonghieu WHERE dienthoai.ID_thuonghieu ='{$id_brand}' AND dienthoai.ID_thuonghieu = thuonghieu.id_thuonghieu and dienthoai.soluong <>'0' and dienthoai.trangthai='Active' LIMIT {$offset},{$limit_per_page}";
        }
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        $data = [];
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    protected function getProductsByBrands($id_brand)
    {
        $sql = "SELECT distinct dienthoai.Tendt, dienthoai.Anhdt,dienthoai.Motadt,dienthoai.Giadt,dienthoai.ID_dienthoai FROM dienthoai,thuonghieu WHERE dienthoai.ID_thuonghieu = thuonghieu.id_thuonghieu AND dienthoai.ID_thuonghieu ='{$id_brand}' and dienthoai.soluong <>'0' and dienthoai.trangthai='Active'";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        $data = [];
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    protected function getProductsById($id)
    {
        $sql = "SELECT distinct dienthoai.Tendt,dienthoai.Anhdt,dienthoai.Motadt,thuonghieu.tenthuonghieu,baohanh.Tenbaohanh,khuyenmai.Sogiamgia,dienthoai.Giadt,dienthoai.ID_khuyenmai,dienthoai.ID_baohanh,dienthoai.Soluong
        from dienthoai,thuonghieu,baohanh,khuyenmai
        where dienthoai.ID_dienthoai = $id and dienthoai.ID_thuonghieu = thuonghieu.id_thuonghieu and dienthoai.ID_Baohanh = baohanh.ID_Baohanh and dienthoai.ID_khuyenmai=khuyenmai.id_khuyenmai and dienthoai.soluong <>'0'";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
    }


    protected function updateProductQuantity($id, $quantity)
    {
        $sql = "update dienthoai
                set soluong = $quantity
                where ID_dienthoai = $id";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else return false;
    }

    // Admin
    protected function getProductsAdmin()
    {
        $sql = "SELECT distinct dienthoai.Tendt, dienthoai.Anhdt,dienthoai.Motadt,dienthoai.Giadt,thuonghieu.tenthuonghieu, dienthoai.ID_dienthoai,dienthoai.ID_thuonghieu,dienthoai.Soluong,dienthoai.trangthai
         FROM dienthoai,thuonghieu WHERE dienthoai.ID_thuonghieu = thuonghieu.id_thuonghieu";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        $data = [];
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            false;
        }
        $this->close();
    }
    // Thêm ,xóa sửa product
    protected function insertProduct(ProductModel $product)
    {
        $tendt = $product->getTendt();
        $anhdt = $product->getAnhdt();
        $mota = $product->getMota();
        $giadt = $product->getGiadt();
        $soluong = $product->getSoluong();
        $id_thuonghieu = $product->getid_thuonghieu();
        $id_nhacungcap = $product->getid_nhacungcap();
        $id_khuyenmai = $product->getid_khuyenmai();
        $id_baohanh = $product->getid_baohanh();
        $luotxem = 0;
        $trangthai = 'Active';
        $sql = "INSERT INTO dienthoai (Tendt,Anhdt,Motadt,Giadt,Soluong,ID_thuonghieu,ID_Nhacungcap,ID_khuyenmai,ID_baohanh,trangthai,luotxem) VALUES('$tendt','$anhdt','$mota','$giadt','$soluong','$id_thuonghieu','$id_nhacungcap','$id_khuyenmai','$id_baohanh','$trangthai','$luotxem')";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else  return false;
    }

    protected function deleteProduct($id_product)
    {
        $sql = "UPDATE dienthoai set trangthai='Not Active' where ID_dienthoai = '$id_product'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else return false;
    }

    protected function updateProduct(ProductModel $product)
    {
        $id_Dienthoai = $product->getId_dienthoai();
        $tendt = $product->getTendt();
        $anhdt = $product->getAnhdt();
        $mota = $product->getMota();
        $giadt = $product->getGiadt();
        $soluong = $product->getSoluong();
        $id_thuonghieu = $product->getid_thuonghieu();
        $id_nhacungcap = $product->getid_nhacungcap();
        $id_khuyenmai = $product->getid_khuyenmai();
        $id_baohanh = $product->getid_baohanh();
        $trangthai = $product->getTrangthai();
        $sql = "UPDATE dienthoai set Tendt = '$tendt',Anhdt = '$anhdt',Motadt = '$mota',ID_thuonghieu ='$id_thuonghieu',ID_Nhacungcap='$id_nhacungcap',ID_khuyenmai='$id_khuyenmai',ID_baohanh='$id_baohanh',trangthai='$trangthai' where ID_dienthoai ='$id_Dienthoai'";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        } else return false;
    }

    protected function getProductsAdminById($id)
    {
        $sql = "SELECT *
        from dienthoai
        where dienthoai.ID_dienthoai = '$id'";
        $result = mysqli_query($this->connect(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
    }

    // Ham get san pham theo thu tu tang dan 
    protected function getProductByASC()
    {
        $sql = "SELECT *
        from dienthoai
        WHERE dienthoai.trangthai != 'Not Active' AND dienthoai.Soluong != 0
        order by Giadt ASC";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
    // Ham get san pham theo thu thu giam dan
    protected function getProductDESC()
    {
        $sql = "SELECT *
        from dienthoai
        WHERE dienthoai.trangthai != 'Not Active' AND dienthoai.Soluong != 0
        order by Giadt DESC";
        $result = mysqli_query($this->connect(), $sql);
        $data = [];
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        } else return false;
    }
}
