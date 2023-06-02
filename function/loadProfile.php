<?php
session_start();


include '../includes/autoload.php';


if (isset($_POST['loadProfile'])) {
    $id_cust = $_SESSION['auth_user']['id_khachhang'];
    $custView = new CustommerView();
    $output = "";
    $result = $custView->getCustommerByIdView($id_cust);
    if ($result) {
        $tentaikhoan = $result['tentaikhoan'];
        $tenkhachhang = $result['tenkhachhang'];
        $gioitinh = $result['gioitinh'];
        $diachi = $result['diachi'];
        $sdt = $result['sdt'];
        $email = $result['email'];
        $output .= "
        <div class='card mb-3 profile-user' style='border-radius: .5rem;'>
        <div class='row g-0 h-100'>
            <div class='col-md-4 gradient-custom text-center text-white d-flex flex-column justify-content-center align-items-center' style='border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;'>
                <img src='assets/img/userprofile.png' alt='Avatar' class='img-fluid my-5' style='width: 250px;' />
                <h5 class='fs-2'>{$tentaikhoan}</h5>
                <h5 class='fs-3'>{$email}</h5>
                <button class='button-36 edit-profile mt-5' role='button'>Edit</button>
            </div>
            <div class='col-md-8 my-auto'>
                <div class='card-body p-4 w-100'>
                    <h2 class='fs-1'>Thông tin cá nhân</h2>
                    <hr class='mt-0 mb-4'>
                    <div class='row pt-1'>
                        <div class='col-6 mb-3'>
                            <h6 class='fs-3'>Email</h6>
                            <input class='fs-4 input-info' id='input-email' type='text' value='{$email}' disabled>
                        </div>
                        <div class='col-6 mb-3'>
                            <h6 class='fs-3'>Phone</h6>
                            <input class='fs-4 input-info' id='input-sdt' type='text' value='{$sdt}' disabled>
                        </div>
                    </div>
                    <div class='row pt-1'>
                        <div class='col-6 mb-3'>
                            <h6 class='fs-3'>Giới tính</h6>
                            <input class='fs-4 input-info' id='input-gioitinh' type='text' value='{$gioitinh}' disabled>
                        </div>
                        <div class='col-6 mb-3'>
                            <h6 class='fs-3'>Địa chỉ</h6>
                            <input class='fs-4 input-info' type='text' id='input-diachi' value='{$diachi}' disabled>
                        </div>
                    </div>
                    <div class='row pt-1'>
                        <div class='col-6 mb-3'>
                            <h6 class='fs-3'>Họ và tên</h6>
                            <input class='fs-4 input-info' id='input-kh' type='text' value='{$tenkhachhang}' disabled>
                        </div>
                    </div>
                    <hr class='mt-0 mb-4'>
                    <div class='d-flex justify-content-between align-items-center'>
                        <div class='d-flex justify-content-start fs-3'>
                            <a href='#!'><i class='fab fa-facebook-f fa-lg me-3'></i></a>
                            <a href='#!'><i class='fab fa-twitter fa-lg me-3'></i></a>
                            <a href='#!'><i class='fab fa-instagram fa-lg'></i></a>
                        </div>
                        <button class='button-64 submit-profile' role='button'><span class='text'>Submit</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>";
        echo $output;
    }
}

if (isset($_POST['updateProfile'])) {
    $id_kh = $_SESSION['auth_user']['id_khachhang'];
    $tenkh = $_POST['tenkh'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $gioitinh = $_POST['gioitinh'];
    $email = $_POST['email'];
    $custommerCtrl = new CustommerCtrl();
    $custommerModel = new CustommerModel();
    $custommerModel->setId($id_kh);
    $custommerModel->setTenKH($tenkh);
    $custommerModel->setGioitinh($gioitinh);
    $custommerModel->setDiachi($diachi);
    $custommerModel->setSdt($sdt);
    $custommerModel->setEmail($email);
    if ($custommerCtrl->updateCustommerProfileCtrl($custommerModel)) {
        echo "Update thành công";
    } else echo "Update thất bại";
}
