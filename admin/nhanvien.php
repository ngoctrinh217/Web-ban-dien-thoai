<?php
echo "<div class='d-flex justify-content-around align-items-center product-control-wrap w-80 product-admin-wrap'>
<h1 class='title'>Danh sách nhân viên</h1>
<div class='input-search'>
    <input type='text' id='search_nhanvien' placeholder='Search...'>
    <i class='bx bx-search-alt-2 icon'></i>
</div>

</div>
<section class='intro nhanvien-admin'>
<div class='bg-image h-100' style='background-color: #f5f7fa;'>
    <div class='mask d-flex align-items-center h-100'>
        <div class='container p-0 m-auto'>
            <div class='row justify-content-center w-100'>
                <div class='col-12 p-0'>
                    <div class='card'>
                        <div class='card-body p-0'>
                            <div class='table-responsive' style='position: relative; height: 660px'>
                                <table class='table table-striped mb-0'>
                                    <thead style='background-color: #002d72;'>
                                        <tr class='fs-4' style='color:white;'>
                                            <th scope='col'>ID nhân viên </th>
                                            <th scope='col'>Tên nhân viên</th>
                                            <th scope='col'>Ngày sinh</th>
                                            <th scope='col'>Địa chỉ</th>
                                            <th scope='col'>Giới tính</th>
                                            <th scope='col'>Số điện thoại</th>
                                            <th scope='col'>Tên quyền</th>
                                        </tr>
                                    </thead>
                                    <tbody class='nhanvien-wrapp'>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div class='d-flex justify-content-center fs-3 mt-5 mx-0'>
<nav class='pagination-nhanvien' aria-label='Page navigation example'>
   
</nav>
</div>";
