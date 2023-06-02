<?php
// session_start();
// if (isset($_SESSION['auth_user']['id_nhanvien'])) {
//     header('location:admin/index.php');
// }

include_once "./DB/dbconnect.php"
?>
<?php
include 'header.php';
?>

<!-- Slider -->

<div class="slider container-fluid">
    <div class="position-relative">
        <img src="//image.oppo.com/content/dam/oppo/common/mkt/v2-2/a77s-en/topbanner/a77s-blue-2880_1440-v2.jpg.thumb.webp" alt="">
        <div class="slider_content">
            <h3 class="slider_title position-absolute">OPPO A77s</h3>
            <p class="slider_desc position-absolute">Cool miễn bàn, Cân ngàn tác vụ</p>
            <button type="button" class="btn slider_btn position-absolute">Tìm hiểu thêm</button>
        </div>
    </div>
    <div class="position-relative">
        <img src="//image.oppo.com/content/dam/oppo/common/mkt/v2-2/reno8-t-5g-en/topbanner/reno8-t-5g_2880_1440_2.jpg" alt="">
        <div class="slider_content">
            <h3 class="slider_title position-absolute">OPPO Pad Air</h3>
            <p class="slider_desc position-absolute">Mỗi Điểm Ảnh, Một Điểm Yêu</p>
            <button type="button" class="btn slider_btn position-absolute">Tìm hiểu thêm</button>
        </div>
    </div>
    <div class="position-relative">
        <img src="//image.oppo.com/content/dam/oppo/common/mkt/v2-2/reno8-t-en/topbanner/reno8-t_2880_1440_2.jpg.thumb.webp" alt="">
        <div class="slider_content">
            <h3 class="slider_title position-absolute">OPPO Reno8 T </h3>
            <p class="slider_desc position-absolute">Mỗi Điểm Ảnh, Một Điểm Yêu</p>
            <button type="button" class="btn slider_btn position-absolute">Tìm hiểu thêm</button>
        </div>
    </div>
</div>

<!-- Brands -->
<?php
include './homepage.php';
?>
<!-- <div class="brands container" id="brands">
        <h2 class="brands_title text-center">Về Thương Hiệu</h2>
        <div class="row brand_list position-relative">
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Iphone</h4>
                <img class="brand_item-img" src="./assets/img/iphone.jpg" alt="">
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="./assets/img/huawei.jpg" alt="">
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="https://cdn.dribbble.com/userupload/4722244/file/original-9ccb9f986b907cc7ea6c010d2c2c120f.png?compress=1&resize=1024x768" alt="">
            </div>
        </div>
    </div> -->
<!-- Hot -->
<div class="container-fluid bg-black hots_wrap">
    <div class="brands container" id="hots">
        <h2 class="brands_title text-center">Về Bán Chạy</h2>
        <div class="row position-relative" id="hots_list">
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="https://cdn.dribbble.com/userupload/4722244/file/original-9ccb9f986b907cc7ea6c010d2c2c120f.png?compress=1&resize=1024x768" alt="">
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="https://cdn.dribbble.com/userupload/4722244/file/original-9ccb9f986b907cc7ea6c010d2c2c120f.png?compress=1&resize=1024x768" alt="">
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="https://cdn.dribbble.com/userupload/4722244/file/original-9ccb9f986b907cc7ea6c010d2c2c120f.png?compress=1&resize=1024x768" alt="">
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="https://cdn.dribbble.com/userupload/4722244/file/original-9ccb9f986b907cc7ea6c010d2c2c120f.png?compress=1&resize=1024x768" alt="">
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="https://cdn.dribbble.com/userupload/4722244/file/original-9ccb9f986b907cc7ea6c010d2c2c120f.png?compress=1&resize=1024x768" alt="">
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 brand_item">
                <h4 class="brand_item-name">Apple</h4>
                <img class="brand_item-img" src="https://cdn.dribbble.com/userupload/4722244/file/original-9ccb9f986b907cc7ea6c010d2c2c120f.png?compress=1&resize=1024x768" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Update -->
<div class="container-fluid update position-relative">
    <img src="https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/rm105-ning-23-glitter.jpg?w=800&dpr=1&fit=default&crop=default&q=65&vib=3&con=3&usm=15&bg=F4F4F3&ixlib=js-2.2.1&s=7b378d24bf745a3945ba3cc89b49a020" alt="">
    <h2 class="update_title text-center position-absolute top-0 start-50 translate-middle">Cập nhật mới nhất từ
        Vorke</h2>
    <p class="update_desc text-center position-absolute start-50 translate-middle">Đăng ký để nhận ngay những
        thông tin ưu đãi, sản phẩm mới hay sự kiện đặc
        biệt từ Vorke
    </p>
    <form action="#" class="form_update-email position-absolute start-50 translate-middle">
        <div class="input-wrap">
            <input type="text" placeholder="E-mail của bạn">
            <button type="submit"><i class="fa-regular fa-paper-plane align-middle"></i></button>
        </div>
        <span class="input_error-mess"></span>
        <p class="form_update-email-policy">
            <input type="checkbox" name="update_email" class="circle-checkbox">
            Tôi muốn đăng ký để nhận thông tin từ Vorke và đối tác. Khi
            đăng ký, bạn đồng ý với
            <span class="form_update-email-policy-link">Chính sách quyền riêng tư của Vorke</span>
        </p>
    </form>
</div>
<?php
include 'footer.php';
?>