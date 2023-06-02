<?php
session_start();
include '../DB/dbconnect.php';
include '../includes/autoload.php';

if (isset($_POST['register'])) {
    $accountCtrl = new AccountCtrl();
    $account = new AccountModel();
    $username = $_POST['register']['username'];
    $address = $_POST['register']['address'];
    $phone = $_POST['register']['phone'];
    $email = $_POST['register']['email'];
    $pass = $_POST['register']['password'];
    $ngaytao = date('Y-m-d');
    $trangthai = 'T';
    $loaitaikhoan = 1;

    // Kiem tra so dien thoai co giong nhau khong ?
    $check_phone_sql = "SELECT sdt from khachhang where khachhang.sdt='$phone'";
    // Kiem tra email co ton tai không ?
    $check_email_sql = "SELECT email from khachhang where khachhang.email= '$email'";

    // Kiem tra xem ten dang nhap co ton tai khong?
    $check_username_sql = "SELECT tentaikhoan from khachhang where khachhang.tentaikhoan='$username'";
    if (mysqli_num_rows(mysqli_query($conn, $check_username_sql))) {
        echo "Tên đăng nhập đã tồn tại";
    } else {
        if (mysqli_num_rows(mysqli_query($conn, $check_phone_sql))) {
            echo "Số điện thoại đã tồn tại";
        } else {
            if (mysqli_num_rows(mysqli_query($conn, $check_email_sql))) {
                echo "Email đã tồn tại";
            } else {
                $sql = "INSERT INTO khachhang(tentaikhoan,diachi,sdt,email) VALUES('$username','$address' ,'$phone' ,'$email')";
                $account->setTendangnhap($username);
                $account->setMatKhau($pass);
                $account->setLoaiTaiKhoan($loaitaikhoan);
                $account->setTrangthai($trangthai);
                $account->setNgayTao($ngaytao);
                if (mysqli_query($conn, $sql) && $accountCtrl->insertAccountCtrl($account)) {
                    echo "Đăng ký thành công";
                    $conn->close();
                } else {
                    echo "faild";
                }
            }
        }
    }

    // // Them tai khoan khach hang
}
if (isset($_POST['login'])) {
    $username = $_POST['login']['username'];
    $pass = $_POST['login']['password'];

    // Kiem tra tai khoan dang nhap hop le hay khong ?
    $login_query = "SELECT taikhoan.tendangnhap,taikhoan.loaitaikhoan
    from taikhoan
    where taikhoan.matkhau = '$pass' and taikhoan.tendangnhap = '$username'";
    if (mysqli_num_rows(mysqli_query($conn, $login_query)) > 0) {
        $data = mysqli_fetch_array(mysqli_query($conn, $login_query));
        $loaitaikhoan = $data['loaitaikhoan'];
        $tentaikhoan = $data['tendangnhap'];
        if ((int)$loaitaikhoan == 1) {
            // Loai tai khoan = 1 la khach hang
            $queryData = "SELECT khachhang.id_khachhang ,taikhoan.tendangnhap,khachhang.diachi
            from khachhang,taikhoan
            where  khachhang.tentaikhoan ='$username' and taikhoan.matkhau='$pass'";
            if (mysqli_num_rows(mysqli_query($conn, $queryData)) > 0) {
                $userdata = mysqli_fetch_array(mysqli_query($conn, $queryData));
                $id_khachhang = $userdata['id_khachhang'];
                $user_addr = $userdata['diachi'];
                $_SESSION['auth'] = true;
                $_SESSION['auth_user'] = [
                    'username' => $tentaikhoan,
                    'id_khachhang' => $id_khachhang,
                    'diachi' => $user_addr,
                ];
                echo "Day la khach hang";
            }
        } else {
            // Loai tai khoan !=1 la nhan vien
            $queryData = "SELECT nhanvien.id_nhanvien,taikhoan.tendangnhap,ID_quyen
            from nhanvien,taikhoan
            where taikhoan.tendangnhap ='$username' and taikhoan.matkhau='$pass' and taikhoan.tendangnhap = nhanvien.tennhanvien";
            if (mysqli_num_rows(mysqli_query($conn, $queryData)) > 0) {
                $userdata = mysqli_fetch_array(mysqli_query($conn, $queryData));
                $id_nhanvien = $userdata['id_nhanvien'];
                $id_quyen = $userdata['ID_quyen'];
                $featuresView = new FeaturesView();
                $resultFt = $featuresView->getFeaturesByIdPerView($id_quyen);
                $detailFeatures = [];
                if ($resultFt) {
                    foreach ($resultFt as $itemFt) {
                        $detailFeatures[] = $itemFt['id_chucnang'];
                    }
                }
                $_SESSION['auth'] = true;
                $_SESSION['auth_user'] = [
                    'username' => $tentaikhoan,
                    'id_nhanvien' => $id_nhanvien,
                    'id_quyen' => $id_quyen,
                    'detailFeatures' => $detailFeatures,
                ];
                echo "Day la nhan vien";
            }
        }
    } else {
        echo "Sai tài khoản hoặc mật khẩu";
    }
}
if (isset($_POST['logout'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    echo "Đăng xuất thành công";
}
