<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

  <title>Book List</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    table td,
    table th {
      vertical-align: middle;
      text-align: center;
      padding: 10px !important;

    }

    .pagination_link.current {
      background-color: blue;
      color: white;
      padding: 5px 15px;
      cursor: pointer;

    }

    select#brand {
      height: 30px;
      width: 150px;
      text-align: center;
      background-color: aquamarine;
      margin-bottom: 20px;
    }

    img {
      height: 250px;
      width: 250px;
      object-fit: cover;
      background-color: blueviolet;
    }
  </style>
</head>

<body>
  <div class="container my-4">

    <header class="d-flex justify-content-between my-4">
      <h1>Book List</h1>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" id="search-input" placeholder="Search" aria-label="Search">
      </form>
    </header>
    <div id='catelogy_data'></div>
    <div id='content'></div>
    <div id='test'>
    </div>

  </div>

  <?php
  include('./modal_dialog.php');
  ?>

</body>
<script>
  function imagePreview(subject) {
    let file = subject.files[0];
    let url = URL.createObjectURL(file);
    let fileName = file.name;
    $("#image_preview").attr("src", url).attr("value", file.name);

  }
  $(document).ready(function() {
    load_data();
    load_brand();
    deleteproduct();

    $(document).on('click', '.pagination_link', function() {
      var page = $(this).attr("id");
      var id_brand = $('#brand').val();
      var input = $('#search-input').val();
      load_data(id_brand, page, input);
    });

    function load_data(id_brand = "", page = 1, input = '') {

      $.ajax({
        url: './dataProduct.php',
        method: "POST",
        data: {
          id_brand: id_brand,
          page: page,
          input: input
        },
        success: function(data) {
          $('#content').html(data);
        }
      });
    }
    $(document).on('change', '#brand', function() {
      var input = $(this).val();
      var id_brand = $('#brand').val();
      load_data(id_brand, 1, input = '')
    });

    $(document).on('keyup', '#search-input', function() {
      var id_brand = $('#brand').val();
      var input = $(this).val();
      load_data(id_brand, 1, input);
      load_brand(id_brand, 1, input)
    });


    function load_brand(id_brand = '', page = 1, input) {
      $.ajax({
        url: './loadBrand_product.php',
        method: "POST",
        data: {
          id_brand: id_brand,
          page: page,
          input: input
        },
        success: function(data) {
          $('#catelogy_data').html(data);
        }
      });

    }
    // delete product

    function deleteproduct() {
      $(document).on('click', '.del_product', function() {
        var page = $('.pagination_link.current').attr('id');
        var id = $(this).data('id_product');
        var id_brand = $('#brand').val();

        $.ajax({
          url: './deleteproduct.php',
          method: 'POST',
          data: {
            id_product: id
          },
          success: function(data) {
            if (data.trim() == 'success') {
              alert('Delete success');

              load_data(id_brand, page, '');
            } else {
              alert('Delete failed');
            }
          }
        });
      });
    }
    
    // detail product
    $('#modal_dialog').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var action = button.data('action');
      var ID_dt = button.data('id');
      $(this).find('span.error').remove(); // Xóa các thẻ span có class error
     $('#tendt').css('background-color', 'transparent'); // Thiết lập màu nền về giá trị mặc định

      if (action == 'Edit') {
        Reardproduct(button, ID_dt);
        $('#id,#id_dt,#button_edit,#button_edit,#active').show();
        $("#button_insert").hide();
        // $("#button_edit").show();
        $('#button_edit').off('click').on('click', function() {

          var key = $(this).data('key');
          var fileName = $('#image_preview').attr('value');
          // var fileName = $('#file_upload')[0].files[0];
          Dataproduct(key,fileName);

        });
      } else if (action == 'AddProduct') {
        $('input[type="text"], textarea,select').val('');
        
        $('#image_preview').attr('src', '').attr('value','');
        $('#id,#id_dt,#button_edit,#active').hide();
        $("#button_insert").show();
        
        $('#button_insert').off('click').on('click', function() {
          var key = $(this).data('key');
          // var fileName = $('#image_preview').attr('value'); // Lấy tên file ảnh
          var fileName = $('#file_upload')[0].files[0];
          Dataproduct(key,fileName);
        });
      }

    });

    function Reardproduct(button, ID_dt) {
      var page = $('.pagination_link.current').attr('id');
      var id_brand = $('#brand').val();
      $.ajax({
        url: './get_data.php',
        method: 'POST',
        data: {
          id: ID_dt
        },
        dataType: 'json',
        success: function(response) {
          // Xử lý kết quả trả về từ server
          // Đưa dữ liệu vào các input tương ứng
          $('input[name="id_dt"]').val(response.ID_dienthoai);
          $('select[name="idthuonghieu"]').val(response.ID_thuonghieu);
          $('select[name="idncc"]').val(response.ID_ncc);
          $('input[name="tendt"]').val(response.Tendt);
          $('#image_preview').attr('src', '../../assets/img/' + response.Anhdt).attr('value', response.Anhdt);
          $('textarea[name="mota"]').val(response.Motadt);
          $('input[name="gia"]').val(response.Giadt);
          $('input[name="soluong"]').val(response.Soluong);
          $('input[name="luotxem"]').val(response.Luotxem);
          $('select[name="idkm"]').val(response.id_km);
          $('select[name="idbh"]').val(response.id_bh);
          $('input[name="active"]').prop('checked', response.trangthai=='Active');

        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
    }

    // function Dataproduct(key) {
    //   var page = $('.pagination_link.current').attr('id');
    //   var id_brand = $('#brand').val();
    //   var ID_dienthoai = $('#id_dt').val();
    //   var id_thuonghieu = $('#idthuonghieu').val();
    //   var id_nhacungcap = $('#idncc').val();
    //   regex = /^[0-9]+$/;
    //   if ($('#tendt').val() == '' || !regex.test($('#tendt').val())) {
    //     if ($('#tendt').next('span.error').length == 0) {
    //       // nếu chưa tồn tại, thêm thẻ <span> mới và đưa trỏ chuột vào trường
    //       $('#tendt').after('<span class="error">Vui lòng nhập tên đối tác</span>');
    //       $('#tendt').focus();
    //       $('#tendt').css('background-color', 'yellow');
    //     } else {
    //       // nếu đã tồn tại, chỉ cần cập nhật nội dung thẻ <span>
    //       $('#tendt').next('span.error').html('Vui lòng nhập tên đối tác');
    //     }
    //   } else {
    //     var Tendt = $('#tendt').val();
    //   }
    //   $('#tendt').on('input', function() {
    //     if ($('#tendt').next('span.error').length) {
    //       $('#tendt').next('span.error').remove();
    //       $('#tendt').css('background-color', 'transparent');
    //     }
    //   });

    //   var Anhdt = $('#image_preview').attr('value');
    //   var Mota = $('#mota').val();
    //   var Gia = $('#gia').val();
    //   var soluong = $('#soluong').val();
    //   var luotxem = $('#luotxem').val();
    //   var id_baohanh = $('#idbh').val();
    //   var id_km = $('#idkm').val();


    //   $.ajax({
    //     url: './insertproduct.php',
    //     method: 'POST',
    //     data: {
    //       key: key,
    //       ID_dienthoai: ID_dienthoai,
    //       id_thuonghieu: id_thuonghieu,
    //       id_nhacungcap: id_nhacungcap,
    //       Tendt: Tendt,
    //       Anhdt: Anhdt,
    //       Mota: Mota,
    //       Gia: Gia,
    //       soluong: soluong,
    //       luotxem: luotxem,
    //       id_baohanh: id_baohanh,
    //       id_km: id_km
          
    //     },
    //     success: function(data) {

    //       if (data.trim() == 'Edit success' || data.trim() == 'Insert success') {
    //         load_data(id_brand, page, '');
    //         alert(data.trim());

    //         $('#modal_dialog').modal('hide');
    //       }
    //     }
    //   });
    // }
    function Dataproduct(key, fileName) {
      $('button').on('click', function() {
  var key = $(this).data('key');
});
  var page = $('.pagination_link.current').attr('id');
  var id_brand = $('#brand').val();
  
  var formData = new FormData();
  var ID_dienthoai = $('#id_dt').val();
  var id_thuonghieu = $('#idthuonghieu').val();
  var id_nhacungcap = $('#idncc').val();
      
      if ($('#tendt').val() == '') {
        if ($('#tendt').next('span.error').length == 0) {
          $('#tendt').after('<span class="error">Vui lòng nhập tên điện thoại</span>');
          $('#tendt').focus();
          $('#tendt').css('background-color', 'yellow');
        } else {
          $('#tendt').next('span.error').html('Vui lòng nhập tên điện thoại');
        }
      } else {
        var Tendt = $('#tendt').val();
        formData.append('Tendt', Tendt);
      }
      if ($('#mota').val() == '') {
        if ($('#mota').next('span.error').length == 0) {
          $('#mota').after('<span class="error">Vui lòng nhập mô tả </span>');
          $('#mota').focus();
          $('#mota').css('background-color', 'yellow');
        } else {
          $('#mota').next('span.error').html('Vui lòng nhập mô tả ');
        }
      } else {
        var Mota = $('#mota').val();
        formData.append('Mota', Mota);
      }
      
      $('#tendt').on('input', function() {
        if ($('#tendt').next('span.error').length) {
          $('#tendt').next('span.error').remove();
          $('#tendt').css('background-color', 'transparent');
        }
      });
      $('#mota').on('input', function() {
        if ($('#mota').next('span.error').length) {
          $('#mota').next('span.error').remove();
          $('#mota').css('background-color', 'transparent');
        }
      });

   
  var image = $('#image_preview').attr('value');
  var Anhdt = $('#file_upload')[0].files[0];

  formData.append('Anhdt', Anhdt);
  var Mota = $('#mota').val();
  var Gia = $('#gia').val();
  var soluong = $('#soluong').val();
  var luotxem = $('#luotxem').val();
  var id_baohanh = $('#idbh').val();
  var id_km = $('#idkm').val();
  var active = $('input[name="active"]').prop('checked')? 'Active':'Not Active';
  formData.append('key', key);
  formData.append('ID_dienthoai', ID_dienthoai);
  formData.append('id_thuonghieu', id_thuonghieu);
  formData.append('id_nhacungcap', id_nhacungcap);
  // formData.append('Tendt', Tendt);
  // formData.append('Mota', Mota);
  formData.append('Gia', Gia);
  formData.append('soluong', soluong);
  formData.append('luotxem', luotxem);
  formData.append('id_baohanh', id_baohanh);
  formData.append('id_km', id_km);
  formData.append('image', image); 
  formData.append('active',active);

  $.ajax({
    url: './insertproduct.php',
    method: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function(data) {
      $('#test').html(data);
      if (data.trim() == 'Edit success' || data.trim() == 'Insert success') {
        load_data(id_brand, page, '');
        alert(data.trim());

        $('#modal_dialog').modal('hide');
      }
    }
  });
}

  });
</script>