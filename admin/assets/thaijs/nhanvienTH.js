$(document).ready(function () {
    
    $(".nhanvien").click(function () {
        $.ajax({
            url: 'nhanvien.php',
            method: 'POST',
            data: {
            },
            success: function (data) {
                $("main").html(data);
                loadNhanvien();
            }
        })
    })
    
    $(document).on('keyup','#search_nhanvien', function() {
        var input = $(this).val();
        $.ajax({
            url: '../function/loadNhanvienAdmin.php',
            method: 'POST',
            data: {
                loadNhanvien:1,
                search_nhanvien:1,
                input:input,
                
            },
            success: function (data) {
                $(".nhanvien-wrapp").html(data);
                
            }
        })
    });
    function loadNhanvien(input) {
        $.ajax({
            url: '../function/loadNhanvienAdmin.php',
            method: 'POST',
            data: {
                loadNhanvien: 1,
                getdataNhanvien:1,
                input:input
            },
            success: function (data) {
                $(".nhanvien-wrapp").html(data);
            }
        })
    
    }
})
