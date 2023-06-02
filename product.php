<?php
session_start();
include 'header.php';

?>
<!-- Content -->

<div class="container">
    <div class="content">
        <div class="content_input-search">
            <span class="content_input-search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" placeholder="Tìm kiếm..." id="search_product">
        </div>
    </div>
    <hr>
    <!-- Search content -->

    <!-- Menu bar -->
    <div class="menu_arrange--wrap">
        <div class="menu_arrange">
            <span class="menu_arrange-icon"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
            <span class="menu_arrange-text">Sắp xếp theo</span>
            <ul class="menu_list">
                <li class="menu_item" cid="asc">Giá tăng dần</li>
                <li class="menu_item" cid="desc">Giá giảm dần</li>
            </ul>
        </div>
    </div>

    <!-- Product wrap -->
    <div class="row">
        <div class="col filter">
            <!-- Filter header -->
            <div class="filter-header">
                <div class="filter-header-item">
                    <i class="fa-solid fa-bars filter-icon"></i>
                    <span>Lọc theo</span>
                </div>

                <div class="filter-header-item" id="restart">
                    <span>Đặt lại</span>
                    <i class="fa-solid fa-rotate-right reset-icon"></i>
                </div>
            </div>
            <!--  Filter body-->

            <div class="filter-body">
                <h2 class="filter-body-title">Phân loại</h2>

                <ul class="filter-body-list">
                    <!-- <li class="filter-body-item active ">
                        <span>Điện thoại</span>
                        <i class="fa-solid fa-circle-dot"></i>
                    </li>
                    <li class="filter-body-item">
                        <span> Điện thoại</span>
                        <i class="fa-solid fa-circle-dot"></i>
                    </li>
                    <li class="filter-body-item">
                        <span>Điện thoại</span>
                        <i class="fa-solid fa-circle-dot"></i>
                    </li> -->

                </ul>
            </div>
            <!-- Filter price -->

            <div class="filter-price">
                <h2 class="filter-price-title">Giá sản phẩm</h2>
                <div class="filter-price-input">
                    <input type="text" placeholder="Giá thấp nhất">
                    <span><i class="fa-solid fa-filter-circle-dollar"></i></span>
                    <input type="text" placeholder="Giá cao nhất">
                </div>
                <div class="filter-price-select-list">
                    <div class="filter-price-select-item" id="1">
                        <span>1-4 triệu</span>
                    </div>
                    <div class="filter-price-select-item" id="2">
                        <span>4-7 triệu</span>
                    </div>
                    <div class="filter-price-select-item" id="3">
                        <span>7-13 triệu</span>
                    </div>
                    <div class="filter-price-select-item" id="4">
                        <span>13-20 triệu</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="col product-list">

        </div>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid p-0">

    <footer class="bg-white text-center text-lg-start text-black">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row my-4">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer_logo">

                    <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
                        <img src="./assets/img/logovorke1231.png" height="70" alt="" loading="lazy" />
                    </div>

                    <p class="text-center footer_logo-title">Kết nối cuộc sống thông qua công nghệ với những sản
                        phẩm điện
                        thoại chất
                        lượng tại đây
                    </p>

                    <ul class="list-unstyled d-flex flex-row justify-content-center footer_logo-social">
                        <li>
                            <a class="px-2" href="#!">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a class="px-2" href="#!">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a class="ps-2" href="#!">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer_phone">
                    <h5 class="text-uppercase mb-4">Điện thoại</h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none">Iphone 14 ProMax</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none">Huawei Nova 3i</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none">Iphone 12 Pro</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none">Iphone 11 Pro</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none">Iphone 13 ProMax</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none">Iphone 12 ProMax</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black">Xem tất cả</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 member">
                    <h5 class="text-uppercase mb-4">Thành viên</h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none"><i class="fa-solid fa-user"></i>Dịp
                                Lâm Tuấn</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none"><i class="fa-solid fa-user"></i>Nguyễn Hồng Thái</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none"><i class="fa-solid fa-user"></i>Trần Tân Minh</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-black text-decoration-none"><i class="fa-solid fa-user"></i>Nguyễn Ngọc Trình</a>
                        </li>

                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 contact">
                    <h5 class="text-uppercase mb-4">Liên Lạc</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p><i class="fas fa-map-marker-alt pe-2"></i>Warsaw, 57 Street, Poland</p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone pe-2"></i>+ 01 234 567 89</p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 copy-right" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a class="text-black" href="#">Vorke.com</a>
        </div>
        <!-- Copyright -->
    </footer>

</div>
<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- Slick slider -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Slick slider -->
<!-- link main.js -->
<script>
    $(document).ready(function() {



        function loadPage(page, id_brand, input_search, priceStart, priceEnd, classify) {
            $.ajax({
                url: 'function/ajax.pagination.php',
                method: 'GET',
                data: {
                    page_no: page,
                    brand_no: id_brand,
                    input_search: input_search,
                    priceStart: priceStart,
                    priceEnd: priceEnd,
                    classify: classify,
                },
                success: function(data) {
                    console.log(data);
                    $(".col.product-list").html(data);
                }
            })
        }

        function loadActiveBrand(id_brand) {
            $.ajax({
                url: 'function/loadBrand.php',
                method: 'GET',
                data: {
                    brand_no: id_brand,
                },
                success: function(data) {
                    $(".filter-body-list").html(data);
                }
            })
        }
        loadPage();
        loadActiveBrand();
        <?php
        if (isset($_GET['id'])) {
        ?>
            const queryString = window.location.search;
            const params = new URLSearchParams(queryString);
            var id = params.get('id');
            loadPage(1, id);
            loadActiveBrand(id);
        <?php
        }
        ?>
        // Bat su kien click vao so trang tren website
        $(document).on("click", ".pagination .pagination_btn>div", function(event) {
            var priceStartInput = $(".filter-price-input input:first-child").val();
            var priceEndInput = $(".filter-price-input input:last-child").val();
            var page_id = $(this).attr("id");
            var brand_active = $(".filter-body-list .filter-body-item.active").attr("id");
            var input = $(".content_input-search #search_product").val();
            var id = $(".filter-price-select-list .filter-price-select-item.active").attr("id");
            let priceStart, priceEnd;
            const priceSE = rangesPrice(id);
            if (priceSE) {
                priceStart = priceSE[0];
                priceEnd = priceSE[1];
                loadPage(page_id, brand_active, input, priceStart, priceEnd);
            } else if (priceStartInput != "" && priceEndInput != "") {
                loadPage(page_id, brand_active, input, priceStartInput, priceEndInput);
            } else {
                loadPage(page_id, brand_active, input);
            }
        })

        //Bat su kien click vao nut quay ve
        $(document).on("click", ".pagination_controll.back", function() {
            var priceStartInput = $(".filter-price-input input:first-child").val();
            var priceEndInput = $(".filter-price-input input:last-child").val();
            var page_id = $(".pagination .pagination_btn>.active").attr("id");
            var page_back = page_id - 1;
            var brand_active = $(".filter-body-list .filter-body-item.active").attr("id");
            var input = $(".content_input-search #search_product").val();
            if (page_back <= 0) {
                page_back = 1;
            }
            var id = $(".filter-price-select-list .filter-price-select-item.active").attr("id");
            let priceStart, priceEnd;
            const priceSE = rangesPrice(id);
            if (priceSE) {
                priceStart = priceSE[0];
                priceEnd = priceSE[1];
                loadPage(page_back, brand_active, input, priceStart, priceEnd);
            } else if (priceStartInput != "" && priceEndInput != "") {
                loadPage(page_back, brand_active, input, priceStartInput, priceEndInput);
            } else {
                loadPage(page_back, brand_active, input);
            }

        })

        // Bat su kien click vao nut tiep theo
        $(document).on("click", ".pagination_controll.next", function() {
            var priceStartInput = $(".filter-price-input input:first-child").val();
            var priceEndInput = $(".filter-price-input input:last-child").val();
            var page_id = $(".pagination .pagination_btn>.active").attr("id");
            var page_number = $(".pagination .pagination_btn>div").length;
            var brand_active = $(".filter-body-list .filter-body-item.active").attr("id");
            var input = $(".content_input-search #search_product").val();
            if (page_id < page_number) {
                page_id++;
            } else {
                page_id = page_number;
            }
            var id = $(".filter-price-select-list .filter-price-select-item.active").attr("id");
            let priceStart, priceEnd;
            const priceSE = rangesPrice(id);
            if (priceSE) {
                priceStart = priceSE[0];
                priceEnd = priceSE[1];
                loadPage(page_id, brand_active, input, priceStart, priceEnd);
            } else if (priceStartInput != "" && priceEndInput != "") {
                loadPage(page_id, brand_active, input, priceStartInput, priceEndInput);
            } else {
                loadPage(page_id, brand_active, input);
            }

        })

        // Bat sự kiện click vào nút thương hiệu
        $(document).on('click', ".filter-body-list .filter-body-item", function() {
            var priceStartInput = $(".filter-price-input input:first-child").val();
            var priceEndInput = $(".filter-price-input input:last-child").val();
            var id_brand = $(this).attr("id");
            var page_id = $(".pagination .pagination_btn>.active").attr("id");
            var id = $(".filter-price-select-list .filter-price-select-item.active").attr("id");
            var input = $("#search_product").val();
            let priceStart, priceEnd;
            const priceSE = rangesPrice(id);
            if (priceSE) {
                priceStart = priceSE[0];
                priceEnd = priceSE[1];
                loadPage(page_id, id_brand, input, priceStart, priceEnd);
                loadActiveBrand(id_brand);
            } else if (priceStartInput != "" && priceEndInput != "") {
                console.log(page_id, id_brand, input, priceStartInput, priceEndInput);
                loadPage(page_id, id_brand, input, priceStartInput, priceEndInput);
                loadActiveBrand(id_brand);
            } else {
                loadPage(page_id, id_brand, input);
                loadActiveBrand(id_brand);
            }
        });

        // Bat su kien vao nut restart brand
        $(document).on('click', ".filter-header .filter-header-item#restart", function() {
            var priceAll = $(".filter-price-select-list .filter-price-select-item");
            resetActiveAll(priceAll);
            $(".filter-price-input input").val('');
            $("#search_product").val('');
            loadPage(1, 0);
            loadActiveBrand(0);
        });

        // Bat su kien khi ấn vào nút
        $("#search_product").keyup(function() {
            var priceStartInput = $(".filter-price-input input:first-child").val();
            var priceEndInput = $(".filter-price-input input:last-child").val();
            var input = $(this).val();
            var id = $(".filter-price-select-list .filter-price-select-item.active").attr("id");
            var page_id = $(".pagination .pagination_btn>.active").attr("id");
            var brand_active = $(".filter-body-list .filter-body-item.active").attr("id");
            let priceStart, priceEnd;
            const priceSE = rangesPrice(id);
            if (priceSE) {
                priceStart = priceSE[0];
                priceEnd = priceSE[1];
                loadPage(page_id, brand_active, input, priceStart, priceEnd);
            } else if (priceStartInput != "" && priceEndInput != "") {
                loadPage(page_id, brand_active, input, priceStartInput, priceEndInput);
            } else {
                loadPage(page_id, brand_active, input);
            }
        });
        // Bat su kien khi an nut dang ky
        $("#form-1 > .form-title > h3 ").click(function() {
            location.href = "login.php";
        });
        $("#form-2 > .form-title > h3 ").click(function() {
            location.href = "register.php";
        });

        $("#logout").click(() => {
            $.ajax({
                url: 'function/authcode.php',
                method: 'post',
                data: {
                    'logout': 1
                },
                success: function(data) {
                    alert(data);
                    location.href = 'index.php';
                }
            })
        });

        $("#login-register").click(() => {
            location.href = 'login.php';
        })
        // Bat su kien khi click vao nut them vao gio hang
        $(document).on("click", ".product-item-body_control button", function() {
            var id = $(this).attr("id");
            $.ajax({
                url: 'function/loadItemCart.php',
                method: 'POST',
                data: {
                    product_id: id,
                    user_id: -1,
                },
                success: function(data) {
                    console.log(data);
                    countCart();
                }
            });

        })
        // Ham tinh tong san pham
        function countCart() {
            $.ajax({
                url: 'function/loadItemCart.php',
                method: 'POST',
                data: {
                    cartCount: 1,
                },
                success: function(data) {
                    $(".header_name .cart_count").html(data);
                }
            });
        }
        // Bat su kien khi an nut khoang gia
        $(document).on("click", ".filter-price-select-list .filter-price-select-item", function() {
            var allPrice = $(".filter-price-select-item").siblings("input");
            var id = $(this).attr("id");
            resetActivePrice(allPrice.prevObject, id);
            var input = $(".content_input-search #search_product").val();
            var page_id = $(".pagination .pagination_btn>.active").attr("id");
            var brand_active = $(".filter-body-list .filter-body-item.active").attr("id");
            let priceStart, priceEnd;
            const priceSE = rangesPrice(id);
            if (priceSE.length === 2) {
                priceStart = priceSE[0];
                priceEnd = priceSE[1];
                loadPage(page_id, brand_active, input, priceStart, priceEnd);
            }
        })

        function resetActivePrice(array, id) {
            for (let i = 0; i < array.length; i++) {
                array[i].classList.remove("active");
                if (array[i].id == id) {
                    array[i].classList.add("active");
                }
            }
        }

        function resetActiveAll(array) {
            for (let i = 0; i < array.length; i++) {
                array[i].classList.remove("active");
            }
        }
        // Viet nhan id de biet khoang priceStart priceEnd
        function rangesPrice(id) {
            const ranges = {
                1: [1, 4],
                2: [4, 7],
                3: [7, 13],
                4: [13, 20],
            };
            if (id in ranges) {
                return ranges[id];
            } else {
                return undefined;
            }
        }
        // Viet ham gan gia tri vao 2 bien PriceStart priceEnd


        // Bat su kien khi ghi gia tri vao priceStart
        $(document).on("input", ".filter-price-input input:first-child", function() {
            var priceStart = $(this).val();
            var priceEnd = $(this).siblings("input").val();
            if (checkValid(priceStart)) {
                $(this).removeClass("invalid");
                priceStart = parseInt(priceStart);
                if (priceEnd) {
                    priceEnd = parseInt(priceEnd);
                    if (priceStart > priceEnd) {
                        $(this).addClass("invalid");
                    } else {
                        $(this).removeClass("invalid");
                    }
                }
            } else {
                $(this).addClass("invalid");
            }
        })

        // ấn vào nút lọc theo khoảng giá mình muốn
        $(".filter-price-input span").click(function() {
            var priceStart = $(this).siblings("input:first-child");
            var priceAll = $(".filter-price-select-list .filter-price-select-item");
            var priceEnd = $(this).siblings("input:last-child");
            var input = $(".content_input-search #search_product").val();
            var page_id = $(".pagination .pagination_btn>.active").attr("id");
            var brand_active = $(".filter-body-list .filter-body-item.active").attr("id");
            if (!priceStart.hasClass("invalid") && !priceEnd.hasClass("invalid")) {
                priceStart = priceStart.val();
                priceEnd = priceEnd.val();
                if (priceStart == "" && priceEnd == "") {
                    resetActiveAll(priceAll);
                    loadPage(page_id, brand_active, input);
                } else {
                    resetActiveAll(priceAll);
                    loadPage(page_id, brand_active, input, priceStart, priceEnd);
                }
            } else {
                resetActiveAll(priceAll);
                loadPage(page_id, brand_active, input);
            }
        })

        $(document).on("input", ".filter-price-input input:last-child", function() {
            var priceEnd = $(this).val();
            var priceStart = $(this).siblings("input").val();
            if (checkValid(priceStart) && checkValid(priceEnd)) {
                $(this).removeClass("invalid");
                priceEnd = parseInt(priceEnd);
                if (priceStart) {
                    priceStart = parseInt(priceStart);
                    if (priceEnd < priceStart) {
                        $(this).addClass("invalid");
                    } else {
                        $(this).removeClass("invalid");
                    }
                }
            } else {
                $(this).addClass("invalid");
            }


        })

        // Ham kiem tra xem gia tri cua input price hop le hay khong
        function checkValid(price) {
            if (/\D/.test(price)) {
                return false;
            }
            const number = parseInt(price);
            if (number > 0 && number <= 100) {
                return true;
            } else return false;
        }
        // Click vao su kien loc theo tang dan
        $(".menu_arrange--wrap .menu_item").click(function() {
            var elements = $(".menu_arrange--wrap .menu_item");
            var arrayElements = elements.toArray();
            for (const item of arrayElements) {
                item.classList.remove("active");
            }
            $(this).addClass('active');
            var cid = $(this).attr("cid");
            var page_id = $(".pagination .pagination_btn>.active").attr("id");
            var id = $(".filter-price-select-list .filter-price-select-item.active").attr("id");
            console.log(id);
            var input = $("#search_product").val();
            var priceStartInput = $(".filter-price-input input:first-child").val();
            var priceEndInput = $(".filter-price-input input:last-child").val();
            var brandid = $(".filter-body-list .filter-body-item.active").attr("id");
            const priceSE = rangesPrice(id);
            if (priceSE) {
                priceStart = priceSE[0];
                priceEnd = priceSE[1];
                loadPage(page_id, brandid, input, priceStart, priceEnd, cid);
            } else if (priceStartInput != "" && priceEndInput != "") {
                loadPage(page_id, brandid, input, priceStartInput, priceEndInput, cid);
            } else {
                loadPage(page_id, brandid, input, 0, 0, cid);
            }

        })

        $(".menu_arrange--wrap .menu_arrange-text").click(function() {
            var elements = $(".menu_arrange--wrap .menu_item");
            var arrayElements = elements.toArray();
            for (const item of arrayElements) {
                item.classList.remove("active");
            }
        })
    });
</script>
<div class="footer"></div>
</body>

</html>