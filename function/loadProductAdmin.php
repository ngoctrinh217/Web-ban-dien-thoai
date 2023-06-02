<?php

include '../includes/autoload.php';

if (isset($_POST['loadProductAdmin'])) {
    $per_page_limit = 6;
    $productView = new ProductView();
    $result = $productView->getProductsAdminView();
    if (isset($_POST['page_no'])) {
        $page_no = $_POST['page_no'];
    } else {
        $page_no = 1;
    }
    $offset = ($page_no - 1) * $per_page_limit;

    $resultOffical = litmitPerPages($result, $offset, $per_page_limit);
    $output = "";
    if ($resultOffical) {
        $offset++;
        foreach ($resultOffical as $item) {
            $id_dienthoai = $item['ID_dienthoai'];
            $tendt = $item['Tendt'];
            $anhdt = $item['Anhdt'];
            $thuonghieu = $item['tenthuonghieu'];
            $gia = $item['Giadt'];
            $formmatGia = number_format((int)$gia, 0, ',', ',');
            $soluong = $item['Soluong'];
            $Trangthai = $item['trangthai'];
            if ($Trangthai == 'Active') {
                $className = 'text-success';
            } else {
                $className = 'text-danger';
            }
            $output .= "<tr>
            <td class=' fs-5'>{$offset}</td>
            <td class=' fs-5'>{$tendt}</td>
            <td class=' fs-5'>
                <div class='img-product'>
                    <img src='../assets/img/{$anhdt}' alt=''>
                </div>
            </td>
            <td class=' fs-5'>{$thuonghieu}</td>
            <td class=' fs-5'>{$formmatGia}</td>
            <td class=' fs-5'>{$soluong}</td>
            <td class=' fs-5 $className fw-bold'>{$Trangthai}</td>
            <td class=' fs-5'>
                <div class='d-flex justify-content-around align-items-center control-wrap'>
                    <i class='fa-solid fa-pen-to-square edit' pid='{$id_dienthoai}' data-bs-toggle='modal' data-bs-target='#exampleModalEdit'></i>
                    <i class='fa-solid fa-trash delete' pid='{$id_dienthoai}'></i>
                </div>
            </td>
        </tr>";
            $offset++;
        }
        echo $output;
    } else {
        echo "Product not found";
    }
}


if (isset($_POST['loadPaginationProduct'])) {
    if (isset($_POST['page_no'])) {
        $page_no = $_POST['page_no'];
    } else {
        $page_no = 1;
    }
    $productView = new ProductView();
    $per_page_limit = 6;
    $result = $productView->getProductsAdminView();
    $output = "";
    $output .= " <ul class='pagination'>
    <li class='page-item'>
        <a class='page-link' href='#' aria-label='Previous'>
            <span aria-hidden='true'>&laquo;</span>
        </a>
    </li>";
    $page_number = ceil(count($result) / $per_page_limit);
    for ($i = 1; $i <= $page_number; $i++) {
        if ($page_no == $i) {
            $className = 'active';
        } else {
            $className = '';
        }
        $output .= "
        <li class='page-item {$className} product-page-no'><a class='page-link' id='{$i}' href='#'>{$i}</a></li>
        ";
    }

    $output .= "
    <li class='page-item'>
       <a class='page-link' href='#' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
        </a>
    </li>
    </ul>";
    echo $output;
}

function litmitPerPages($arrayOld, $offset, $limit)
{
    if (count($arrayOld) == 0) {
        return false;
    } else {
        return array_slice($arrayOld, $offset, $limit);
    }
}


if (isset($_POST['insertProduct'])) {
    $tendt = $_POST['tendt'];
    $mota = $_POST['mota'];
    $image_name = $_POST['image_name'];
    $gia = $_POST['gia'];
    $quantity = $_POST['quantity'];
    $khuyenmai = $_POST['khuyenmai'];
    $baohanh = $_POST['baohanh'];
    $brand = $_POST['brand'];
    $suppli = $_POST['suppli'];
    $productCtrl = new ProductCtrl();
    $productModel = new ProductModel();
    $productModel->setTendt($tendt);
    $productModel->setAnhdt($image_name);
    $productModel->setMota($mota);
    $productModel->setGiadt($gia);
    $productModel->setSoluong($quantity);
    $productModel->setid_thuonghieu($brand);
    $productModel->setid_nhacungcap($suppli);
    $productModel->setid_khuyenmai($khuyenmai);
    $productModel->setid_baohanh($baohanh);
    if ($productCtrl->insertProductCtrl($productModel)) {
        echo "Thêm sản phẩm thành công";
    } else echo "Thất bại";
}


if (isset($_POST['loadFormAddProduct'])) {
    $discountView = new DiscountView();
    $guaranteeView = new GuaranteeView();
    $brandView = new BrandView();
    $suppliView = new SuppliView();
    $resultDiscount = $discountView->getDiscountAllView();
    $resultGuarantee = $guaranteeView->getGuaranteeAllView();
    $resultBrand = $brandView->getAllBrandsView();
    $resultSuppli = $suppliView->getSuppliAllView();

    $output = "";
    if ($resultDiscount && $resultGuarantee && $resultBrand && $resultSuppli) {
        $output .= "<div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Form Thêm điện thoại</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
    </div>
    <div class='modal-body'>
        <div class='row mt-3'>
            <div class='col form-input-product'>
                <h6>Tên điện thoại</h6>
                <input class='input-name' type='text' placeholder='VD: Iphone 13 promax'>
            </div>
            <div class='col'>
                <h6>Ảnh điện thoại</h6>
                <input type='file' class='file-input'>
                <div class='image-wrap'>
                    <img id='image-preview' src='' alt='Preview image'>
                </div>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col form-input-product'>
                <h6>Giá</h6>
                <input class='bg-secondary text-white input-price' type='text' value='0' disabled>
            </div>
            <div class='col form-input-product'>
                <h6>Số lượng</h6>
                <input class='bg-secondary text-white input-quantity' type='text' value='0' disabled>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col form-input-product'>
                <h6>Khuyến mãi</h6>
                <select class='form-select input-khuyenmai' aria-label='Default select example'>";
        foreach ($resultDiscount  as $item) {
            $id_khuyenmai = $item['id_khuyenmai'];
            $sogiamgia = $item['Sogiamgia'];
            $output .= "
                <option value ='{$id_khuyenmai}'>{$sogiamgia}</option>
            ";
        }
        $output .= "</select>
            </div>
            <div class='col form-input-product'>
                <h6>Bảo hành</h6>
                <select class='form-select input-baohanh' aria-label='Default select example'>";
        foreach ($resultGuarantee as $item) {
            $id_baohanh = $item['ID_Baohanh'];
            $thoigianbaohanh = $item['Thoigianbaohanh'];
            $thoigianbaohanh = ltrim($thoigianbaohanh, '0');
            $output .= "
                <option value='{$id_baohanh}'>{$thoigianbaohanh} Tháng</option>
            ";
        }
        $output .= "  </select>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col form-input-product'>
                <h6>Thương hiệu</h6>
                <select class='form-select input-brand' aria-label='Default select example'>";
        foreach ($resultBrand as $item) {
            $id_thuonghieu = $item['id_thuonghieu'];
            $tenthuonghieu = $item['tenthuonghieu'];
            $output .= "
                        <option value='{$id_thuonghieu}'>{$tenthuonghieu}</option>
                    ";
        }
        $output .= " </select>
            </div>
            <div class='col form-input-product'>
                <h6>Nhà cung cấp</h6>
                <select class='form-select input-suppli' aria-label='Default select example'>";
        foreach ($resultSuppli as $item) {
            $id_nhacungcap = $item['id_nhacungcap'];
            $tennhacungcap = $item['tennhacungcap'];
            $output .= "
                                <option value='{$id_nhacungcap}'>{$tennhacungcap}</option>
                            ";
        }
        $output .= "    </select>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col'>
                <div class='form-outline'>
                    <textarea class='form-control input-desc' id='textAreaExample2' rows='2' placeholder='VD: Mô tả'></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-secondary close' data-bs-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary submit'>Save</button>
    </div>";
        echo $output;
    } else {
        echo "Not found";
    }
}


if (isset($_POST['deleteProduct'])) {
    $id_product = $_POST['pid'];
    $productCtrl = new ProductCtrl();
    if ($productCtrl->deleteProductCtrl($id_product)) {
        echo "Hủy sản phẩm thành công";
    } else echo "Hủy sản phẩm thất bại";
}


if (isset($_POST['loadFormEditProduct'])) {
    $id_product = $_POST['id_product'];
    $productView = new ProductView();
    $result = $productView->getProductsAdminByIdView($id_product);
    $output = "";
    if ($result) {
        $trangthai = $result['trangthai'];
        $discountView = new DiscountView();
        $guaranteeView = new GuaranteeView();
        $brandView = new BrandView();
        $suppliView = new SuppliView();
        $tendt = $result['Tendt'];
        $anhdt = $result['Anhdt'];
        $giadt = $result['Giadt'];
        $mota = $result['Motadt'];
        $soluong = $result['Soluong'];
        $ID_thuonghieu = $result['ID_thuonghieu'];
        $ID_nhacungcap = $result['ID_Nhacungcap'];
        $ID_khuyenmai = $result['ID_khuyenmai'];
        $ID_baohanh = $result['ID_baohanh'];
        $resultDiscount = $discountView->getDiscountAllView();
        $resultGuarantee = $guaranteeView->getGuaranteeAllView();
        $resultBrand = $brandView->getAllBrandsView();
        $resultSuppli = $suppliView->getSuppliAllView();
        $output = "<div class='modal-header'>
    <h5 class='modal-title' id='exampleModalLabel'>Form Thêm điện thoại</h5>
    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
</div>
<div class='modal-body'>
    <div class='row mt-3'>
        <div class='col form-input-product'>
            <h6>Tên điện thoại</h6>
            <input class='input-name' type='text' placeholder='VD: Iphone 13 promax' value='{$tendt}'>
        </div>
        <div class='col'>
            <h6>Ảnh điện thoại</h6>
            <input type='file' class='file-input' value='../assets/img/{$anhdt}'>
            <div class='image-wrap'>
                <img id='image-preview' src='../assets/img/{$anhdt}' alt='Preview image'>
            </div>
        </div>
    </div>
    <div class='row mt-3'>
        <div class='col form-input-product'>
            <h6>Giá</h6>
            <input class='bg-secondary text-white input-price' type='text' value='{$giadt}' disabled>
        </div>
        <div class='col form-input-product'>
            <h6>Số lượng</h6>
            <input class='bg-secondary text-white input-quantity' type='text' value='{$soluong}' disabled>
        </div>
    </div>
    <div class='row mt-3'>
        <div class='col form-input-product'>
            <h6>Khuyến mãi</h6>
            <select class='form-select input-khuyenmai' aria-label='Default select example'>";
        foreach ($resultDiscount  as $item) {
            $id_khuyenmai = $item['id_khuyenmai'];
            $sogiamgia = $item['Sogiamgia'];
            if ($id_khuyenmai == $ID_khuyenmai) {
                $className = 'selected';
            } else {
                $className = '';
            }
            $output .= "
            <option $className value ='{$id_khuyenmai}'>{$sogiamgia}</option>
        ";
        }
        $output .= "</select>
        </div>
        <div class='col form-input-product'>
            <h6>Bảo hành</h6>
            <select class='form-select input-baohanh' aria-label='Default select example'>";
        foreach ($resultGuarantee as $item) {
            $id_baohanh = $item['ID_Baohanh'];
            $thoigianbaohanh = $item['Thoigianbaohanh'];
            $thoigianbaohanh = ltrim($thoigianbaohanh, '0');
            if ($id_baohanh == $ID_baohanh) {
                $className = 'selected';
            } else {
                $className = '';
            }
            $output .= "
            <option $className value='{$id_baohanh}'>{$thoigianbaohanh} Tháng</option>
        ";
        }
        $output .= "  </select>
        </div>
    </div>
    <div class='row mt-3'>
        <div class='col form-input-product'>
            <h6>Thương hiệu</h6>
            <select class='form-select input-brand' aria-label='Default select example'>";
        foreach ($resultBrand as $item) {
            $id_thuonghieu = $item['id_thuonghieu'];
            $tenthuonghieu = $item['tenthuonghieu'];
            if ($id_thuonghieu == $ID_thuonghieu) {
                $className = 'selected';
            } else {
                $className = '';
            }
            $output .= "
                    <option $className value='{$id_thuonghieu}'>{$tenthuonghieu}</option>
                ";
        }
        $output .= " </select>
        </div>
        <div class='col form-input-product'>
            <h6>Nhà cung cấp</h6>
            <select class='form-select input-suppli' aria-label='Default select example'>";
        foreach ($resultSuppli as $item) {
            $id_nhacungcap = $item['id_nhacungcap'];
            $tennhacungcap = $item['tennhacungcap'];
            if ($id_nhacungcap ==  $ID_nhacungcap) {
                $className = 'selected';
            } else {
                $className = '';
            }
            $output .= "
                            <option  $className value='{$id_nhacungcap}'>{$tennhacungcap}</option>
                        ";
        }
        $output .= "    </select>
        </div>
    </div>
    <div class='row mt-3'>
        <div class='col'>
            <div class='form-outline'>
                <textarea class='form-control input-desc' id='textAreaExample2' rows='2' placeholder='VD: Mô tả'>{$mota}</textarea>
            </div>
        </div>
    </div>
    <div class='row mt-3'>
        <div class='col'>
            <div class='form-check form-switch d-flex justify-content-start align-items-center'>";
        if ($trangthai == 'Active') {
            $className = 'checked';
        } else {
            $className = '';
        }
        $output .= "
            <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' $className>
            <label class='form-check-label fs-5 text-success fw-bold ms-3' for='flexSwitchCheckChecked'>Active</label>
            </div>
        </div>
    </div>
</div>
<div class='modal-footer'>
    <button type='button' class='btn btn-secondary close' data-bs-dismiss='modal'>Close</button>
    <button type='button' class='btn btn-primary submit' pid='{$id_product}'>Save</button>
</div>";
        echo $output;
    }
}

if (isset($_POST['editProduct'])) {
    $tendt = $_POST['tendt'];
    $mota = $_POST['mota'];
    $image = $_POST['image_name'];
    $gia = $_POST['gia'];
    $quantity = $_POST['quantity'];
    $khuyenmai = $_POST['khuyenmai'];
    $baohanh = $_POST['baohanh'];
    $brand = $_POST['brand'];
    $suppli = $_POST['suppli'];
    $trangthai = $_POST['trangthai'];
    $id_product = $_POST['id_product'];
    $productCtrl = new ProductCtrl();
    $productModel = new ProductModel();
    $productModel->setId_dienthoai($id_product);
    $productModel->setTrangthai($trangthai);
    $productModel->setTendt($tendt);
    $productModel->setAnhdt($image);
    $productModel->setMota($mota);
    $productModel->setGiadt($gia);
    $productModel->setSoluong($quantity);
    $productModel->setid_thuonghieu($brand);
    $productModel->setid_nhacungcap($suppli);
    $productModel->setid_khuyenmai($khuyenmai);
    $productModel->setid_baohanh($baohanh);
    if ($productCtrl->updateProductCtrl($productModel)) {
        echo "Sửa sản phẩm thành công";
    } else {
        echo "Sửa sản phẩm thất bại";
    }
}
