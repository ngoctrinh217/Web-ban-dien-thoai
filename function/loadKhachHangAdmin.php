<?php
include '../includes/autoload.php';
if (isset($_POST['loadKhachhang'])) {
    $customView = new CustommerView();
    if (isset($_POST['getdataKhachhang'])) {
        $result = $customView->getInForKH();
        
    }
    if (isset($_POST['search_khachhang'])) {
        $input = $_POST['input'];
            $result = $customView->getInputKH($input);
    }

    $output = '';


        $output = "";
        if (isset($result) && is_array($result)) {
            if ($result) {
            foreach ($result as $data) {
                $id_khachhang = $data['id_khachhang'];
                $tentaikhoan = $data['tentaikhoan'];
                $tenkhachhang = $data['tenkhachhang'];
                $diachi = $data['diachi'];
                $gioitinh = $data['gioitinh'];
                $Sdt = $data['sdt'];
                $Email = $data['email'];
                $output .= "
            <tr class='fs-4'>
            <td scope='col'>$id_khachhang </th>
            <td scope='col'>$tentaikhoan</th>
            <td scope='col'>$tenkhachhang</th>
            <td scope='col'>$gioitinh</th>
            <td scope='col'>$diachi</th>
            <td scope='col'>$Sdt</th>
            <td scope='col'>$Email</th>
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