$(document).ready(function () {
    $(".slider").slick({
        dots: true,
        infinite: true,
        speed: 1000,
        draggable: false,
        // autoplay: true,
        // autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    infinite: true,
                    dots: true,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    infinite: true,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    infinite: true,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    infinite: true,
                    dots: true,
                    arrows: false,
                }
            }

        ]
    });
    $('.brand_list').slick({

        infinite: true,
        speed: 1000,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-circle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-circle-right"></i></button>',
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false,
                }
            }

        ]
    });
    // Hot
    $('#hots_list').slick({
        infinite: true,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-circle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-circle-right"></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    // arrows: false,
                }
            },
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                }
            }

        ]
    });
    // Bat su kien click vao dang nhap 
    $("#form-1 > .form-title > h3 ").click(function () {
        location.href = "login.php";
    });
    $("#form-2 > .form-title > h3 ").click(function () {
        location.href = "register.php";
    });

    $("#logout").click(() => {
        $.ajax({
            url: 'function/authcode.php',
            method: 'post',
            data: { 'logout': 1 },
            success: function (data) {
                alert(data);
                location.href = 'index.php';
            }
        })
    });

    $("#login-register").click(() => {
        location.href = 'login.php';
        // $.ajax({
        //     url: 'function/authcode.php',
        //     method: 'post',
        //     data: { 'logout': 1 },
        //     success: function (data) {
        //         location.href = 'login.php';
        //     }
        // })
    })

    $(document).on("click", ".brand_list .brand_item", function () {
        var id_brand = $(this).attr("id_brand");
        location.href = "product.php?id=" + id_brand;
    })


}
);










