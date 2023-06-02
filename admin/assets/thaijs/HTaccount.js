$(document).ready(function () {
    
    $(".account").click(function () {
        $.ajax({
            url: 'account.php',
            method: 'POST',
            data: {
            },
            success: function (data) {
                $("main").html(data);
                loadAccount(1);
                loadPaginationAccount(1,'');
            }
        })
    })
    // add
    $(document).on('click', '.btn-add-account', function () {
        loadFormAddAccount()
    })

    $(document).on('click', '.product-add-form .submit-account', function () {
        var tendangnhap = $('.product-add-form .input-nameaccount').val();
        var matkhau = $('.product-add-form .input-matkhau').val();
        var date = $('.product-add-form .input-ngaysinh').val();
        var adress = $('.product-add-form .input-adress').val();
        var phone = $('.product-add-form .input-phone').val();
        if (checkValue(tendangnhap)) {
            if (checkInPutMK(matkhau)) {
                if (checkValue(date)) {
                    if (checkValue(adress)) {
                        if (checkInPutSDT(phone)) {
                            var gioitinh = $('#gioitinh').val();
                            $.ajax({
                                url: '../function/loadAccountAdmin.php',
                                method: 'POST',
                                data: {
                                    insert_account: 1,
                                    tendangnhap: tendangnhap,
                                    matkhau: matkhau,
                                    date: date,
                                    adress: adress,
                                    gioitinh: gioitinh,
                                    phone: phone,
                                },
                                success: function (data) {

                                    if(data.trim()=='add'){
                                        alert('them thanh cong ');
                                    }
                                    if(data.trim()=='exit'){
                                        alert('Tên đăng nhập đã tồn tại');
                                    }
                                    loadAccount();
                                    $(".close-account").click();
                                }
                            })
                        }
                        else {
                            alert("Vui lòng nhập số điện thoại đúng định dạng ");
                            $(".input-phone").focus();
                        }
                    } else {
                        alert("Vui lòng nhập dịa chỉ ");
                        $(".input-adress").focus();
                    }
                } else {
                    alert("Vui lòng nhập ngày sinh");
                    $(".input-ngaysinh").focus();
                }
            } else {
                alert("Mật khẩu phải gồm 8 kí tự có ít nhất 1 chữ và 1 số ")
                $(".input-matkhau").focus();
            }
        } else {
            alert("VUi lòng điền tên đăng nhập");
            $(".input-nameaccount").focus();
        }
    })

    function checkValue(data) {
        if (data == "") {
            return false;
        }
        return true;
    }
//  
function checkInPutSDT(data) {
    const regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    const matches = data.match(regex);
    if (matches !== null) {
        return true;
    }
    return false;
}

function checkInPutMK(data) {
    const regex = /^(?=.*\d)(?=.*[a-z])[a-zA-Z0-9]{6,}$/;

    const matches = data.match(regex);
    if (matches !== null) {
        return true;
    }
    return false;
}
    //xoa 
    $(document).on('click', '.delete-account', function () {
        var id_taikhoan = $(this).attr('pid-account'); 
        var id_page = $('.page-item.active a').attr('id');
        var input = $('#search_account').val();
        var result = confirm("Bạn xác nhận hủy tài khoản ?");
        if (result) {
            $.ajax({
                url: '../function/loadAccountAdmin.php',
                method: 'POST',
                data: {
                    deleteAccount: 1,
                    id_taikhoan: id_taikhoan,
                },
                success: function (data) {
                    loadAccount(id_page,input);
                }
            })
        }
    })

    // edit
    $(document).on('click', '.GetEdit-account', function () {
        var pid = $(this).attr('pid-account');
        var tendangnhap = $(this).attr('tendangnhap');
        var loaiTk = $(this).attr('loaitaikhoan');

        $.ajax({
            url: '../function/loadAccountAdmin.php',
            method: 'POST',
            data: {
                editAccount: 1,
                pid: pid,
                tendangnhap:tendangnhap,
                loaiTk:loaiTk
            },
            success: function (data) {
                $(".product-edit-form .modal-content").html(data);
            }
        })
    })

    $(document).on('click','.product-edit-form .edit-account',function(){
        var id_taikhoan = $(this).attr('id'); 
       
        var matkhau = $('.product-edit-form .input-matkhau').val();
        var ngaysinh = $('.product-edit-form .input-ngaysinh').val();
        var adress = $('.product-edit-form .input-adress').val();
        var phone = $('.product-edit-form .input-phone').val();
        if (checkInPutMK(matkhau)) {
            if (checkValue(ngaysinh)) {
                if (checkValue(adress)) {
                    if (checkInPutSDT(phone)) {
                    var id_quyen = $('.product-edit-form #quyentk').val();
                    var active = $('.product-edit-form input[name="active-account"]').prop('checked')? 'T':'F';
                  
                    var gioitinh = $('.product-edit-form #gioitinh').val();
                    var ngaytao = $('.product-edit-form .input-ngaytao').val();
                    var tendangnhap = $('.product-edit-form .input-nameaccount').val();

                    $.ajax({ 
                        url: '../function/loadAccountAdmin.php',
                        method: 'POST',
                        data: {
                            editAccountAll: 1,
                            id_taikhoan:id_taikhoan,
                            tendangnhap:tendangnhap,
                            matkhau:matkhau,
                            ngaysinh:ngaysinh,
                            ngaytao:ngaytao,
                            adress:adress,
                            phone:phone,
                            id_quyen:id_quyen,
                            active:active,
                            gioitinh:gioitinh
                        },
                        success: function (data) {
                            alert(data);
                            loadAccount();
                            loadPaginationAccount(1);
                            $(".close-account").click();
                        }
                    })
                }
                else {
                    alert("Vui lòng nhập số điện thoại đúng định dạng");
                    $(".input-phone").focus();
                }
                 } else {
                    alert("Vui lòng nhập dịa chỉ ");
                    $(".input-adress").focus();
                }
                } else {
                    alert("Vui lòng nhập ngày sinh");
                    $(".input-ngaysinh").focus();
                }
                } else {
                    alert("Mật khẩu phải gồm 6 kí tự có ít nhất 1 chữ và 1 số ");
                    $(".input-matkhau").focus();
                }
                   
    })
        
    var current_page = 1;

    $(document).on('click', ".account-page-no", function () {
        var input = $('#search_account').val();
        var id_page = $(this).text();
        current_page = id_page; 
        loadAccount(id_page,input);
        loadPaginationAccount(id_page,input);
        $('#search_account').val('');
    })

    $(document).on('keyup','#search_account', function() {
        var input = $(this).val();
        $.ajax({
            url: '../function/loadAccountAdmin.php',
            method: 'POST',
            data: {
                loadAccount:1,
                search_account:1,
                input:input,
                
            },
            success: function (data) {
                loadPaginationAccount(current_page, input);
                $(".account-wrapp").html(data);
                
            }
        })
    });
})





function loadAccount(page_no,input) {
    $.ajax({
        url: '../function/loadAccountAdmin.php',
        method: 'POST',
        data: {
            loadAccount: 1,
            getdataAccount:1,
            page_no:page_no,
            input:input
        },
        success: function (data) {
            $(".account-wrapp").html(data);
        }
    })

}


function loadFormAddAccount() {
    $.ajax({
        url: '../function/loadAccountAdmin.php',
        method: 'POST',
        data: {
            loadFormAddAccount: 1,
        },
        success: function (data) {
            $(".product-add-form .modal-content").html(data);
        }
    })
}

function loadPaginationAccount(page_no,input) {
    var input = $('#search_account').val();
    $.ajax({
        url: '../function/loadAccountAdmin.php',
        method: 'POST',
        data: {
            loadPaginationAccount: 1,
            page_no: page_no,
            input:input,
        },
        success: function (data) {
            $(".pagination-account").html(data);
        }
    })

}