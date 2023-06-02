<?php
include('./DB/dbconnect.php');
?>

<div class="row">
    <div class="col filter" id="filter">
        <!-- Filter header -->
        <div class="filter-header">
            <div class="filter-header-item">
                <i class="fa-solid fa-bars filter-icon"></i>
                <span>Lọc theo</span>
            </div>

            <div class="filter-header-item">
                <span><a href="product.php?hienthi=tenthuonghieu&id=loadproduct">Đặt lại</a></span>
                <i class="fa-solid fa-rotate-right reset-icon"></i>
            </div>
        </div>
        <!--  Filter body-->
        <div class="filter-body">
            <h2 class="filter-body-title">Phân loại</h2>
            <!-- query_thuonghieu -->
            <?php
            $sql_thuonghieu = "SELECT *from thuonghieu ";
            $query_thuonghieu = mysqli_query($conn, $sql_thuonghieu);
            ?>
            <?php

            $query = "SELECT * FROM thuonghieu";
            $q = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($q)) {
            ?>
                <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['id_thuonghieu']; ?>"></label>
            <span><?php echo $row['tenthuonghieu']; ?></span>
            </div>

            <?php
            }

            ?>
        </div>
        <!-- Filter price -->

        <div class="filter-price">
            <h2 class="filter-price-title">Giá sản phẩm</h2>
                <div class="filter-price-input">
                    <input type="text" id="minPrice"  placeholder="Giá thấp nhất">
                    <span></span>
                    <input type="text" id="maxPrice" placeholder="Giá cao nhất">
                </div>
            <div class="filter-price-select-list">
                <div class="filter-price-select-item">
                    <span>1-4 triệu</span>
                </div>
                <div class="filter-price-select-item">
                    <span>4-6 triệu</span>
                </div>
                <div class="filter-price-select-item">
                    <span>7-13 triệu</span>
                </div>
                <div class="filter-price-select-item">
                    <span>13-20 triệu</span>
                </div>
            </div>
            
        </div>
    </div>