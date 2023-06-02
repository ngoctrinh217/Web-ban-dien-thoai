<?php
include '../includes/autoload.php';
$BaohanhView = new BaohanhView();
$BaohanhCtrl = new BaohanhCtrl();
if (isset($_POST['loadBaohanh'])) {
    $per_page_limit = 6;
    
    
        
        if (isset($_POST['getdatabaohanh'])) {
            $Baohanh = $BaohanhView->getAllBaohanh();
        }
        if (isset($_POST['search_baohanh'])) {
            $input = $_POST['input'];
            $Baohanh = $BaohanhView->getInputBaohanh($input);
        }
    
    $output = '';

if (isset($Baohanh) && is_array($Baohanh)) {
    $output = "";
    if ($Baohanh) {
        foreach ($Baohanh as $data) {
            $id_baohanh = $data['ID_Baohanh'];
            $tenbaohanh = $data['Tenbaohanh'];
            $thoigianbaohanh = intval($data['Thoigianbaohanh']);
            $trangthai = $data['Trangthai'];
                        $output .= "
            <tr class='fs-4'>
            <td scope='col'>$id_baohanh </td>
            <td scope='col'>$tenbaohanh</td>
            <td scope='col'>$thoigianbaohanh Tháng</td>
            <td scope='col'>$trangthai</td>
            <td class=' fs-5'>
            <div class='d-flex justify-content-around align-items-center control-wrap'>
             <i class='fa-solid fa-pen-to-square GetEdit-Baohanh' id_baohanh='{$id_baohanh}'  data-bs-toggle='modal' data-bs-target='#exampleModalEdit'></i>
                <i class='fa-solid fa-trash delete-baohanh' id_baohanh='{$id_baohanh}'></i>
            </div>
            </td>
            </tr>
            ";
        }
        echo $output;
    } 
} 
else {
    echo "No Baohanhs found";
}
} 
if(isset($_POST['deleteBaohanh'])){
    $id_baohanh = $_POST['id_baohanh'];
    $trangthai = 'F';
    
    $baohanhModel = new BaohanhModel();
    $baohanhModel->setID_baohanh($id_baohanh);
    $deletebaohanh = $BaohanhCtrl->deleteBaohanhCtrl($baohanhModel);
    if ($deletebaohanh) {
        echo 'xoa';
    }
}

if (isset($_POST['loadFormAddbaohanh'])) {
    $output = '';
    $output .= "<div class='modal-header'>
    <h5 class='modal-title' id='exampleModalLabel'>Thêm bảo hành</h5>
    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
</div>
<div class='modal-body'>
    <div class='row mt-3'>
        <div class='col form-input-baohanh'>
            <h6>Tên bảo hành</h6>
            <input class='input-namebaohanh' type='text' placeholder='VD: lehongthai..'>
        </div>
        <div class='col form-input-baohanh'>
            <h6>Thời gian bảo hành</h6>
            <input class='input-thoigianbaohanh' type='number' min='0''>
        </div>
    </div>
    
    
    <div class='modal-footer'>
    <button type='button' class='btn btn-secondary close-baohanh' data-bs-dismiss='modal'>Close</button>
    <button type='button' class='btn btn-primary submit-Baohanh'>Save</button>
</div>
        ";
    echo $output;
}

if (isset($_POST['insert_Baohanh'])) {
    $tenbaohanh = $_POST['tenbaohanh'];
    $thoigianbaohanh = $_POST['thoigianbaohanh'];
   
    $trangthai = 'T';
    $baohanhCtl = new baohanhCtrl();
    $baohanhModel = new BaohanhModel();

    
        $baohanhModel->setTenbaohanh($tenbaohanh);
        $baohanhModel->setthoigianbaohanh($thoigianbaohanh);
        $baohanhModel->setTrangthai($trangthai);

        $insertbaohanh = $baohanhCtl->insertBaohanhCtrl($baohanhModel);
        if ($insertbaohanh) {
            echo 'add';
        }
    
}

if (isset($_POST['editBaohanh'])) {

    $id_baohanh = $_POST['id_baohanh'];
    
    $baohanh = new BaohanhView();

    $resultBaohanh = $baohanh->getIdBaohanh($id_baohanh);
   
    $output = "";
    $tenbaohanh = $resultBaohanh['Tenbaohanh'];
    $thoigianbaohanh = intval($resultBaohanh['Thoigianbaohanh']);
    $trangthai = $resultBaohanh['Trangthai'];
 
   
    
        $output .= "<div class='modal-header'>
        
        <h5 class='modal-title' id='exampleModalLabel'>Edit bảo hành</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <div class='row mt-3'>
            <div class='col form-input-tenbaohanh'>
                <h6>Tên bảo hành</h6>
                <input class='input-namebaohanh ' type='text' value = '$tenbaohanh'>
            </div>
            <div class='col form-input-tenbaohanh'>
                <h6>Thời gian bảo hành</h6>
                <input class='input-thoigianbaohanh' type='number' value = '$thoigianbaohanh'>
            </div>
        </div>
        
        <div class='row mt-3'>
            <div class='col active-tenbaohanh' >
                <div class='form-check form-switch d-flex justify-content-start align-items-center'>";
        $isChecked = ($trangthai == 'T') ? 'checked' : '';
        $output .= "
                <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' $isChecked name='active-baohanh'>
                <label class='form-check-label fs-5 text-success fw-bold ms-3' for='flexSwitchCheckChecked'>Trạng thái</label>
                </div>
            </div>
            </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary close-baohanh' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary edit-baohanh' id-baohanh='$id_baohanh'>Save</button>
            </div>
        </div>

            ";
        echo $output;
    }
    
if (isset($_POST['editBaohanhAll'])) {
    $id_baohanh = $_POST['id_baohanh'];
    $tenbaohanh = $_POST['tenbaohanh'];
    $thoigianbaohanh = $_POST['thoigianbaohanh'];
    $trangthai = $_POST['active_baohanh'];
    $baohanh = new BaohanhCtrl();
    $baohanhModel = new BaohanhModel;
    $baohanhModel->setID_baohanh($id_baohanh);
    $baohanhModel->setTenbaohanh($tenbaohanh);
    $baohanhModel->setthoigianbaohanh($thoigianbaohanh);
    $baohanhModel->setTrangthai($trangthai);
    $Editbaohanh = $baohanh->updateBaohanhCtrl($baohanhModel);
    if ($Editbaohanh) {
        echo 'Update bảo hành thành công';
    } else {
        echo 'Update bảo hành thất bại';
    }
}

?>