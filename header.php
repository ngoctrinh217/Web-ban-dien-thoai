<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vorke</title>
    <link rel="icon" href="./assets/img/logoicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- slick slider -->
    <link rel="stylesheet" href="./assets/css/lamtuan123.css">
    <link rel="stylesheet" href="./assets/css/responsive1.css">
</head>

<body>
    <!-- Header -->
    <div class="header-fluid sticky-top">
        <div class="container header d-flex align-items-center justify-content-between">
            <a class="header_logo" href="index.php">
                <img src="./assets/img/logovorke1231.png" alt="">
            </a>
            <div class="header_nav d-none d-xl-flex">
                <a class="header_name" href="product.php">Điện Thoại</a>
                <a class="header_name" href="#">Sản phẩm IoT</a>
                <a class="header_name" href="#">Về Vorke</a>
                <a href="cart.php" class="header_name header_nav-btn position-relative">Giỏ Hàng
                    <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-secondary cart_count"><?php
                                                                                                                                    if (isset($_SESSION['cart'])) {
                                                                                                                                        echo count($_SESSION['cart']);
                                                                                                                                    } else {
                                                                                                                                        echo 0;
                                                                                                                                    }
                                                                                                                                    ?>
                        <span class="visually-hidden">unread messages</span></span>
                </a>
                <?php
                if (isset($_SESSION['auth'])) {
                ?>
                    <div class="dropdown header_name dropdown-profile">
                        <button class="btn btn-secondary dropdown-toggle profile" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['auth_user']['username']; ?>
                            <i class="fa-regular fa-user"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="profile.php">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="order.php">Đơn hàng</a></li>
                            <li><a class="dropdown-item" id="logout" href="#">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php
                } else {
                ?>
                    <a class="header_name" id="login-register" href="#">Đăng ký/ Đăng nhập</a>
                <?php
                } ?>
            </div>

            <!-- Search -->
            <div class="mobile-toggler">
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>


            <!-- Mobile bars icon -->
            <div class="mobile-toggler d-xl-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

        </div>

    </div>
    <!-- Header -->
    <!-- Modal -->
    <!-- Button trigger modal -->


    <!-- Modal mobile -->
    <div class="modal fade mobile" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Thay anh thuong hieu -->
                    <img src="./assets/img/logovorke1231.png" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <!-- Tao tung modal line -->
                    <div class="modal-line">
                        <i class="fa-solid fa-mobile"></i><a href="/" class="">Điện Thoại</a>
                    </div>
                    <div class="modal-line">
                        <i class="fa-brands fa-product-hunt"></i><a href="/" class="">Sản phẩm IoT</a>
                    </div>
                    <div class="modal-line">
                        <i class="fa-solid fa-address-card"></i><a href="/" class="">Về Vorke</a>
                    </div>
                    <div class="modal-line">
                        <i class="fa-solid fa-address-card"></i> <a href="/" class="">Đơn hàng</a>
                    </div>
                    <div class="modal-line">
                        <i class="fa-solid fa-right-to-bracket"></i><a href="/" class="">Đăng ký/ Đăng nhập</a>
                    </div>
                </div>
                <div class="mobile-modal-footer">
                    <a target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal search -->

    <div class="modal fade search" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="input-group mb-3 search-input">
                        <span class="input-group-text" data-bs-dismiss="modal" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control" placeholder="Tìm kiếm ..." aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>