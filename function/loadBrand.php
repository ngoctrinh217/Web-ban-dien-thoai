<?php

include '../includes/autoload.php';

$allBrand = new BrandView();
$result = $allBrand->getAllBrandsView();
$output = "";
if (isset($_GET['brand_no'])) {
    $brand_no = $_GET['brand_no'];
} else {
    $brand_no = 0;
}
if ($result) {
    foreach ($result as $brand) {
        if ($brand['id_thuonghieu'] == $brand_no) {
            $className = "active";
        } else {
            $className = "";
        }
        $output .= "<li class='filter-body-item {$className}' id='{$brand['id_thuonghieu']}'>
                        <span>{$brand['tenthuonghieu']}</span>
                        <i class='fa-solid fa-circle-dot'></i>
                    </li>
                     ";
    }
    echo $output;
} else {
    echo "No records found.";
}
