<?php
session_start();

include '../includes/autoload.php';

if (isset($_POST['loadOrder'])) {
    $id_custommer =  $_SESSION['auth_user']['id_khachhang'];
    $order = new CartView();
    $result = $order->getOrderByIdCustomerView($id_custommer);
    $output = "";
    if ($result) {
        $stt = 1;
        $output .= "  <div class='bg-image h-100'>
        <div class='mask d-flex align-items-center h-100'>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-12'>
                        <div class='card shadow-2-strong' style='background-color: #f5f7fa;'>
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table class='table table-xl table-borderless mb-0'>
                                        <thead class='table-header'>
                                            <tr>
                                                <th scope='col' class='fs-3'>STT</th>
                                                <th scope='col' class='fs-3'>Mã đơn hàng</th>
                                                <th scope='col' class='fs-3'>Ngày đặt hàng</th>
                                                <th scope='col' class='fs-3'>Ngày giao hàng</th>
                                                <th scope='col' class='fs-3'>Tổng tiền</th>
                                                <th scope='col' class='fs-3'>Trạng thái đơn hàng</th>
                                                <th scope='col' class='fs-3'>Hủy đơn hàng</th>
                                                <th scope='col' class='fs-3'>Xem biểu đồ</th>
                                                <th scope='col' class='fs-3'>Chi tiết đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody class=''>";
        foreach ($result as $item) {
            $MaDH = $item['MaDH'];
            $id_donhang = $item['id_donhang'];
            $ngaytao = $item['Ngaydathang'];
            $ngaygiao = $item['NgayGiaoHang'];
            $Tonggiatien = $item['Tonggiatien'];
            $formatTongTien = number_format((int)$Tonggiatien, 0, ',', ',');
            $Trangthai = $item['Trangthaidonhang'];
            $colorStatus = '';
            $cancelStatus = '';
            switch ($Trangthai) {
                case "Đang xử lí":
                    $colorStatus = '';
                    $cancelStatus = 'active';
                    break;
                case "Đã xuất kho":
                    $colorStatus = 'pending';
                    $cancelStatus = 'notActive';
                    break;
                case "Đang giao":
                    $colorStatus = 'pending';
                    $cancelStatus = 'notActive';
                    break;
                case "Đã giao":
                    $colorStatus = 'fullfill';
                    $cancelStatus = 'notActive';
                    break;
                case "Đã hủy":
                    $colorStatus = 'reject';
                    $cancelStatus = 'notActive';
                    break;
            }
            $output .= "
            <tr>
            <td class='fs-3'>$stt</td>
            <td class='fs-3' id='Ma-{$id_donhang}'>$MaDH </td>
            <td class='fs-3'>$ngaytao</td>
            <td class='fs-3' id='Ngaygiao-{$id_donhang}'>$ngaygiao</td>
            <td class='fs-3'>$formatTongTien</td>
            <td class='fs-3 text-center {$colorStatus}' id='Trangthai-{$id_donhang}'>$Trangthai</td>
            <td class='text-center'>
                <button type='button' class='btn btn-danger btn-sm px-3 cancel {$cancelStatus}' oid={$id_donhang}>
                    <i class='fas fa-times'></i>
                </button>
            </td>
            <td class='d-flex justify-content-center'>
                <div class='form-check'>
                    <input class='form-check-input order_radio' oid='{$id_donhang}' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                </div>
            </td>
            <td class='text-center'>
                <button type='button' oid='{$id_donhang}'class='btn chitietdonhang fs-4' data-bs-toggle='modal' data-bs-target='#exampleModal123'>
                    Chi tiết
                </button>
            </td>
        </tr>";
            $stt++;
        }



        $output .= " </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
        echo $output;
    } else {
        echo "  <div class='container-fluid  mt-100 cart-emtpy'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>Đơn hàng</h5>
                    </div>
                    <div class='card-body cart'>
                        <div class='col-sm-12 empty-cart-cls text-center'>
                            <img src='https://cdn.dribbble.com/users/1373705/screenshots/5854319/media/af9c4867c1ff6a62f580c27728f371b5.png?compress=1&resize=400x300' width='130' height='130' class='img-fluid mb-4 mr-3'>
                            <h3><strong>Lịch sử đơn hàng của bạn đang trống</strong></h3>
                            <h4>Thêm một vài sản phẩm để làm tôi vui :)</h4>
                            <a href='./product.php' class='btn btn-primary cart-btn-transform m-3' data-abc='true'>Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  ";
    }
}


if (isset($_POST['loadOrderDetail'])) {
    $oid = $_POST['order_id'];
    $username =  $_SESSION['auth_user']['username'];
    $OrderDetail = new CartView();
    $output = "";
    $tonggia = 0;
    $result = $OrderDetail->getOrderDetailByIdOrderView($oid);
    if ($result) {
        $output .= "
        <div class='card-header px-4 py-5'>
        <h5 class='text-muted mb-0 fs-2'>Cảm ơn đơn hàng của bạn, <span style='color: #a8729a;'>{$username}</span>!</h5>
    </div>
        <div class='card-body p-4'>
        <div class='d-flex justify-content-between align-items-center mb-4'>
            <p class='lead fw-normal mb-0 fs-2' style='color: #a8729a;'>Receipt</p>
            <!-- <p class='small text-muted mb-0'>Receipt Voucher : 1KAU9-84UIL</p> -->
        </div>
        <div class='card shadow-0 border mb-4'>
        <div class='card-body'>
        ";
        foreach ($result as $item) {
            $diachi = $item['Diachigiaohang'];
            $hinhanh = $item['Anhdt'];
            $tendt = $item['Tendt'];
            $soluong = $item['soluong'];
            $gia = $item['gia'];
            $giasaukm = $item['Giasaukm'];
            $tongctgia = (int)$soluong * (int)$giasaukm;
            $tonggia += $tongctgia;
            $formatgia = number_format($gia, 0, ',', ',');
            $formatgiasaukm = number_format($giasaukm, 0, ',', ',');
            $formatTonggia = number_format($tongctgia, 0, ',', ',');
            $ngaydathang = $item['Ngaydathang'];
            $output .= "
                <div class='row'>
                    <div class='col-md-2'>
                        <img src='./assets/img/{$hinhanh}' class='img-fluid' alt='Phone'>
                    </div>
                    <div class='col-md-2 text-center d-flex justify-content-center align-items-center'>
                        <p class='text-muted mb-0 fs-2 fw-bold'>{$tendt}</p>
                    </div>
                    <div class='col-md-2 text-center d-flex justify-content-center align-items-center'>
                        <p class='text-muted mb-0 fs-3 small'>Qty: <span class='fw-bold'>{$soluong}</span></p>
                    </div>
                    <div class='col-md-2 text-center d-flex justify-content-center align-items-center'>
                        <p class='text-muted mb-0 fs-3 small text-decoration-line-through'>{$formatgia}</p>
                    </div>
                    <div class='col-md-2 text-center d-flex justify-content-center align-items-center'>
                        <p class='text-muted mb-0 fs-3 small'>{$formatgiasaukm}</p>
                    </div>
                    <div class='col-md-2 text-center d-flex justify-content-center align-items-center'>
                        <p class='text-muted mb-0 fs-3 small fw-bold'>{$formatTonggia}</p>
                    </div>
                </div>
                <hr class='mb-4' style='background-color: #e0e0e0; opacity: 1;'>
            </div>";
        }
        $formatTonggiaFinal = number_format($tonggia, 0, ',', ',');
        $output .= "  
        </div>
        <div class='d-flex justify-content-between pt-2'>
            <p class='fw-bold mb-0 fs-2'>Chi tiết đơn hàng</p>
            <p class='fw-bold mb-0 fs-2'>Địa chỉ giao hàng</p>
        </div>

        <div class='d-flex justify-content-between'>
            <p class='text-muted mb-0 fs-3 text-black'>Ngày tạo đơn hàng :{$ngaydathang} </p>
            <p class='text-muted mb-0 fs-3 text-black fw-bold'> {$diachi} </p>
        </div>
    </div>
    <div class='card-footer border-0 px-4 py-5' style='background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;'>
        <h5 class='d-flex align-items-center justify-content-end text-white text-uppercase mb-0'>Total
            paid: <span class='h2 mb-0 ms-2'> $formatTonggiaFinal</span></h5>
    </div>
</div>    ";
        echo $output;
    } else {
        echo "Not found order detail";
    }
}




if (isset($_POST['loadStatusOrder'])) {
    $Madh = $_POST['Madh'];
    $Ngaygiao = $_POST['Ngaygiao'];
    $Trangthai = $_POST['Trangthai'];
    $active1 = '';
    $active2 = '';
    $active3 = '';
    $active4 = '';
    $output = "";
    switch ($Trangthai) {
        case "Đang xử lí":
            $active1 = 'active';
            break;
        case "Đã xuất kho":
            $active1 = 'active';
            $active2 = 'active';
            break;
        case "Đang giao":
            $active1 = 'active';
            $active2 = 'active';
            $active3 = 'active';
            break;
        case "Đã giao":
            $active1 = 'active';
            $active2 = 'active';
            $active3 = 'active';
            $active4 = 'active';
            break;
    };

    $output .= "
   <div class='card card-stepper text-black' style='border-radius: 16px;'>

   <div class='card-body p-5 card-body-border'>

       <div class='d-flex justify-content-between align-items-center mb-5'>
           <div>
               <h5 class='mb-0 fs-3'>Mã Đơn Hàng <span class='text-primary font-weight-bold'>#{$Madh}</span></h5>
           </div>
           <div class='text-end fs-3 fw-bold'>
               <p class='mb-0'>Ngày dự tính giao <span>{$Ngaygiao}</span></p>
           </div>
       </div>

       <ul id='progressbar-2' class='d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2 progressbar'>
           <li class='step0 $active1 text-center' id='step1'></li>
           <li class='step0 $active2 text-center' id='step2'></li>
           <li class='step0 $active3 text-center' id='step3'></li>
           <li class='step0 $active4 text-muted text-end' id='step4'></li>
       </ul>

       <div class='d-flex justify-content-between'>
           <div class='d-lg-flex align-items-center fs-4'>
               <i class='fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0'></i>
               <div>
                   <p class='fw-bold mb-1'>Đơn hàng</p>
                   <p class='fw-bold mb-0'>Xử lí</p>
               </div>
           </div>
           <div class='d-lg-flex align-items-center fs-4'>
               <i class='fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0'></i>
               <div>
                   <p class='fw-bold mb-1'>Đơn hàng</p>
                   <p class='fw-bold mb-0'>Đã xuất kho</p>
               </div>
           </div>
           <div class='d-lg-flex align-items-center fs-4'>
               <i class='fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0'></i>
               <div>
                   <p class='fw-bold mb-1'>Đơn hàng</p>
                   <p class='fw-bold mb-0'>Đang giao </p>
               </div>
           </div>
           <div class='d-lg-flex align-items-center fs-4'>
               <i class='fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0'></i>
               <div>
                   <p class='fw-bold mb-1'>Đơn hàng</p>
                   <p class='fw-bold mb-0'>Đã giao</p>
               </div>
           </div>
       </div>

   </div>
</div>";
    echo $output;
}


if (isset($_POST['updateCancelStatus'])) {
    $id_order = $_POST['id_order'];
    $orderCtrl = new CartCtrl();
    $orderView = new CartView();
    if ($orderCtrl->updateCancelStatusOrderCtrl($id_order)) {
        $result = $orderView->getOrderDetailByIdOrderView($id_order);
        if ($result) {
            foreach ($result as $item) {
                $id_product = $item['id_dienthoai'];
                $productView = new ProductView();
                $productCtrl = new ProductCtrl();
                $resultProductView = $productView->getProductByIdView($id_product);
                $quantityCurrent = $resultProductView['Soluong'];
                $quantity = $item['soluong'];
                $quantityAfter = (int)$quantityCurrent + (int)$quantity;
                if ($productCtrl->updateProductQuantityCtrl($id_product, $quantityAfter)) {
                    echo "Update thanh cong!";
                } else {
                    echo "Update so luong san pham that bai";
                }
            }
        } else {
            echo "Khong co danh sach chi tiet don hang";
        }
    } else {
        echo "Huy don hang that bai";
    }
}
