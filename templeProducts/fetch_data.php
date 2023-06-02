<?php

// Kết nối cơ sở dữ liệu
include('../DB/dbconnect.php');
$record_per_page = 6;
$page = '';
$output = '';
if (isset($_POST["page"])) {
    $page = $_POST["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
if (isset($_POST["action"])) {
    // Lấy danh sách sản phẩm dựa trên thương hiệu
    $query = "
    SELECT * FROM dienthoai LIMIT $start_from, $record_per_page
    ";

    if (isset($_POST["brand"])) {
        $brand_filter = implode(",", $_POST["brand"]);
        $query = "
        SELECT * FROM dienthoai WHERE id_thuonghieu IN (" . $brand_filter . ") LIMIT $start_from, $record_per_page
        ";  
}

}
if(isset($_POST['brand']) && isset($_POST['value']) && $_POST['brand'] != '' && $_POST['value'] != '') {
    $brand_filter = implode(",", $_POST["brand"]);
    $value = $_POST['value'];
    if($value == 'Giá giảm dần'){
    $query = "SELECT * FROM dienthoai WHERE ID_thuonghieu IN ($brand_filter)  ORDER BY CAST( Giadt AS UNSIGNED) DESC LIMIT $start_from, $record_per_page";
    }else{
    $query = "SELECT * FROM dienthoai WHERE ID_thuonghieu IN ($brand_filter)  ORDER BY CAST( Giadt AS UNSIGNED) ASC LIMIT $start_from, $record_per_page";
    }
}elseif(isset($_POST['value'])){
    $value = $_POST['value'];
    if($value == 'Giá giảm dần'){
        $query = "SELECT * FROM dienthoai  ORDER BY CAST( Giadt AS UNSIGNED) DESC LIMIT $start_from, $record_per_page";
        }else{
        $query = "SELECT * FROM dienthoai ORDER BY CAST( Giadt AS UNSIGNED) ASC LIMIT $start_from, $record_per_page";
        }
}

if(isset($_POST['input']) && $_POST['input'] != '') {
    $input = $_POST['input'];
    $query = "SELECT * FROM dienthoai WHERE Tendt LIKE '%{$input}%' LIMIT $start_from, $record_per_page";
}
if(isset($_POST['brand']) && isset($_POST['input']) && $_POST['brand'] != '' && $_POST['input'] != '') {
    $brand_filter = implode(",", $_POST["brand"]);
    $input = $_POST['input'];
    $query = "SELECT * FROM dienthoai WHERE ID_thuonghieu IN ($brand_filter)  AND Tendt LIKE '%{$input}%' LIMIT $start_from, $record_per_page";
echo $brand_filter;
}

if(isset($_POST['brand']) && isset($_POST['input']) && isset($_POST['priceLow']) && isset($_POST['priceHight'])) {
    $brand_filter = implode(",", $_POST["brand"]);
    $input = $_POST['input'];
    $priceLow = $_POST['priceLow'];
    $priceHigh = $_POST['priceHight'];
     $query = "SELECT * FROM dienthoai WHERE ID_thuonghieu IN ($brand_filter)  AND Tendt LIKE '%{$input}%' AND Giadt BETWEEN $priceLow AND $priceHigh LIMIT $start_from, $record_per_page";

}

if(isset($_POST['priceLow']) && isset($_POST['priceHight'])){
    $priceLow= $_POST['priceLow'];
    $priceHigh =  $_POST['priceHight'];
   
    $query ="SELECT * FROM dienthoai WHERE Giadt BETWEEN $priceLow AND $priceHigh LIMIT $start_from, $record_per_page";
}
if(isset($_POST['brand']) && isset($_POST['priceLow']) && isset($_POST['priceHight'])){
    $brand = implode(",", $_POST["brand"]);
    $priceLow= $_POST['priceLow'];
    $priceHigh =  $_POST['priceHight'];    
    $query ="SELECT * FROM dienthoai WHERE ID_thuonghieu IN($brand) AND Giadt BETWEEN $priceLow AND $priceHigh LIMIT $start_from, $record_per_page";
}




$query_dienthoai = mysqli_query($conn, $query);
$output = '';

if (mysqli_num_rows($query_dienthoai) > 0) {

    while ($row_dienthoai = mysqli_fetch_array($query_dienthoai)) {

        $output .= '
    <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="product-item">
            <div class="product-item_img">
                <img src="https://www.oppo.com/content/dam/oppo/common/mkt/v2-2/a57-en/navigation/A57-427x600-green.png"
                alt="" >
            </div> 
            <div class="product-item-body">
            <h2>' . $row_dienthoai["ID_dienthoai"] . '</h2>
                    <h2>' . $row_dienthoai["Tendt"] . '</h2>
                    <p>' . $row_dienthoai["Motadt"] . '</p>
                <div class="product-item-body-price">
                    <p>' . number_format($row_dienthoai["Giadt"], 0, ',', '.') . " VND" . '</p>
                    <p>100$</p>
                 </div>
                <div class="product-item-body_control">
                 <button class="order_product"  data-product-id="' . $row_dienthoai["ID_dienthoai"] . '">Đặt ngay</button>
                </div>
            </div>
        </div>
    </div>';
    }
} else {
    $output = '<h3>No Data Found</h3>';
}
// echo $output;

$output .= ' <div class="pagination">
<div class="pagination_controll"><i class="fa-solid fa-arrow-left"></i></div>
';


if (isset($_POST["action"])) {
    $page_query = "SELECT * from dienthoai";

    if (isset($_POST["brand"])) {
        $page_query ="
        SELECT * FROM dienthoai WHERE id_thuonghieu IN (" . $brand_filter .")
        ";  
}
}
if(isset($_POST['input']) && $_POST['input'] != '') {
    $input = $_POST['input'];
    $page_query = "SELECT * FROM dienthoai WHERE Tendt LIKE '%{$input}%'";
}
if(isset($_POST['brand']) && isset($_POST['input']) && $_POST['brand'] != '' && $_POST['input'] != '') {
    $brand_filter = implode(",", $_POST["brand"]);
    $input = $_POST['input'];
    $page_query = "SELECT * FROM dienthoai WHERE ID_thuonghieu IN ($brand_filter)  AND Tendt LIKE '%{$input}%' ";
  
}

if(isset($_POST['brand']) && isset($_POST['input']) && isset($_POST['priceLow']) && isset($_POST['priceHight'])) {
    $brand_filter = implode(",", $_POST["brand"]);
    $input = $_POST['input'];
    $priceLow = $_POST['priceLow'];
    $priceHigh = $_POST['priceHight'];
     $page_query = "SELECT * FROM dienthoai WHERE ID_thuonghieu IN ($brand_filter)  AND Tendt LIKE '%{$input}%' AND Giadt BETWEEN $priceLow AND $priceHigh ";
    }
    

if(isset($_POST['priceLow']) && isset($_POST['priceHight'])){
    $priceLow= $_POST['priceLow'];
    $priceHigh =  $_POST['priceHight'];
   
    $page_query ="SELECT * FROM dienthoai WHERE Giadt BETWEEN $priceLow AND $priceHigh";
}
if(isset($_POST['brand']) && isset($_POST['priceLow']) && isset($_POST['priceHight'])){
    $brand = implode(",", $_POST["brand"]);
    $priceLow= $_POST['priceLow'];
    $priceHigh =  $_POST['priceHight'];    
    $page_query ="SELECT * FROM dienthoai WHERE ID_thuonghieu IN($brand) AND Giadt BETWEEN $priceLow AND $priceHigh";
}
if(isset($_POST['value'])){
    $value = $_POST['value'];
    if($value == 'Giá giảm dần'){
        $page_query = "SELECT * FROM dienthoai  ORDER BY CAST( Giadt AS UNSIGNED) DESC ";
        }else{
        $page_query = "SELECT * FROM dienthoai ORDER BY CAST( Giadt AS UNSIGNED) ASC";
        }
}
// $page_query = "SELECT * from dienthoai";

$page_result = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);
for ($i = 1; $i <= $total_pages; $i++) {
    $output .= "
    <div class='pagination_btn'>
        <div><span class='pagination_link'  id='" . $i . "'>" . $i . "</span></div>
    </div>
    ";
}
$output .= '
<div class="pagination_controll"><i class="fa-solid fa-arrow-right"></i></div>
';
echo $output;
?>