<?php
include('../DB/dbconnect.php');


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT  * FROM dienthoai,thuonghieu where thuonghieu.id_thuonghieu = dienthoai.ID_thuonghieu AND dienthoai.ID_dienthoai=$id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        //     $ok [] = $row;
        // }foreach($ok as $o){
        //     echo $o['ID_dienthoai'].'</br>';
        //     echo  $o['Tendt']. '<br>';
        //     echo  $o['tenthuonghieu']. '<br>';
        // }
        $output = '
<div class = "row">
<div class = "col-lg-4">
    <p>sdfdsf</p>
</div>
<div class = "col-lg-8">
<p>sdfdsf</p>
<p>sdfdsf</p>
<p>sdfdsf</p>
<p>sdfdsf</p>   
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product-item">
        <div class="product-item_img">
            <img src="https://www.oppo.com/content/dam/oppo/common/mkt/v2-2/a57-en/navigation/A57-427x600-green.png"
            alt="" >
        </div> 
        <div class="product-item-body">
        <h2>' . $row["ID_dienthoai"] . '</h2>
                <h2>' . $row["Tendt"] . '</h2>
                <p>' . $row["Motadt"] . '</p>
                <p>' . $row["tenthuonghieu"] . '</p>
            <div class="product-item-body-price">
                <p>' . number_format($row["Giadt"], 0, ',', '.') . " VND" . '</p>
                <p>100$</p>
             </div>
            <div class="product-item-body_control">
             <button class="order_product"  data-product-id="' . $row["ID_dienthoai"] . '">Đặt ngay</button>
            </div>
        </div>
    </div>
    
</div>';
    }
}
echo $output;
