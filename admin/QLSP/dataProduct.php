
<?php
include('../../model/db.class.php');
include '../../model/ADMINsanpham.class.php';
include '../../view/ADMINsanphamView.php';

$sanpham = new sanphamview();
$output = "";
$page = '';

$limit_per_pages = 3;
if (isset($_POST['page'])) {
    $page = (int)$_POST['page'];
} else {
    $page = 1;
}
$offset =  ($page - 1) * $limit_per_pages;
// Lay id Brand;
if (isset($_POST['id_brand'])) {
    $id_brand =  $_POST['id_brand'];
} else {
    $id_brand = 0;
}

if (isset($_POST['input'])) {

    $input = $_POST['input'];
}

if ($id_brand == '') {
    if ($input == '') {
        $result = $sanpham->getInforSPView($offset, $limit_per_pages);
    } else {
        $result = $sanpham->getInforSPProductView($input, $offset, $limit_per_pages);
    }
} else {
    if ($input == '') {
        $result = $sanpham->getSpBrandView($id_brand, $offset, $limit_per_pages);
    } else {
        $result = $sanpham->getSpBrand_InputView($input, $id_brand, $offset, $limit_per_pages);
    }
}

if ($result) {

    $output .= "
<div class='col-2'>
<button  type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal_dialog' data-action ='AddProduct' data-id=' '>
Add product
</button> 

    </div>
    </div>


";
    $output .= '

        <table class="table table-bordered table-dark table-striped" >
        <thead>
            <tr>
                <th>ID Điện Thoại</th>
                <th>Tên điện thoại</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Tên thương hiệu</th>
                <th>Tên NCC</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>
        </thead>
        
     
        ';


    foreach ($result as $data) {
        $ID_dt = $data['ID_dienthoai'];
        $Tendt = $data['Tendt'];
        $Anhdt = $data['Anhdt'];
        $Giadt = $data['Giadt'];
        $TenTH = $data['tenthuonghieu'];
        $TenNCC = $data['tennhacungcap'];
        $trangthai = $data['trangthai'];
        $output .= "
       
       <tr>
       <td> $ID_dt</td>
       <td> $Tendt</td>
       <td><img src='../../assets/img/$Anhdt' style='width:100px; height:100px'></td>
       <td>$Giadt</td>
       <td>$TenTH</td>
       <td>$TenNCC</td>
       <td>$trangthai</td> 
      <td>
                  <button data-id_product='$ID_dt' class = 'btn btn-danger del_product' name='delete_data' >Delete</button>
          <button  type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal_dialog' data-action ='Edit' data-id=' $ID_dt'>
          Edit
        </button>  
        </td>  
       
  </tr>
       ";
    }
}
$output .= ' </table>';
if (!$result) {
    echo 'NO DATA';
}

if ($id_brand == '') {
    if ($input == '') {
        $resultotal = $sanpham->getsanphamView();
    } else {
        $resultotal = $sanpham->getsanpham_inputView($input);
    }
} else {
    if ($input == '') {
        $resultotal = $sanpham->getSpBrandProductView($id_brand);
    } else {
        $resultotal = $sanpham->getSpBrandProduct_inputView($input, $id_brand);
    }
}


if (is_array($resultotal)) {
    $total_record = count($resultotal);
} else {
    $total_record = 0;
}
$total_pages = ceil($total_record / $limit_per_pages);
$output .= '<nav aria-label="...">
    <ul class="pagination pagination-sm">';
for ($i = 1; $i <= $total_pages; $i++) {
    // Add "current" class to the current page link
    $current_class = ($i == $page) ? 'current' : '';
    $output .= '
         
    <li class="page-item"><a class="page-link" href="#">
    <span class="pagination_link ' . $current_class . '"  id="' . $i . '">' . $i . '</span>
 </a></li>
       ';
}

$output .= ' </ul>
      </nav>';

echo $output;
?>
