<?php
session_start();
if (isset($_SESSION['auth'])) {
    header('Location:index.php');
}
include 'header.php';



?>
<div class="container">
    <div id="main">

        <form action="function/authcode.php" id="form-2" class="form" method="POST">
            <div class="d-flex justify-content-center align-items-center form-title">
                <h1 class="">Đăng Nhập</h1>
                <h3 class="ms-auto">Đăng Ký</h3>
            </div>
            <div class="form__wrap">
                <label for="" class="form__wrap-label">Tên đầy đủ</label>
                <input type="text" class="form__wrap-input" name="username" placeholder="VD: Dịp Lâm Tuấn">
                <span class="form__error-message"></span>
            </div>
            <div class="form__wrap">
                <label for="" class="form__wrap-label">Mật khẩu</label>
                <input type="password" class="form__wrap-input" name="password" placeholder="Nhập mật khẩu">
                <span class="form__error-message"></span>
            </div>

            <button class="form__button">Đăng Nhập</button>
        </form>

    </div>

    <script src="./assets/js1/lamtuan1/validation.js"></script>
    <script>
        Validation({
            form: '#form-2',
            errorMessage: '.form__error-message',
            rules: [
                Validation.isRequired('input[name="username"]', 'Vui lòng nhập trường này'),
                Validation.isRequired('input[name="password"]', 'Vui lòng nhập trường này'),
                Validation.minLength('input[name="password"]', 7),
                Validation.maxLength('input[name="password"]', 11),
            ],
            onSubmit(data) {
                console.log(data);
                $(document).ready(function() {
                    $.ajax({
                        url: 'function/authcode.php',
                        method: 'post',
                        data: {
                            'login': data
                        },
                        success: function(data, success) {
                            if (data == 'Sai tài khoản hoặc mật khẩu') {
                                alert(data);
                            } else {
                                if (data == "Day la khach hang") {
                                    alert("Đăng nhập trang chủ thành công");
                                    location.href = 'index.php';
                                } else {
                                    alert("Đăng nhập trang quản trị thành công");
                                    location.href = 'admin/index.php';
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