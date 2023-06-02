$(document).ready(function () {
    
    $(".khuyenmai").click(function () {
        $.ajax({
            url: 'khuyenmai.php',
            method: 'POST',
            data: {
            },
            success: function (data) {
                $("main").html(data);
                loadKhuyenMai();
            }
        })
    })

    $(document).on('keyup','#search_khuyenmai', function() {
        var input = $(this).val();
        $.ajax({
            url: '../function/loadKhuyenMai.php',
            method: 'POST',
            data: {
                loadKhuyenMai:1,
                search_khuyenmai:1,
                input:input,
                
            },
            success: function (data) {
                $(".khuyenmai-wrapp").html(data);
                
            }
        })
    });
    $(document).on('click', '.delete-KhuyenMai', function () {
        var id_khuyenmai = $(this).attr('id_khuyenmai'); 
        var result = confirm("Bạn xác nhận hủy bảo hành ?");
        if (result) {
            $.ajax({
                url: '../function/loadKhuyenMai.php',
                method: 'POST',
                data: {
                    deletekhuyenmai: 1,
                    id_khuyenmai: id_khuyenmai,
                },
                success: function (data) {
                    if(data.trim()=='xoakm'){
                        alert('xoa khuyen mai thanh cong');
                        loadKhuyenMai();
                    }  
                }
            })
        }
    })
 // edit
 $(document).on('click', '.GetEdit-khuyenmai', function () {
    var id_khuyenmai = $(this).attr('id_khuyenmai');
    $.ajax({
        url: '../function/loadKhuyenMai.php',
        method: 'POST',
        data: {
            editkhuyenmai: 1,
            id_khuyenmai: id_khuyenmai,
        },
        success: function (data) {
            $(".product-edit-form .modal-content").html(data);
        }
    })
})

$(document).on('click','.product-edit-form .edit-khuyenmai',function(){
    var id_khuyenmai = $(this).attr('id-khuyenMai');
    alert(id_khuyenmai);
    var tenkhuyenmai = $('.product-edit-form .input-namekhuyenmai').val();
        var motakm = $('.product-edit-form .input-motakm').val();
        var sogiamgia = $('.product-edit-form .input-sogiamgiakm').val();
        if (checkValue(tenkhuyenmai)) {
            if (checkValue(sogiamgia)) {
                if (checkValue(motakm)) {
            
                var active = $('.product-edit-form input[name="active-khuyenmai"]').prop('checked')? 'T':'F';
              
      
                     $.ajax({
                    url: '../function/loadKhuyenMai.php',
                    method: 'POST',
                    data: {
                        editkhuyenmaiAll: 1,
                        id_khuyenmai:id_khuyenmai,
                        tenkhuyenmai:tenkhuyenmai,
                        motakm:motakm,
                        sogiamgia:sogiamgia,
                        active_khuyenmai:active
                    },
                    success: function (data) {
                        if(data.trim()=='edit'){
                            alert('Edit thành công');
                        }
                        loadKhuyenMai();
                        $(".close-khuyenmai").click();
                    }
                })
            }
            else {
                alert("Vui lòng nhập mô tả");
                $(".input-motakm").focus();
            }
        } else {
            alert("Vui lòng nhập so giam gia ");
            $(".input-sogiamgiakm").focus();
        }
    } else {
        alert("Vui lòng nhập tên");
        $(".input-nameKhuyenmai").focus();
    }
               
})

   

     // add
     $(document).on('click', '.btn-add-khuyenmai', function () {
       
        loadFormAddkhuyenmai();
    })

    $(document).on('click', '.product-add-form .submit-KhuyenMai', function () {
        var tenkhuyenmai = $('.product-add-form .input-namekhuyenmai').val();
        var motakm = $('.product-add-form .input-motakm').val();
        var sogiamgia = $('.product-add-form .input-sogiamgiakm').val();
        if (checkValue(tenkhuyenmai)) {
            if (checkValue(motakm)) {
                if (checkValue(sogiamgia)) {
                
                            $.ajax({
                                url: '../function/loadKhuyenMai.php',
                                method: 'POST',
                                data: {
                                    insert_khuyenmai: 1,
                                    tenkhuyenmai: tenkhuyenmai,
                                    motakm:motakm,
                                    sogiamgia: sogiamgia
                                },
                                success: function (data) {

                                    if(data.trim()=='add'){
                                        alert('Thêm thành công');
                                    }
                                    loadKhuyenMai();
                                    $(".close-khuyenmai").click();
                                }
                            })
                        }else {
                            alert("Vui lòng nhập so giam gia ");
                            $(".input-sogiamgiakm").focus();
                            }
                         }
                        else {
                            alert("Vui lòng nhập mô tả");
                            $(".input-motakm").focus();
                        }
                    
                } else {
                    alert("Vui lòng nhập tên");
                    $(".input-nameKhuyenmai").focus();
                }
                
    })
    function checkValue(data) {
        if (data == "" || data < 0) {
            return false;
        }
        return true;
    }

    function loadKhuyenMai(input) {
        $.ajax({
            url: '../function/loadKhuyenMai.php',
            method: 'POST',
            data: {
                loadKhuyenMai: 1,
                getdatakhuyenmai:1,
                input:input
            },
            success: function (data) {
                $(".khuyenmai-wrapp").html(data);
            }
        })
    
    }

    function loadFormAddkhuyenmai() {
        $.ajax({
            url: '../function/loadKhuyenMai.php',
            method: 'POST',
            data: {
                loadFormAddKhuyenMai: 1,
            },
            success: function (data) {
                $(".product-add-form .modal-content").html(data);
            }
        })
    }
    
})



