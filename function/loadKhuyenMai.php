<?php
include '../includes/autoload.php';
$KhuyenMaiView = new KhuyenMaiView();
$KhuyenMaiCtrl = new KhuyenMaiCtrl();
if (isset($_POST['loadKhuyenMai'])) {
    
    
        
        if (isset($_POST['getdatakhuyenmai'])) {
            $KhuyenMai = $KhuyenMaiView->getAllKhuyenMai();
        }
        if (isset($_POST['search_khuyenmai'])) {
            $input = $_POST['input'];
            $KhuyenMai = $KhuyenMaiView->getInputKhuyenMai($input);
        }
    
    $output = '';

if (isset($KhuyenMai) && is_array($KhuyenMai)) {
    $output = "";
    if ($KhuyenMai) {
        foreach ($KhuyenMai as $data) {
            $id_khuyenmai = $data['id_khuyenmai'];
            $tenkhuyenmai = $data['tenkhuyenmai'];
            $motakhuyenmai = $data['motakhuyenmai'];
            $sogiamgia = $data['Sogiamgia'];
            $trangthai = $data['trangthai'];
                        $output .= "
            <tr class='fs-4'>
            <td scope='col'>$id_khuyenmai </td>
            <td scope='col'>$tenkhuyenmai</td>
            <td scope='col'>$motakhuyenmai </td>
            <td scope='col'>$sogiamgia </td>
            <td scope='col'>$trangthai</td>
            <td class=' fs-5'>
            <div class='d-flex justify-content-around align-items-center control-wrap'>
             <i class='fa-solid fa-pen-to-square GetEdit-khuyenmai' id_khuyenmai='{$id_khuyenmai}'  data-bs-toggle='modal' data-bs-target='#exampleModalEdit'></i>
                <i class='fa-solid fa-trash delete-KhuyenMai' id_khuyenmai='{$id_khuyenmai}'></i>
            </div>
            </td>
            </tr>
            ";
        }
        echo $output;
    } 
} 
else {
    echo "No KhuyenMai found";
}
} 
if(isset($_POST['deletekhuyenmai'])){
    $id_KhuyenMai = $_POST['id_khuyenmai'];
    $KhuyenMaiModel = new KhuyenMaiModel();
    $KhuyenMaiCtrl = new KhuyenMaiCtrl();
    $KhuyenMaiModel->setID_khuyenmai($id_KhuyenMai);
    $deleteKhuyenMai = $KhuyenMaiCtrl->deleteKhuyenMaiCtrl($KhuyenMaiModel);
    if ($deleteKhuyenMai) {
        echo 'xoakm';
    }
}
if (isset($_POST['loadFormAddKhuyenMai'])) {
    $output = '';
    $output .= "<div class='modal-header'>
    <h5 class='modal-title' id='exampleModalLabel'>Thêm khuyến mãi</h5>
    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
</div>
<div class='modal-body'>
    <div class='row mt-3'>
        <div class='col form-input-KhuyenMai'>
            <h6>Tên khuyến mãi</h6>
            <input class='input-namekhuyenmai' type='text' placeholder='VD: Noel..'>
        </div>
        <div class='col form-input-KhuyenMai'>
            <h6>Số giảm giá </h6>
            <input class='input-sogiamgiakm' type='number' min='0''>
        </div>
    </div>
    
    <div class='row mt-3'>
            <div class='col'>
                <div>
                    <textarea class='form-control input-motakm' id='textAreaExample2' rows='2' placeholder='VD: Mô tả'></textarea>
                </div>
            </div>
    </div>
    
    
    <div class='modal-footer'>
    <button type='button' class='btn btn-secondary close-khuyenmai' data-bs-dismiss='modal'>Close</button>
    <button type='button' class='btn btn-primary submit-KhuyenMai'>Save</button>
</div>
        ";
    echo $output;
}

if (isset($_POST['insert_khuyenmai'])) {
    $tenkhuyenmai = $_POST['tenkhuyenmai'];
    $motakm = $_POST['motakm'];
    $sogiamgia = $_POST['sogiamgia'];
    
    $trangthai = 'T';
    $KhuyenMaiCtl = new KhuyenMaiCtrl();
    $KhuyenMaiModel = new KhuyenMaiModel();

    
        $KhuyenMaiModel->setTenKhuyenMai($tenkhuyenmai);
        $KhuyenMaiModel->setmotaKM($motakm);
        $KhuyenMaiModel->setsogiamgia($sogiamgia);
        $KhuyenMaiModel->setTrangthai($trangthai);

        $insertKhuyenMai = $KhuyenMaiCtl->insertKhuyenMaiCtrl($KhuyenMaiModel);
        if ($insertKhuyenMai) {
            echo 'add';
        }
    
}

if (isset($_POST['editkhuyenmai'])) {

    $id_KhuyenMai = $_POST['id_khuyenmai'];
    
    $KhuyenMai = new KhuyenMaiView();

    $resultKhuyenMai = $KhuyenMai->getIdKhuyenMai($id_KhuyenMai);
   
    $output = "";
    $tenkhuyenmai = $resultKhuyenMai['tenkhuyenmai'];
    $sogiamgia = $resultKhuyenMai['Sogiamgia'];
    $motakm = $resultKhuyenMai['motakhuyenmai'];
    $trangthai = $resultKhuyenMai['trangthai'];
 
   
    
        $output .= "<div class='modal-header'>
        
        <h5 class='modal-title' id='exampleModalLabel'>Edit khuyến mãi</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
             <div class='row mt-3'>
                <div class='col form-input-KhuyenMai'>
                    <h6>Tên khuyến mãi</h6>
                    <input class='input-namekhuyenmai' type='text' value='$tenkhuyenmai'>
                </div>
                 <div class='col form-input-KhuyenMai'>
                       <h6>Số giảm giá </h6>
                         <input class='input-sogiamgiakm' type='number' min='0'' value='$sogiamgia'>
                 </div>
             <div class='row mt-3'>
                    <div class='col'>
                        <div>
                            <textarea class='form-control input-motakm' id='textAreaExample2' rows='2'>$motakm</textarea>
                        </div>
                    </div>
             </div>
                <div class='row mt-3'>
            <div class='col active-khuyenmai' >
                <div class='form-check form-switch d-flex justify-content-start align-items-center'>";
                    $isChecked = ($trangthai == 'T') ? 'checked' : '';
                    $output .= "
                <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' $isChecked name='active-khuyenmai'>
                <label class='form-check-label fs-5 text-success fw-bold ms-3' for='flexSwitchCheckChecked'>Trạng thái</label>
                </div>
            </div>
            </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary close-khuyenmai' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary edit-khuyenmai' id-khuyenMai='$id_KhuyenMai'>Save</button>
            </div>
          </div>
        
        

            ";
        echo $output;
    }
    
if (isset($_POST['editkhuyenmaiAll'])) {
    $id_khuyenmai = $_POST['id_khuyenmai'];
    $tenkhuyenmai = $_POST['tenkhuyenmai'];
    $motakm = $_POST['motakm'];
    $sogiamgia = $_POST['sogiamgia'];
    $trangthai = $_POST['active_khuyenmai'];
    $KhuyenMai = new KhuyenMaiCtrl();
    $KhuyenMaiModel = new KhuyenMaiModel;
    $KhuyenMaiModel->setID_KhuyenMai($id_khuyenmai);
    $KhuyenMaiModel->setTenkhuyenmai($tenkhuyenmai);
    $KhuyenMaiModel->setmotaKM($motakm);
    $KhuyenMaiModel->setsogiamgia($sogiamgia);
    $KhuyenMaiModel->setTrangthai($trangthai);
    $EditKhuyenMai = $KhuyenMai->updateKhuyenMaiCtrl($KhuyenMaiModel);
    if ($EditKhuyenMai) {
        echo 'edit';
    } 
}
