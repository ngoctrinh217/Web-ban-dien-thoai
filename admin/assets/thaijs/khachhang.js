$(document).ready(function () {
    
    $(".khachhang").click(function () {
        $.ajax({
            url: 'khachhang.php',
            method: 'POST',
            data: {
            },
            success: function (data) {
                $("main").html(data);
                loadKhachHang();
            }
        })
    })
    
    $(document).on('keyup','#search_khachhhang', function() {
        var input = $(this).val();
        $.ajax({
            url: '../function/loadKhachHangAdmin.php',
            method: 'POST',
            data: {
                loadKhachhang:1,
                search_khachhang:1,
                input:input,
                
            },
            success: function (data) {
                $(".khachhang-wrapp").html(data);
                
            }
        })
    });

    function loadKhachHang(input) {
        $.ajax({
            url: '../function/loadKhachHangAdmin.php',
            method: 'POST',
            data: {
                loadKhachhang: 1,
                getdataKhachhang:1,
                input:input
            },
            success: function (data) {
                $(".khachhang-wrapp").html(data);
            }
        })
    
    }
})
