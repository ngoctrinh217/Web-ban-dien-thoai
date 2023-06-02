<?php
include 'header.php';
// include 'classes/db.class.php';
// include 'classes/product.class.php';
// include 'classes/productView.class.php';
include 'includes/autoload.php';
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- <!DOCTYPE html>
<html>

<body> -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $output = "";
    $product = new ProductView();
    $result = $product->getProductByIdView($id);
    if ($result) {
        $priceOld = $result['Giadt'];
        $km  = $result['Sogiamgia'];
        $km = (float)$km / 100;
        $priceOld = (int)$priceOld;
        $priceNew = $priceOld - ($priceOld * $km);
        $soluong = intval($result['Soluong']);
        $output .= "
        <div class='container product_detail'>
    <div class='row justify-content-center'>
        <div class='col-xs-4 item-photo'>
            <img style='max-width:100%;' src='./assets/img/{$result['Anhdt']}' />
        </div>
        <div class='col-xs-5' style='border:0px solid gray'>
            <!-- Datos del vendedor y titulo del producto -->
            <h3 class='fw-bold'>{$result['Tendt']}</h3>
            <h5>Hãng: <a href='#'>{$result['tenthuonghieu']}</a>.</h5>

            <!-- Precios -->
            <h5 class='title-price'>
                Bảo hành:
                <span class='fw-bold'>{$result['Tenbaohanh']}</span>
            </h5>
            <h5 class='title-price'>
                Khuyến mãi:
                <span class='fw-bold'>{$result['Sogiamgia']}%</span>
            </h5>

            <h4 class='text-decoration-line-through'>
                {$result['Giadt']}
            </h4>
            <h4 style='margin-top:0px;'>
                {$priceNew} Đ
            </h4>

            <!-- Detalles especificos del producto -->

            <div class='section' style='padding-bottom:20px;'>
                <h6 class='title-attr fs-2'><small>Số lượng còn lại :<b class='fs-2 text-black quantityRemain'>{$soluong}</b></small></h6>
                <div>
                    <div class='btn-minus'><span class='glyphicon glyphicon-minus'></span></div>
                    <input value='1' class='quantity' disabled/>
                    <div class='btn-plus'><span class='glyphicon glyphicon-plus'></span></div>
                </div>
            </div>

            <!-- Botones de compra -->
            <div class='section product-detail-btn' style='padding-bottom:20px;'>
                <button class='btn btn-success btn-cart' pid={$id}><span style='margin-right:20px' class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Thêm vào giỏ hàng</button>
            </div>
        </div>

        <div class='col-xs-9'>
            <div style='width:100%;border-top:1px solid silver'>
                <p style='padding:15px;'>
                    <small>
                       {$result['Motadt']}
                    </small>
                </p>

            </div>
        </div>
    </div>
</div>
        ";
    } else {
        $output = "Product Details not found";
    }
    echo $output;
}

?>




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
<script src="./assets/js1/lamtuan1/lamtuan1.js"></script>
<div class="footer"></div>
<script>
    $(document).ready(function() {
        //-- Click on detail
        $("ul.menu-items > li").on("click", function() {
            $("ul.menu-items > li").removeClass("active");
            $(this).addClass("active");
        })

        $(".attr,.attr2").on("click", function() {
            var clase = $(this).attr("class");

            $("." + clase).removeClass("active");
            $(this).addClass("active");
        })

        //-- Click on QUANTITY
        $(".btn-minus").on("click", function() {
            var now = $(".section > div > input").val();
            if ($.isNumeric(now)) {
                if (parseInt(now) - 1 > 0) {
                    now--;
                }
                $(".section > div > input").val(now);
            } else {
                $(".section > div > input").val("1");
            }
        })
        $(".btn-plus").on("click", function() {
            var quantityRm = $(".quantityRemain").text();
            var now = $(".section > div > input").val();
            if (+now < parseInt(quantityRm)) {
                $(".section > div > input").val(parseInt(now) + 1);
            } else {
                $(".section > div > input").val(parseInt(now));
            }
        })

        $(".btn-cart").click(function() {
            var quantity = $(".quantity").val();
            var id = $(this).attr("pid");
            $.ajax({
                url: 'function/loadItemCart.php',
                method: 'POST',
                data: {
                    product_id: id,
                    user_id: -1,
                    quantity: quantity,
                },
                success: function(data) {
                    console.log(data);
                    countCart();
                }
            });
        });

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

    })
</script>
</body>

</html>