<?php
include_once "./DB/dbconnect.php";

$query = "Select * from thuonghieu";
$result = mysqli_query($conn, $query);

// Kiem tra result co du lieu khong ?
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    // Hien thi the brand
    echo '<div class="brands container" id="brands">
        <h2 class="brands_title text-center">Về Thương Hiệu</h2>
        <div class="row brand_list position-relative">
    ';

    // Tao vong lap lay du lieu trong db
    while ($row = mysqli_fetch_assoc($result)) {
        $tenthuonghieu = $row['tenthuonghieu'];
        $anh = $row['anh'];
        echo "
        <div class='col-xxl-6 col-md-6 col-sm-12 brand_item' id_brand='{$row['id_thuonghieu']}'>
                <h4 class='brand_item-name'>$tenthuonghieu</h4>
             <img class='brand_item-img' src='./assets/img/$anh' alt=''>
    </div>
    ";
    }

    // Dong the brand
    echo '</div>
    </div>
    ';
}
