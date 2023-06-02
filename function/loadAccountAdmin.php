<?php
include '../includes/autoload.php';
if (isset($_POST['loadAccount'])) {
    $per_page_limit = 6;

    $AccountView = new AccountView();
    if (isset($_POST['getdataAccount'])) {
        $account = $AccountView->getAllAccount();
    }
    if (isset($_POST['search_account'])) {
        $input = $_POST['input'];
            $account = $AccountView->getInputAccount($input);
        
    }
    if (isset($_POST['page_no'])) {
        $page_no = $_POST['page_no'];
    } else {
        $page_no = 1;
    }
    $offset = ($page_no - 1) * $per_page_limit;



    $output = '';

    if (isset($account) && is_array($account)) {
        $resultOffical = litmitPerPages($account, $offset, $per_page_limit);
        $output = "";
        if ($resultOffical) {
            foreach ($resultOffical as $data) {
                $id_taikhoan = $data['id_taikhoan'];
                $tendangnhap = $data['tendangnhap'];
                $matkhau = $data['matkhau'];
                $loaiTK = $data['loaitaikhoan'];
                $ngaytao = $data['ngaytao'];
                $trangthai = $data['trangthai'];
                $output .= "
            <tr class='fs-4'>
            <td scope='col'>$id_taikhoan </th>
            <td scope='col'>$tendangnhap</th>
            <td scope='col'>$matkhau</th>
            <td scope='col'>$loaiTK</th>
            <td scope='col'>$ngaytao</th>
            <td scope='col'>$trangthai</th>
            <td class=' fs-5'>
            <div class='d-flex justify-content-around align-items-center control-wrap'>
                <i class='fa-solid fa-pen-to-square GetEdit-account' pid-account='{$id_taikhoan}' tendangnhap='$tendangnhap' loaitaikhoan='$loaiTK' data-bs-toggle='modal' data-bs-target='#exampleModalEdit'></i>
                <i class='fa-solid fa-trash delete-account' pid-account='{$id_taikhoan}'></i>
            </div>
            </td>
            </tr>
            $offset++;
            ";
            }
            echo $output;
        }
    } else {
        echo "No data found";
    }
}

if (isset($_POST['loadFormAddAccount'])) {
    $output = '';
    $output .= "<div class='modal-header'>
    <h5 class='modal-title' id='exampleModalLabel'>Thêm tài khoản</h5>
    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
</div>
<div class='modal-body'>
    <div class='row mt-3'>
        <div class='col form-input-account'>
            <h6>Tên đăng nhập</h6>
            <input class='input-nameaccount' type='text' placeholder='VD: lehongthai..'>
        </div>
        <div class='col form-input-account'>
            <h6>Mật khẩu</h6>
            <input class='input-matkhau' type='text' placeholder='VD:.....'>
        </div>
    </div>
    <div class='row mt-3'>
        <div class='col form-input-account'>
            <h6>Ngày sinh</h6>
            <input class = 'input-ngaysinh' type='date' >
        </div>
        <div class='col form-input-account'>
            <h6>Địa chỉ </h6>
            <input class = 'input-adress' type='text' >
        </div>
    </div>
    <div class='row mt-3'>
        <div class='col form-input-account'>
            <h6>Giới tính</h6>
            <select id='gioitinh'>
            <option>Nam</option>
            <option>Nữ</option>
            </select>
        </div>
        <div class='col form-input-account'>
            <h6>Số điện thoại</h6>
            <input class='input-phone' type='text' >
        </div>
    </div>
    <div class='modal-footer'>
    <button type='button' class='btn btn-secondary close-account' data-bs-dismiss='modal'>Close</button>
    <button type='button' class='btn btn-primary submit-account'>Save</button>
</div>
        ";  
        echo $output;
    
}
if (isset($_POST['insert_account'])) {
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];

    $loaiTK = 2;
    $ngaytao = date('Y-m-d');
    $trangthai = 'T';
    $datesinh = $_POST['date'];
    $adress = $_POST['adress'];
    $gioitinh = $_POST['gioitinh'];
    $phone = $_POST['phone'];
    $id_quyen = 1;

    $accountCtl = new AccountCtrl();
    $staffCtl = new StaffCtrl();
    $staffModel = new StaffModel();
    $accountModel = new AccountModel();

    $accountView = new AccountView();
    $exitAccount = $accountView->getExitAccount($tendangnhap);
    if ($exitAccount) {
        echo 'exit';
    } else {
        $accountModel->setTendangnhap($tendangnhap);
        $accountModel->setMatKhau($matkhau);
        $accountModel->setLoaiTaiKhoan($loaiTK);
        $accountModel->setTrangthai($trangthai);
        $accountModel->setNgayTao($ngaytao);
        $staffModel->setTennv($tendangnhap);
        $staffModel->setNgaysinh($datesinh);
        $staffModel->setDiachi($adress);
        $staffModel->setGioiTinh($gioitinh);
        $staffModel->setSDT($phone);
        $staffModel->setID_Quyen($id_quyen);

        $insertAccount = $accountCtl->insertAccountCtrl($accountModel);
        $insertSaff = $staffCtl->insertStaffCtrl($staffModel);
        if ($insertAccount && $insertSaff) {
            echo 'add';
        }
    }
}

if (isset($_POST['deleteAccount'])) {
    $id_taikhoan = $_POST['id_taikhoan'];
    $trangthai = 'F';
    $accountCtl = new AccountCtrl();
    $accountModel = new AccountModel();
    $accountModel->setID_TaiKhoan($id_taikhoan);
    $deleteaccount = $accountCtl->deleteAccountCtrl($accountModel);
    if ($deleteaccount) {
        echo 'xoa';
    }
}
if (isset($_POST['editAccount'])) {

    $id = $_POST['pid'];
    $loaiTK = $_POST['loaiTk'];
    $tendangnhap = $_POST['tendangnhap'];
    $account = new AccountView();
    $Staff = new StaffView();
    $quyen = new QuyenView();
    $custommer = new CustommerView();

    $reasultCustommer = $custommer->getIFKhachhang($tendangnhap);
    $resultAccount = $account->getIdAccount($id);
    $resultStaff = $Staff->getIFtennhanvien($tendangnhap);
    $resultQuyen = $quyen->getAllQuyen();
    $output = "";
    $tendangnhap = $resultAccount['tendangnhap'];
    $matkhau = $resultAccount['matkhau'];
    $loaiTK = $resultAccount['loaitaikhoan'];
    $trangthai = $resultAccount['trangthai'];
    $ngaytao = $resultAccount['ngaytao'];
    // nhân viên
    if($loaiTK == 2){
    $ngaysinh = $resultStaff['ngaysinh'];
    $diachi = $resultStaff['diachi'];
    $gioitinh = $resultStaff['gioitinh'];
    $sdt = $resultStaff['sdt'];
    $id_quyen = $resultStaff['ID_quyen'];
    $tenquyen = $resultStaff['tenquyen'];
    
        $output .= "<div class='modal-header'>
        
        <h5 class='modal-title' id='exampleModalLabel'>Edit tài khoản</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <div class='row mt-3'>
            <div class='col form-input-account'>
                <h6>Tên đăng nhập</h6>
                <input class='input-nameaccount bg-secondary text-white ' type='text' value = '$tendangnhap' placeholder='VD: lehongthai..' disabled>
            </div>
            <div class='col form-input-account'>
                <h6>Mật khẩu</h6>
                <input class='input-matkhau' type='text' value = '$matkhau' placeholder='VD:.....'>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col form-input-account'>
                <h6>Ngày sinh</h6>
                <input class = 'input-ngaysinh' value = '$ngaysinh' type='date' >
            </div>
            <div class='col form-input-account'>
                <h6>Địa chỉ </h6>
                <input class = 'input-adress' value = '{$diachi}' type='text' >
            </div>
        </div>
        <div class='row mt-3'>
        <div class='col form-input-account'>
            <h6>Ngày tạo</h6>
            <input class = 'bg-secondary text-white input-ngaytao' value = '$ngaytao' type='date' disabled>
        </div>
            <div class='col form-input-account'>
                <h6>Số điện thoại</h6>
                <input class='input-phone' value = '$sdt' type='text' >
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col form-input-account'>
                <h6>Tên quyền</h6>
                <select id='quyentk'>";
        foreach ($resultQuyen as $data) {
            $ID_quyen = $data['id_quyen'];
            $tenquyen = $data['tenquyen'];
            if ($ID_quyen == $id_quyen) {
                $className = 'selected';
            } else {
                $className = '';
            }
            $output .= "
                <option $className value='$ID_quyen'>$tenquyen</option>
                
                ";
        }
        $output .= "
            
                </select>
            </div>
            <div class='col form-input-account'>
                <h6>Giới tính</h6>
                <select id='gioitinh'>";
        if ($gioitinh == 'Nam') {
            $selectedNam = 'selected';
            $selectedNu = '';
        } else {
            $selectedNam = '';
            $selectedNu = 'selected';
        }
        $output .= "
                    <option value='Nam' $selectedNam>Nam</option>
                    <option value='Nữ' $selectedNu>Nữ</option>
                    
                </select>
            </div>
        </div>
    
        <div class='row mt-3'>
            <div class='col active-account' >
                <div class='form-check form-switch d-flex justify-content-start align-items-center'>";
        $isChecked = ($trangthai == 'T') ? 'checked' : '';
        $output .= "
                <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' $isChecked name='active-account'>
                <label class='form-check-label fs-5 text-success fw-bold ms-3' for='flexSwitchCheckChecked'>Trạng thái</label>
                </div>
            </div>
            </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary close-account' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary edit-account' id='$id'>Save</button>
            </div>
        </div>

            ";
        echo $output;
    }else{

        //khách hàng
        $tenTK = $reasultCustommer['tentaikhoan'];
        $tenKh = $reasultCustommer['tenkhachhang'];
        $gioitinhKH = $reasultCustommer['gioitinh'];
        $diachiKH = $reasultCustommer['diachi'];
        $sdtKH = $reasultCustommer['sdt'];
        $email = $reasultCustommer['email'];
        $output .= "<div class='modal-header'>
        
        <h5 class='modal-title' id='exampleModalLabel'>Thông tin tài khoản nhân viên</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <div class='row mt-3'>
            <div class='col form-input-account'>
                <h6>Tên đăng nhập</h6>
                <input class='bg-secondary text-white input-nameaccount bg-secondary text-white ' type='text' value = '$tendangnhap' placeholder='VD: lehongthai..' disabled>
            </div>
            <div class='col form-input-account'>
                <h6>Mật khẩu</h6>
                <input class='bg-secondary text-white input-matkhau' type='text' value = '$matkhau' placeholder='VD:.....'>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col form-input-account'>
                <h6>Tên khách hàng</h6>
                <input class = 'bg-secondary text-white input-ngaysinh' value = '$tenKh' type='text' disabled>
            </div>
            <div class='col form-input-account'>
                <h6>Địa chỉ </h6>
                <input class = 'bg-secondary text-white input-adressKH' value = '{$diachiKH}' type='text' disabled>
            </div>
        </div>
        <div class='row mt-3'>
        <div class='col form-input-account'>
            <h6>Ngày tạo</h6>
            <input class = 'bg-secondary text-white input-ngaytao' value = '$ngaytao' type='date' disabled>
        </div>
            <div class='col form-input-account'>
                <h6>Số điện thoại</h6>
                <input class='bg-secondary text-white input-phoneKH' value = '$sdtKH' type='text' disabled>
            </div>
        </div>
        <div class='row mt-3'>
          
            <div class='col form-input-account'>
                <h6>Giới tính</h6>
                <select class='bg-secondary text-white' id='gioitinhKH' disabled>";
                if ($gioitinhKH == 'Nam') {
                    $selectedNam = 'selected';
                    $selectedNu = '';
                } else {
                    $selectedNam = '';
                    $selectedNu = 'selected';
                }
                $output .= "
                            <option value='Nam' $selectedNam>Nam</option>
                            <option value='Nữ' $selectedNu>Nữ</option>
                            
                </select>
            </div>
        </div>
    
        <div class='row mt-3'>
            <div class='col active-account' >
                <div class='form-check form-switch d-flex justify-content-start align-items-center'>";
                $isChecked = ($trangthai == 'T') ? 'checked' : '';
                $output .= "
                <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' $isChecked name='activeKH' disabled>
                <label class='form-check-label fs-5 text-success fw-bold ms-3' for='flexSwitchCheckChecked'>Trạng thái</label>
                </div>
            </div>
            </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary close-account' data-bs-dismiss='modal'>Close</button>
            </div>
        </div>

            ";
        echo $output;
    }
}
if (isset($_POST['editAccountAll'])) {
    $id = $_POST['id_taikhoan'];
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $ngaysinh = $_POST['ngaysinh'];
    $ngaytao =  $_POST['ngaytao'];
    $trangthai =  $_POST['active'];
    $adress = $_POST['adress'];
    $gioitinh = $_POST['gioitinh'];
    $phone = $_POST['phone'];
    $id_quyen = $_POST['id_quyen'];
    $loaiTK = '2';

    $accountCtl = new AccountCtrl();
    $staffCtl = new StaffCtrl();
    $staffModel = new StaffModel();
    $accountModel = new AccountModel();

    $accountModel->setID_TaiKhoan($id);
    $accountModel->setTendangnhap($tendangnhap);
    $accountModel->setMatKhau($matkhau);
    $accountModel->setLoaiTaiKhoan($loaiTK);
    $accountModel->setTrangthai($trangthai);
    $accountModel->setNgayTao($ngaytao);
    $staffModel->setTennv($tendangnhap);
    $staffModel->setNgaysinh($ngaysinh);
    $staffModel->setDiachi($adress);
    $staffModel->setGioiTinh($gioitinh);
    $staffModel->setSDT($phone);
    $staffModel->setID_Quyen($id_quyen);

    $EditAccount = $accountCtl->updateAccountCtrl($accountModel);
    $EditSaff = $staffCtl->updateStaffCtrl($staffModel);
    if ($EditAccount ||  $EditSaff) {
        echo 'Update tài khoản thành công';
    } else {
        echo 'Update tài khoản thất bại';
    }
}



if (isset($_POST['loadPaginationAccount'])) {
    if (isset($_POST['page_no'])) {
        $page_no = $_POST['page_no'];
    } else {
        $page_no = 1;
    }
    $accountView = new AccountView();
    $per_page_limit = 6;
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        $result = $accountView->getInputAccount($input);

    }else{
        $result = $accountView->getAllAccount();
    }
    $output = "";
    $output .= " <ul class='pagination'>
    ";
    if(is_array($result) || $result instanceof Countable){
        $page_number = ceil(count($result) / $per_page_limit);
        for ($i = 1; $i <= $page_number; $i++) {
            if ($page_no == $i) {
                $className = 'active';
            } else {
                $className = '';
            }
            $output .= "
            <li class='page-item $className account-page-no'><a class='page-link' id='$i' href='#'>{$i}</a></li>
            ";
        }
}
else{
    echo '';
}
    $output .= "
    
    </ul>";
    echo $output;
}


function litmitPerPages($arrayOld, $offset, $limit)
{
    if (count($arrayOld) == 0) {
        return 0;
    } else {
        return array_slice($arrayOld, $offset, $limit);
    }
}
