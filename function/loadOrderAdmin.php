<?php
session_start();
include '../includes/autoload.php';

if (isset($_POST['loadOrderAdmin'])) {
    $orderView = new OrderView();
    $result = $orderView->getAllsOrderView();
    $output = "";
    $stt = 1;
    if ($result) {
        foreach ($result as $item) {
            $id_donhang = $item['id_donhang'];
            $Madh = $item['Madh'];
            $tongtien = $item['Tonggiatien'];
            $tongtien = number_format((int)$tongtien, 0, ',', ',');
            $tenkh = $item['tentaikhoan'];
            $tennv = $item['tennhanvien'];
            $ngaydat = $item['Ngaydathang'];
            $ngaygiao = $item['NgayGiaoHang'];
            $ngaycapnhat = $item['NgayCapNhat'];
            $diachi = $item['Diachigiaohang'];
            $trangthai = $item['Trangthaidonhang'];
            switch ($trangthai) {
                case 'Đã hủy':
                    $className = 'text-danger';
                    break;
                case 'Đã xuất kho':
                    $className = 'text-warning';
                    break;
                case 'Đang giao':
                    $className = 'text-warning';
                    break;
                case 'Đã giao':
                    $className = 'text-success';
                    break;
                default:
                    $className = '';
                    break;
            }
            $output .= "<tr>
            <td class=' fs-5'>{$stt}</td>
            <td class=' fs-5'>{$Madh}</td>
            <td class=' fs-5'>{$tenkh}</td>
            <td class=' fs-5'>{$tennv}</td>
            <td class=' fs-5'>{$ngaydat}</td>
            <td class=' fs-5 text-success'>{$ngaygiao}</td>
            <td class=' fs-5 text-warning'>{$ngaycapnhat}</td>
            <td class=' fs-5' style='max-width: 310px;'>{$diachi}</td>
            <td class=' fs-5'>{$tongtien}</td>
            <td class=' fs-5 {$className} fw-bold'>{$trangthai}</td>
            <td class=' fs-5 hideme'>
                <div class='d-flex justify-content-around align-items-center control-wrap'>
                    <i class='fa-solid fa-pen-to-square edit' oid='{$id_donhang}' data-bs-toggle='modal' data-bs-target='#exampleModalOrder'></i>
                </div>
            </td>
        </tr>";
            $stt++;
        }
        echo $output;
    } else echo "Not found order";
}
if (isset($_POST['loadFormOrderDetails'])) {
    $order_id = $_POST['id_order'];
    $OrderView = new CartView();
    $result = $OrderView->getOrderDetailByIdOrderView($order_id);
    $output = "";
    if ($result) {
        $stt = 1;
        $ngayupdate = date("Y-m-d");
        $output .= "<section class='intro order_details'>
    <div class='gradient-custom-1 h-100'>
        <div class='mask d-flex align-items-center h-100'>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-12'>
                        <div class='table-responsive bg-white'>
                            <table class='table mb-0'>
                                <thead>
                                    <tr>
                                        <th scope='col' class='fs-3'>STT</th>
                                        <th scope='col' class='fs-3'>Tên sản phẩm</th>
                                        <th scope='col' class='fs-3'>Số lượng</th>
                                        <th scope='col' class='fs-3'>Giá</th>
                                        <th scope='col' class='fs-3'>Tổng giá</th>
                                    </tr>
                                </thead>
                                <tbody>";

        foreach ($result as $item) {
            $ngaygiaohang = $item['NgayGiaoHang'];
            $trangthaidonhang = $item['Trangthaidonhang'];
            $tendt = $item['Tendt'];
            $soluong = $item['soluong'];
            $giasaukm = $item['Giasaukm'];
            $diachi = $item['Diachigiaohang'];
            $formatgiasaukm = number_format($giasaukm, 0, ',', ',');
            $Tongctgia = (int)$soluong * (int)$giasaukm;
            $formatTonggia = number_format($Tongctgia, 0, ',', ',');
            $output .= " <tr>
                            <td class='fs-4'>{$stt}</td>
                            <td class='fs-4'>{$tendt}</td>
                            <td class='fs-4'>{$soluong}</td>
                            <td class='fs-4'>{$formatgiasaukm}</td>
                            <td class='fs-4'>{$formatTonggia}</td>
                         </tr>";
            $stt++;
        }
        $output .= "             </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
        switch ($trangthaidonhang) {
            case 'Đang xử lí':
                $classNameDXK = '';
                $classNameDG = '';
                $classNameSuccess = '';
                $classNameCancel = '';
                $classDate = '';
                $elementBtnSubMid = "<button type='button' class='btn btn-primary submit' oid='{$order_id}'>Save</button>";
                break;
            case 'Đã xuất kho':
                $classNameDXK = 'checked';
                $classNameDG = '';
                $classNameSuccess = '';
                $classNameCancel = '';
                $classDate = '';
                $elementBtnSubMid = "<button type='button' class='btn btn-primary submit' oid='{$order_id}'>Save</button>";
                break;
            case 'Đang giao':
                $classNameDXK = 'disabled';
                $classNameDG = 'checked';
                $classNameSuccess = '';
                $classNameCancel = '';
                $classDate = '';
                $elementBtnSubMid = "<button type='button' class='btn btn-primary submit' oid='{$order_id}'>Save</button>";
                break;
            case 'Đã giao':
                $classNameDXK = 'disabled';
                $classNameDG = 'disabled';
                $classNameSuccess = 'checked';
                $classNameCancel = 'disabled';
                $elementBtnSubMid = "";
                $classDate = 'disabled';
                break;
            case 'Đã hủy':
                $classNameDXK = 'disabled';
                $classNameDG = 'disabled';
                $classNameSuccess = 'disabled';
                $classNameCancel = 'disabled';
                $elementBtnSubMid = "";
                $classDate = 'disabled';
                break;
        }
        $output .= "
        <div class='d-flex justify-content-between aligns-items-center p-5'>
            <div class='d-flex align-items-center fs-4'>
                <label for=''>Ngày giao hàng</label>
                <input type='date' class='delivery-date' min='{$ngayupdate}' value='{$ngaygiaohang}' {$classDate}>
            </div>
            <div class='d-flex justify-content-around align-items-center fs-4'>";


        $output .= "<div class='form-check text-warning d-flex align-items-center mx-2'>
                    <input class='form-check-input' type='radio' value='Đã xuất kho' name='flexRadioDefault' id='flexRadioDefault1' $classNameDXK>
                    <label class='form-check-label' for='flexRadioDefault1'>
                        Đã xuất kho
                    </label>
                </div>
                <div class='form-check fs-4 text-warning d-flex align-items-center mx-2'>
                    <input class='form-check-input' type='radio' value='Đang giao' name='flexRadioDefault' id='flexRadioDefault2' $classNameDG>
                    <label class='form-check-label' for='flexRadioDefault2'>
                        Đang giao
                    </label>
                </div>
                <div class='form-check fs-4 text-success d-flex align-items-center mx-2'>
                    <input class='form-check-input' type='radio' value='Đã giao' name='flexRadioDefault' id='flexRadioDefault2' $classNameSuccess>
                    <label class='form-check-label' for='flexRadioDefault2'>
                        Đã giao
                    </label>
                </div>
                <div class='form-check fs-4 text-danger d-flex align-items-center'>
                    <input class='form-check-input' type='radio' value='Đã hủy' name='flexRadioDefault' id='flexRadioDefault2' $classNameCancel>
                    <label class='form-check-label' for='flexRadioDefault2'>
                        Đã hủy
                    </label>
                </div>
            </div>
        </div>
        <div class='d-flex align-items-center justify-content-start'>
            <p class='fs-4 fw-bold me-3'>Địa chỉ</p>
            <p class='address-delivery fs-4'>
                {$diachi}
            </p>
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary close' data-bs-dismiss='modal'>Close</button>
            {$elementBtnSubMid}
        </div>";

        echo $output;
    }
}


if (isset($_POST['updateOrder'])) {
    $oid = $_POST['order_id'];
    $ngaygiao = $_POST['ngaygiao'];
    $trangthai = $_POST['trangthai'];
    $ngayupdate = date('Y-m-d');
    $id_nhanvien =  $_SESSION['auth_user']['id_nhanvien'];
    echo $id_nhanvien;

    $orderCtrl = new OrderCtrl();
    $orderModel = new OrderModel();
    $orderModel->setid_donhang($oid);
    $orderModel->setid_nhanvien($id_nhanvien);
    $orderModel->setngaycapnhat($ngayupdate);
    $orderModel->setngaygiaohang($ngaygiao);
    $orderModel->settrangthai($trangthai);
    if ($orderCtrl->updateOrderCtrl($orderModel)) {
        echo "Update đơn hàng thành công";
    } else echo "Update đơn hàng thất bại";
}
