<?php
session_start();

include '../includes/autoload.php';


if (isset($_POST['user_id']) && isset($_POST['product_id'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    if (isset($_POST['quantity'])) {
        $quantity1 = $_POST['quantity'];
    } else {
        $quantity1 = 1;
    }
    if (isset($_SESSION['cart'])) {
        $cartList = $_SESSION['cart'];
    } else {
        $cartList = [];
    }
    if ($cartList == []) {
        $product = new ProductView();
        $result = $product->getProductByIdView($product_id);
        if ($result) {
            $product_name = $result['Tendt'];
            $product_img = $result['Anhdt'];
            $product_priceOld = $result['Giadt'];
            $km  = $result['Sogiamgia'];
            $km = (float)$km / 100;
            $product_priceOld = (int)$product_priceOld;
            $productQuantity = $result['Soluong'];
            $priceNew = $product_priceOld - ($product_priceOld * $km);
            $quantity = $quantity1;
            $ID_khuyenmai = $result['ID_khuyenmai'];
            $ID_baohanh = $result['ID_baohanh'];
            $total = $quantity * $priceNew;
            $cartItem = array(
                'product_id' => "$product_id",
                'image' => "$product_img",
                'nameProduct' => "$product_name",
                'quantity' => "$quantity",
                'price' => "$priceNew",
                'priceOld' => "$product_priceOld",
                'totalPrice' => "$total",
                'ID_khuyenmai' => "$ID_khuyenmai",
                'ID_baohanh' => "$ID_baohanh",
                'QuantityStock' => "$productQuantity",
            );
        }
        $_SESSION['cart'][] = $cartItem;
    } else {
        if (checkExistProductId($cartList, $product_id)) {
            $product = new ProductView();
            $result = $product->getProductByIdView($product_id);
            if (isset($_POST['quantity'])) {
                $quantity1 = $_POST['quantity'];
            } else {
                $quantity1 = 1;
            }
            if ($result) {
                $product_name = $result['Tendt'];
                $product_img = $result['Anhdt'];
                $product_priceOld = $result['Giadt'];
                $km  = $result['Sogiamgia'];
                $km = (float)$km / 100;
                $product_priceOld = (int)$product_priceOld;
                $productQuantity = $result['Soluong'];
                $priceNew = $product_priceOld - ($product_priceOld * $km);
                $quantity = $quantity1;
                $ID_khuyenmai = $result['ID_khuyenmai'];
                $ID_baohanh = $result['ID_baohanh'];
                $total = $quantity * $priceNew;
                $cartItem = array(
                    'product_id' => "$product_id",
                    'image' => "$product_img",
                    'nameProduct' => "$product_name",
                    'quantity' => "$quantity",
                    'price' => "$priceNew",
                    'totalPrice' => "$total",
                    'priceOld' => "$product_priceOld",
                    'ID_khuyenmai' => "$ID_khuyenmai",
                    'ID_baohanh' => "$ID_baohanh",
                    'QuantityStock' => "$productQuantity",
                );
                $_SESSION['cart'][] = $cartItem;
            }
        }
    }
}
// cartCount
if (isset($_POST['cartCount'])) {
    if (isset($_SESSION['cart'])) {
        echo count($_SESSION['cart']);
    } else {
        echo "0";
    }
}
function checkExistProductId($array, $id)
{
    foreach ($array as $item) {
        if ($item['product_id'] === $id) {
            return  false;
        }
    }
    return true;
}


if (isset($_POST['loadCart'])) {
    if (isset($_SESSION['cart'])) {
        if ($_SESSION['cart'] !== []) {
            $result = $_SESSION['cart'];
            $total_final = 0;
            $output = "";
            foreach ($result as $item) {
                $total_final = $total_final + $item['totalPrice'];
                $output .= "
                         <div class='card rounded-3 mb-4 cart-list'>
                            <div class='card-body p-4'>
        
                                <div class='row d-flex justify-content-between align-items-center'>
                                    <div class='col-md-2 col-lg-2 col-xl-2'>
                                        <img src='assets/img/{$item['image']}' class='img-fluid rounded-3' alt='Cotton T-shirt'>
                                    </div>
                                    <div class='col-md-3 col-lg-2 col-xl-3'>
                                        <p class='lead fw-normal mb-2 fs-2'>{$item['nameProduct']}</p>
                                        <p class='fs-3'><span class='text-muted'>Size: </span>M <span class='text-muted'>Color: </span>Grey
                                        </p>
                                    </div>
                                    <div class='col-md-2 col-lg-2 col-xl-2 d-flex fs-4'>
                                        <button class='btn btn-link px-2 minus-qty' pid={$item['product_id']} onclick='this.parentNode.querySelector(`input[type=number]`).stepDown()'>
                                            <i class='fas fa-minus'></i>
                                        </button>
        
                                        <input id='form1' pid={$item['product_id']} min='1' max='{$item['QuantityStock']}' name='quantity' value='{$item['quantity']}' type='number' class='form-control form-control-sm fs-3 qty qty-{$item['product_id']}' disabled/>
        
                                        <button class='btn btn-link px-2 add-qty' pid={$item['product_id']} onclick='this.parentNode.querySelector(`input[type=number]`).stepUp()'>
                                            <i class='fas fa-plus'></i>
                                        </button>
                                    </div>
                                    <div class='col-md-2 col-lg-1 col-xl-1 offset-lg-1'>
                                        <h5 class='mb-0 fs-4 price-{$item['product_id']}'>{$item['price']}</h5>
                                    </div>
                                    <div class='col-md-2 col-lg-2 col-xl-1 offset-lg-1 total-price' pid={$item['product_id']}>
                                        <h5 class='mb-0 fs-4 total-price-{$item['product_id']}'>{$item['totalPrice']}</h5>
                                    </div>
                                    <div class='col-md-1 col-lg-1 col-xl-1 text-end cart-delete fs-3' pid={$item['product_id']}>
                                        <a href='#!' class='text-danger'><i class='fas fa-trash fa-lg'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
            }
            $output .= "<div class='card'>
                        <div class='card-body d-flex justify-content-end align-items-center'>
                        <div class='d-flex justify-content-center align-items-center'>
                            <h3>Total :</h3>
                            <h3 class='total_final'>$total_final</h3>
                        </div>
                        <div>
                            <button type='button' class='btn btn-warning btn-block btn-lg fs-3 ms-5 checkout-btn'>Đặt hàng</button>
                        </div>
    
                        </div>
                     </div>";
            echo $output;
        } else {
            echo "<div class='container-fluid  mt-100 cart-emtpy'>
            <div class='row'>
               <div class='col-md-12'>
                       <div class='card'>
                   <div class='card-header'>
                   <h5>Giỏ hàng</h5>
                   </div>
                   <div class='card-body cart'>
                           <div class='col-sm-12 empty-cart-cls text-center'>
                               <img src='https://i.imgur.com/dCdflKN.png' width='130' height='130' class='img-fluid mb-4 mr-3'>
                               <h3><strong>Giỏ hàng của bạn đang trống</strong></h3>
                               <h4>Thêm một vài sản phẩm để làm tôi vui :)</h4>
                               <a href='./product.php' class='btn btn-primary cart-btn-transform m-3' data-abc='true'>Tiếp tục mua hàng</a>
                           </div>
                   </div>
             </div>
               </div>
            </div>
           </div>";
        }
    }
}


if (isset($_POST['removeId'])) {
    $pid = $_POST['removeId'];
    $result = $_SESSION['cart'];

    $resultNew = array_filter($result, function ($item) use ($pid) {
        return $item['product_id'] !== $pid;
    });

    $_SESSION['cart'] = $resultNew;
}


if (isset($_POST['updateCart'])) {
    $pid = $_POST['updateCartId'];
    $qty = $_POST['qtyUpdate'];
    $price = $_POST['priceUpdate'];
    $result = $_SESSION['cart'];
    $resultNew = changQtyValue($result, $pid, $qty, $price);
    foreach ($resultNew as $item) {
        if ($item['product_id'] == $pid) {
        }
    }
    $_SESSION['cart'] = $resultNew;
}
function changQtyValue(&$arr, $id, $qty, $price)
{
    foreach ($arr as &$item) {
        if ($item['product_id'] == $id) {
            $item['quantity'] = $qty;
            $item['totalPrice'] = $price;
            echo $item['quantity'];
            break;
        }
    }
    return $arr;
}

// Kiem tra login

if (isset($_POST['checkOut'])) {
    if (isset($_SESSION['auth'])) {
        $id_khachhang = $_SESSION['auth_user']['id_khachhang'];
        $id_nhanvien = 1;
        $date = date("Y-m-d");
        $Tonggiatien = $_POST['priceTotal'];
        $Diachi = $_SESSION['auth_user']['diachi'];
        $trangthaidonhang = 'Đang xử lí';
        $Ngaygiaohang = date("Y-m-d", strtotime($date . ' +7 day'));


        // Tao don hang

        $CartCtrl = new CartCtrl();
        $Cart = new CartModel();
        $Cart->setID_khachhang($id_khachhang);
        $Cart->setID_nhanvien($id_nhanvien);
        $Cart->setNgaydathang($date);
        $Cart->setTonggiatien($Tonggiatien);
        $Cart->setDiachigiaohang($Diachi);
        $Cart->setTrangthaidonhang($trangthaidonhang);
        $Cart->setNgaygiaohang($Ngaygiaohang);
        $order_id = $CartCtrl->inserCartCtrl($Cart);
        if ($order_id) {
            $result = $_SESSION['cart'];
            foreach ($result as $item) {
                $productView = new ProductView();
                $productCtrl = new ProductCtrl();
                $id_dienthoai = $item['product_id'];
                // Lay du lieu product 
                $productObj = $productView->getProductByIdView($id_dienthoai);
                // Lay so luong product hien tai
                $productQty = $productObj['Soluong'];
                $soluong = $item['quantity'];
                $productQtyAfter = (int)$productQty - (int)$soluong;
                $gia = $item['priceOld'];
                $ID_khuyenmai = $item['ID_khuyenmai'];
                $ID_baohanh = $item['ID_baohanh'];
                $giasaukm = $item['price'];
                $CartDetail = new CartDetailModel();
                $CartDetail->setID_donhang($order_id);
                $CartDetail->setID_dienthoai($id_dienthoai);
                $CartDetail->setSoluong($soluong);
                $CartDetail->setGia($gia);
                $CartDetail->setID_khuyenmai($ID_khuyenmai);
                $CartDetail->setID_baohanh($ID_baohanh);
                $CartDetail->setGiasaukm($giasaukm);
                echo "bbb";
                // Goi ham update quantity product va insertCart
                if ($productCtrl->updateProductQuantityCtrl($id_dienthoai, $productQtyAfter)) {
                    $CartCtrl->insertCartDetailCtrl($CartDetail);
                    $_SESSION['cart'] = [];
                } else echo "false";
            }
        } else {
            echo "false";
        }
    } else {
        echo "Chưa đăng nhập";
        // echo false;
    }
}
