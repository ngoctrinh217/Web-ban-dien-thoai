<?php
include '../includes/autoload.php';
if (isset($_POST['loadNhanvien'])) {

    $StaffView = new StaffView();
    if (isset($_POST['getdataNhanvien'])) {
        $result = $StaffView->getAllStaff();
        
    }
    if (isset($_POST['search_nhanvien'])) {
        $input = $_POST['input'];
            $result = $StaffView->getInputStaff($input);
    }

    $output = '';


        $output = "";
        if (isset($result) && is_array($result)) {
            if ($result) {
            foreach ($result as $data) {
                $id_nhanvien = $data['id_nhanvien'];
                $tennahnvien = $data['tennhanvien'];
                $ngaysinh = $data['ngaysinh'];
                $diachi = $data['diachi'];
                $gioitinh = $data['gioitinh'];
                $Sdt = $data['sdt'];
                $tenquyen = $data['tenquyen'];
                $output .= "
            <tr class='fs-4'>
            <td scope='col'>$id_nhanvien </th>
            <td scope='col'>$tennahnvien</th>
            <td scope='col'>$ngaysinh</th>
            <td scope='col'>$diachi</th>
            <td scope='col'>$gioitinh</th>
            <td scope='col'>$Sdt</th>
            <td scope='col'>$tenquyen</th>
            </tr>
            ";
            }
            echo $output;
        }
    } else {
        echo "No data found";
    }
}
?>