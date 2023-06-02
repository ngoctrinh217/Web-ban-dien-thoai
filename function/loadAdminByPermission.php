<?php
session_start();
include '../includes/autoload.php';

if (isset($_POST['loadMainByPermission'])) {
    $output = "";
    $output .= "<li class='dashboard'><a href='#' class='active'><i class='bx bxs-dashboard icon'></i> Dashboard </a></li>
            <li class='divider'>MAIN</li>";
    $id_quyen = $_SESSION['auth_user']['id_quyen'];
    $featuresView = new FeaturesView();
    $fidProduct = 1;
    $fidOrder = 2;
    $fidAccount = 3;
    $fidPhieunhap = 4;
    $fidPhanquyen = 7;
    $fidStatistic = 8;
    $fidManager = 9;
    $result = $featuresView->getFeaturesByIdPerView($id_quyen);
    if ($result) {
        foreach ($result as $item) {
            if ($fidManager == $item['id_chucnang']) {
                $output .= "
                    <li class='manager' fid='9'>
                        <a href='#'><i class='bx bxs-inbox icon'></i> Quản lý <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class='side-dropdown'>
                            <li class='baohanh'><a href='#'>Quản lý bảo hành</a></li>
                            <li class='khuyenmai'><a href='#'>Quản lý khuyến mãi</a></li>
                            <li class='nhanvien'><a href='#'>Danh sách nhân viên</a></li>
                            <li class='khachhang'><a href='#'>Danh sách khachhang</a></li>
                            <li class='#'><a href='#'>Quản lý thương hiệu</a></li>
                            <li class='provider'><a href='#'>Quản lý nhà cung cấp</a></li>
                        </ul>
                    </li>";
            }
        }
        foreach ($result as $item) {
            if ($fidProduct == $item['id_chucnang']) {
                $output .= "
                    <li class='productAdmin' fid='1'><a href='#'><i class='bx bx-package icon active'></i> Sản phẩm </a></li>";
            }
        }
        foreach ($result as $item) {
            if ($fidOrder == $item['id_chucnang']) {
                $output .= "
                    <li class='order' fid='2'><a href='#'><i class='bx bx-clipboard icon'></i> Đơn hàng </a></li>";
            }
        }
        foreach ($result as $item) {
            if ($fidPhieunhap == $item['id_chucnang']) {
                $output .= "
                    <li class='coupon' fid='4'><a href='#'><i class='bx bx-money-withdraw icon'></i> Phiếu nhập </a></li>";
            }
        }
        $output .= "   
                    <li class='divider'>Table and forms</li>
                    ";
        foreach ($result as $item) {
            if ($fidStatistic == $item['id_chucnang']) {
                $output .= "
                    <li class='statistic' fid='8'>
                    <a href='#'><i class='bx bxs-chart icon'></i> Thống kê<i class='bx bx-chevron-right icon-right'></i></a>
                    <ul class='side-dropdown'>
                        <li><a href='#'>Thống kê hoá đơn</a></li>
                        <li><a href='#'>Thống kê tổng tiền</a></li>
                        <li><a href='#'>Thống kê sản phẩm</a></li>
                        <li><a href='#'>Thống kê khách hàng</a></li>
                    </ul>
                </li>";
            }
        }
        foreach ($result as $item) {
            if ($fidAccount == $item['id_chucnang']) {
                $output .= "
                    <li class='account' fid='3'><a href='#'><i class='bx bx-clipboard icon'></i>Quản lý tài khoản </a></li>";
            }
        }
        foreach ($result as $item) {
            if ($fidPhanquyen == $item['id_chucnang']) {
                $output .= "         
                    <li class='decentralization' fid='7'>
                        <a href='#'><i class='bx bxs-chart icon'></i> Phân quyền</a>
                    </li>
        ";
            }
        }
    } else {
        echo "Not Found. ";
    }

    echo $output;
}
