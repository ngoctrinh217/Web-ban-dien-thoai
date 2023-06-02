<?php
session_start();
if (isset($_SESSION['auth'])) {
    header('Location: index.php');
}
include 'header.php';
?>

<div class="container">

    <div id="main">
        <form action="function/authcode.php" id="form-1" class="form" method="POST">
            <div class="d-flex justify-content-center align-items-center form-title">
                <h1 class="">Đăng ký</h1>
                <h3 class="ms-auto">Đăng nhập</h3>
            </div>

            <div class="form__wrap">
                <label for="" class="form__wrap-label">Tên đầy đủ</label>
                <input type="text" class="form__wrap-input" name="username" placeholder="VD: Dịp Lâm Tuấn">
                <span class="form__error-message"></span>
            </div>
            <div class="form__wrap">
                <label for="" class="form__wrap-label">Địa chỉ</label>
                <input type="text" class="form__wrap-input" name="address" placeholder="VD: Địa chỉ...">
                <span class="form__error-message"></span>
            </div>
            <div class="form__wrap">
                <label for="" class="form__wrap-label">Số điện thoại</label>
                <input type="text" class="form__wrap-input" name="phone" placeholder="VD: Số điện thoại...">
                <span class="form__error-message"></span>
            </div>
            <div class="form__wrap">
                <label for="" class="form__wrap-label">Email</label>
                <input type="text" class="form__wrap-input" name="email" placeholder="VD: diplamtuan@gmail.com">
                <span class="form__error-message"></span>
            </div>
            <div class="form__wrap">
                <label for="" class="form__wrap-label">Mật khẩu</label>
                <input type="password" class="form__wrap-input" name="password" placeholder="Nhập mật khẩu">
                <span class="form__error-message"></span>
            </div>
            <div class="form__wrap">
                <label for="" class="form__wrap-label">Nhập lại mật khẩu</label>
                <input type="password" class="form__wrap-input" name="password__confirm" placeholder="Nhập lại mật khẩu">
                <span class="form__error-message"></span>
            </div>
            <button class="form__button">Đăng ký</button>
        </form>

    </div>

    <script src="./assets/js1/lamtuan1/validation.js"></script>
    <script>
        Validation({
            form: '#form-1',
            errorMessage: '.form__error-message',
            rules: [
                Validation.isRequired('input[name="username"]', 'Vui long nhap trường nay'),
                Validation.isRequired('input[name="email"]'),
                Validation.isRequired('input[name="address"]'),
                Validation.isRequired('input[name="phone"]'),
                Validation.isNumber('input[name="phone"]'),
                Validation.phoneLength('input[name="phone"]', 10),
                Validation.isEmail('input[name="email"]'),
                Validation.minLength('input[name="password"]', 7),
                Validation.maxLength('input[name="password"]', 11),
                Validation.isRequired('input[name="password__confirm"]'),
                Validation.isConfirm('input[name="password__confirm"]', () => {
                    return document.querySelector('#form-1 input[name="password"]').value
                }, 'Vui lòng nhập lại mật khẩu'),
            ],
            onSubmit(data) {
                console.log(data);
                $(document).ready(function() {
                    $.ajax({
                        url: 'function/authcode.php',
                        method: 'post',
                        data: {
                            'register': data
                        },
                        success: function(data, success) {
                            if (data == 'Số điện thoại đã tồn tại') {
                                $("[name=phone]").siblings("[class=form__error-message]").text("Số điện thoại đã tồn tại");
                                $("[name=phone]").parent().addClass("invalid");
                            } else {
                                if (data == 'Email đã tồn tại') {
                                    $("[name=email]").siblings("[class=form__error-message]").text("Email đã tồn tại");
                                    $("[name=email]").parent().addClass("invalid");
                                } else {
                                    if (data == "Đăng ký thành công") {
                                        alert("Đăng ký thành công");
                                        location.href = 'login.php';
                                    } else {
                                        var result = confirm(data);
                                    }
                                }
                            }
                        }
                    })
                });
            }
        })
    </script>

</div>



<?php
include 'footer.php';
?>