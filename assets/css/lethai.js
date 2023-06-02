


// // //  Search product
//  $(document).ready(function() {
//     // Bind keyup event to live_search input
//     $("#live_search").keyup(function() {
//         var input = $(this).val();
//         if (input != '') {
//             // Call load_data function with default page value
//             load_data(1, input);
//         } 
//         else {
//             $("#pagination_data").html("");
//         }
//     });

//     function load_data(page, input) {
//         $.ajax({
//             url: "./templeProducts/livesearch.php",
//             method: "POST",
//             data: {
//                 input: input,
//                 page: page,
//             },
//             success: function(data) {
//                 $('#pagination_data').html(data);
//             },
//             error: function(xhr, status, error) {
//                 console.log(error);
//             }
//         });
//     }

//     // Bind click event to pagination links
//     $(document).on('click', '.pagination_link', function() {
//         var page = $(this).attr("id");
//         load_data(page, $("#live_search").val());
//     });
// });


//* HIển thị sản phẩm và tìm kiếm theo danh mục
// $(document).ready(function() {
//     filter_data();
//     // Bind keyup event to live_search input
//     $("#live_search").keyup(function() {
//         var input = $(this).val();
//         var brand = get_filter('brand');
//         if (input != '') {
//             // Call load_data function with default page value
//             load_data(1, input, brand);
//         } else {
//             filter_data();
//         }
//     });

//     function load_data(page, input, brand) {
//         var action = 'fetch_data';
//         var value = $("#sort_price").val();
//         $.ajax({
//             url: "./templeProducts/fetch_data.php",
//             method: "POST",
//             data: {
//                 action:action,
//                 brand: brand,
//                 page: page,
//                 input: input,
//                 value: value
//             },
//             success: function(data) {
//                 $('#pagination_data').html(data);
//             },
//             error: function(xhr, status, error) {
//                 console.log(error);
//             }
//         });
//     }

//     function get_filter(class_name) {
//         var filter = [];
//         $('.' + class_name + ':checked').each(function() {
//             filter.push($(this).val());
//         });
//         return filter;
//     }

//     $('.common_selector').click(function() {
//         filter_data();
//     });

//     function filter_data(page) {
//         var brand = get_filter('brand');
//         var input = $("#live_search").val();
//         var value = $("#sort_price").val();
//         $.ajax({
//             url: "./templeProducts/fetch_data.php",
//             method: "POST",
//             data: {
//                 action: 'fetch_data',
//                 brand: brand,
//                 page: page,
//                 input: input,
//                 value: value
//             },
//             success: function(data) {
//                 $('#pagination_data').html(data);
//             }
//         });
//     }

//     $('#sort_price').change(function() {
//         filter_data();
//     });

//     $('#a1, #a2').click(function() {
//         var value = $(this).html();
//         var brand = get_filter('brand');
//         $.ajax({
//             url: "./templeProducts/fetch_data.php",
//             method: "POST",
//             data: {
//                 value: value,
//                 brand: brand,
//             },
//             success: function(data) {
//                 $('#pagination_data').html(data);
//             }
//         });
//     });

//     // Bind click event to pagination links
//     $(document).on('click', '.pagination_link', function() {
//         var page = $(this).attr("id");
//         filter_data(page);
//     });
// });



// $(document).ready(function() {
//     filter_data();
// function filter_data(page) {
//     var action = 'fetch_data';
//     var brand = get_filter('brand');
//     var value = get_filter('value');
//     $.ajax({
//         url: "./templeProducts/fetch_data.php",
//         method: "POST",
//         data: {
//             action: action,
//             brand: brand,
//             page: page,
//             value: value
//         },
//         success: function(data) {
//             $('#pagination_data').html(data);
//         }
//     });
// }

// function get_filter(class_name) {
//     var filter = [];
//     $('.' + class_name + ':checked').each(function() {
//         filter.push($(this).val());
//     });
//     return filter;
// }

// $('.common_selector').click(function() {
//     // $('.common_selector').not(this).prop('checked', false);
//     filter_data();
// });

// $('#a1, #a2').click(function() {
//     var value = $(this).html();
//     var brand = get_filter('brand');
//     $.ajax({
//         url: "./templeProducts/fetch_data.php",
//         method: "POST",
//         data: {
//             value: value,
//             brand: brand,
//         },
//         success: function(data) {
//             $('#pagination_data').html(data);
//         }
//     });
// });
// $(document).on('click', '.pagination_link', function() {
//             var page = $(this).attr("id");
//             filter_data(page, $("#pagination_data").val());
//         });
// });


// tìm kiếm theo khoảng giá ajax
// $(document).ready(function(){
//     $('.filter-price-select-item').click(function(){
//         var priceRange = $(this).find('span').text();
//         var priceLow = priceRange.split("-")[0] * 1000000;
//         var priceHight = priceRange.split("-")[1].replace('triệu','') * 1000000;
//         $.ajax({
//             url:'./templeProducts/price.php',
//             method:"POST",
//             data:{
//                 priceLow:priceLow, 
//                 priceHight:priceHight   
//             },
//             success:function(data){
//                 $("#pagination_data").html(data);
//             },
//             error:function(xhr,status,error){
//                 console.log(error);
//             }
//         });
//     });
//     $('#minPrice,#maxPrice').keyup(function() {
//         var regex = /^\d+$/; // regex để kiểm tra giá trị là số nguyên dương
  
//         var priceLow = $("#minPrice").val();
//         var priceHight = $("#maxPrice").val();
        
//         if (!regex.test(priceLow)) {
//           $("#minPrice").addClass("invalid-input"); 
            
//         } else {
//           $("#minPrice").removeClass("invalid-input"); // loại bỏ lớp CSS nếu giá trị hợp lệ
          
//         }
        
//         if (!regex.test(priceHight)) {
//           $("#maxPrice").addClass("invalid-input"); 
//         } else {
//           $("#maxPrice").removeClass("invalid-input"); // loại bỏ lớp CSS nếu giá trị hợp lệ
          
//         }
       
//         $.ajax({
//             url:'./templeProducts/price.php',
           
//           type: "POST", 
         
//           data: {
//              priceLow: priceLow,
//              priceHight: priceHight
//             },
//           success: function(data) {
//             $("#pagination_data").html(data);
//           },
//           error: function(xhr, status, error) {
//             console.log(error);
//           }
//         });
//       });
// });

$(document).ready(function() {
    filter_data();
    // Bind keyup event to live_search input
    $("#live_search").keyup(function() {
        var input = $(this).val();
        var brand = get_filter('brand');
        
        if (input != '') {
            // Call load_data function with default page value
            load_data(1, input, brand);
        } else {
            filter_data();
        }
    });

    function load_data(page, input, brand) {
        var action = 'fetch_data';
        var value = $("#sort_price").val();
        $.ajax({
            url: "./templeProducts/fetch_data.php",
            method: "POST",
            data: {
                
                action:action,
                brand: brand,
                page: page,
                input: input,
                value: value
                
            },
            success: function(data) {
                $('#pagination_data').html(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function() {
        filter_data();
       
    });

    function filter_data(page) {
        var brand = get_filter('brand');
        var input = $("#live_search").val();
        var value = $("#sort_price").val();
        $.ajax({
            url: "./templeProducts/fetch_data.php",
            method: "POST",
            data: {
                action: 'fetch_data',
                brand: brand,
                page: page,
                input: input,
                value: value
            },
            success: function(data) {
                $('#pagination_data').html(data);
            }
        });
    }

    $('#sort_price').change(function() {
        filter_data();
    });

    $('#a1, #a2').click(function() {
        var value = $(this).html();
        var brand = get_filter('brand');
        $.ajax({
            url: "./templeProducts/fetch_data.php",
            method: "POST",
            data: {
                value: value,
                brand: brand
            },
            success: function(data) {
                $('#pagination_data').html(data);
            }
        });
    });

    $('.filter-price-select-item').click(function(){
        var priceRange = $(this).find('span').text();
        var priceLow = priceRange.split("-")[0] * 1000000;
        var priceHight = priceRange.split("-")[1].replace('triệu','') * 1000000;
        var brand = get_filter('brand');
        var input = $("#live_search").val();
        $("#live_search").val('');
        $.ajax({
            url:'./templeProducts/fetch_data.php',
            method:"POST",
            data:{
                brand:brand,
                input:input,
                priceLow:priceLow, 
                priceHight:priceHight
            },
            success:function(data){
                $("#pagination_data").html(data);
            },
            error:function(xhr,status,error){
                console.log(error);
            }
        });
        document.querySelector('#minPrice').value = priceLow;
        document.querySelector('#maxPrice').value = priceHight;
    });

    $('#minPrice,#maxPrice').keyup(function() {
       
        var regex = /^\d+$/; // regex để kiểm tra giá trị là số nguyên dương
  
        var priceLow = $("#minPrice").val() * 1000000;
        var priceHight = $("#maxPrice").val()* 1000000;
        var brand = get_filter('brand');
        var input = $("#live_search").val();
        $("#live_search").val('');
        
        if (!regex.test(priceLow)) {
          $("#minPrice").addClass("invalid-input"); 
            
        } else {
          $("#minPrice").removeClass("invalid-input"); 
          
        }
        
        if (!regex.test(priceHight)) {
          $("#maxPrice").addClass("invalid-input"); 
        } else {
          $("#maxPrice").removeClass("invalid-input"); 
          
        }
        if(priceLow >= priceHight){
            $("#maxPrice").addClass("invalid-input");
        }else {
            $("#maxPrice").removeClass("invalid-input"); 
        }
        $.ajax({
            url:'./templeProducts/fetch_data.php',
           
          type: "POST", 
         
          data: {
                  brand:brand,
                priceLow:priceLow, 
                priceHight:priceHight,
                input:input
            },
          success: function(data) {
            $("#pagination_data").html(data);
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });

    // Bind click event to pagination links
    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        filter_data(page);
    });
});

