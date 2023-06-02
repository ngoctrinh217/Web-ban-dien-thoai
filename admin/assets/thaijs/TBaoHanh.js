$(document).ready(function () {
    
    $(".baohanh").click(function () {
        $.ajax({
            url: 'baohanh.php',
            method: 'POST',
            data: {
            },
            success: function (data) {
                $("main").html(data);
                loadBoahanh();
            }
        })
    })

    $(document).on('keyup','#search_baohanh', function() {
        var input = $(this).val();
        $.ajax({
            url: '../function/loadbaohanh.php',
            method: 'POST',
            data: {
                loadBaohanh:1,
                search_baohanh:1,
                input:input,
                
            },
            success: function (data) {
                $(".baohanh-wrapp").html(data);
                
            }
        })
    });
    $(document).on('click', '.delete-baohanh', function () {
        var id_baohanh = $(this).attr('id_baohanh'); 
     
        var result = confirm("Bạn xác nhận hủy bảo hành ?");
        if (result) {
            $.ajax({
                url: '../function/loadbaohanh.php',
                method: 'POST',
                data: {
                    deleteBaohanh: 1,
                    id_baohanh: id_baohanh,
                },
                success: function (data) {
                    if(data.trim()=='xoa'){
                        alert('Xoa bao hanh thanh cong');
                        loadBoahanh();
                    }
                    
                }
            })
        }
    })
 // edit
 $(document).on('click', '.GetEdit-Baohanh', function () {
    var id_baohanh = $(this).attr('id_baohanh');
    $.ajax({
        url: '../function/loadbaohanh.php',
        method: 'POST',
        data: {
            editBaohanh: 1,
            id_baohanh: id_baohanh,
        },
        success: function (data) {
            $(".product-edit-form .modal-content").html(data);
        }
    })
})

$(document).on('click','.product-edit-form .edit-baohanh',function(){
    var id_baohanh = $(this).attr('id-baohanh'); 
    var tenbaohanh = $('.product-edit-form .input-namebaohanh').val();
    var thoigianbaohanh = $('.product-edit-form .input-thoigianbaohanh').val();
    if (checkValue(tenbaohanh)) {
        if (checkValue(thoigianbaohanh)) {
            
                var active = $('.product-edit-form input[name="active-baohanh"]').prop('checked')? 'T':'F';
              
                $.ajax({
                    url: '../function/loadbaohanh.php',
                    method: 'POST',
                    data: {
                        editBaohanhAll: 1,
                        id_baohanh:id_baohanh,
                        tenbaohanh:tenbaohanh,
                        thoigianbaohanh:thoigianbaohanh,
                        active_baohanh:active
                    },
                    success: function (data) {
                        alert(data);
                        loadBoahanh();
                        $(".close-baohanh").click();
                    }
                })
            }
            else {
                alert("Vui lòng nhập thời gian bảo hành");
                $(".input-thoigianbaohanh").focus();
            }
        } else {
            alert("Vui lòng nhập tên bảo hành ");
            $(".input-namebaohanh").focus();
        }
           
               
})

   

     // add
     $(document).on('click', '.btn-add-baohanh', function () {
       
        loadFormAddBaohanh();
    })

    $(document).on('click', '.product-add-form .submit-Baohanh', function () {
        var tenbaohanh = $('.product-add-form .input-namebaohanh').val();
        var thoigianbaohanh = $('.product-add-form .input-thoigianbaohanh').val();
        if (checkValue(tenbaohanh)) {
            if (checkValue(thoigianbaohanh)) {
                
                            $.ajax({
                                url: '../function/loadbaohanh.php',
                                method: 'POST',
                                data: {
                                    insert_Baohanh: 1,
                                    tenbaohanh: tenbaohanh,
                                    thoigianbaohanh: thoigianbaohanh
                                },
                                success: function (data) {

                                    if(data.trim()=='add'){
                                        alert('Thêm bảo hành thành công');
                                    }
                                    loadBoahanh();
                                    $(".close-baohanh").click();
                                }
                            })
                        }
                        else {
                            alert("Vui lòng nhập thời gian bảo hành");
                            $(".input-thoigianbaohanh").focus();
                        }
                    } else {
                        alert("Vui lòng nhập tên bảo hành ");
                        $(".input-namebaohanh").focus();
                    }
                
    })
    function checkValue(data) {
        if (data == "" || data < 0) {
            return false;
        }
        return true;
    }
    function loadBoahanh(input) {
        $.ajax({
            url: '../function/loadbaohanh.php',
            method: 'POST',
            data: {
                loadBaohanh: 1,
                getdatabaohanh:1,
                input:input
            },
            success: function (data) {
                $(".baohanh-wrapp").html(data);
            }
        })
    
    }

    function loadFormAddBaohanh() {
        $.ajax({
            url: '../function/loadbaohanh.php',
            method: 'POST',
            data: {
                loadFormAddbaohanh: 1,
            },
            success: function (data) {
                $(".product-add-form .modal-content").html(data);
            }
        })
    }
    
})



