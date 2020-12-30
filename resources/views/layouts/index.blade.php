
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Store - Unicorn</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
        <link rel="stylesheet" href="css/sweetalert.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
        @include('layouts.header')
        @include('layouts.slidebar')
        @yield('content')
        
        @include('layouts.footer')

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/ajax-mail.js"></script>
        <script src="js/custom.js"></script>
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <script src="{{asset('js/sweetalert.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#sort').on('change',function(){
                    var url = $(this).val();
                    //alert(url);
                    if(url){
                        window.location = url;
                    }
                    return false;
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.add-to-cart').click(function(){
                    var id = $(this).data('id_product');
                    var cart_id = $('.cart_id_'+id).val();
                    var cart_name = $('.cart_name_'+id).val();
                    var cart_image = $('.cart_image_'+id).val();
                    var cart_price = $('.cart_price_'+id).val();
                    var cart_quantity = $('.cart_quantity_'+id).val();
                    var cart_qty = $('.cart_qty_'+id).val();
                    var _token = $('input[name="_token"]').val();
                    //alert(id);
                    $.ajax({
                        url: "{{route('add-cart')}}",
                        method: 'POST',
                        data:{
                            cart_id:cart_id,
                            cart_name:cart_name,
                            cart_image:cart_image,
                            cart_price:cart_price,
                            cart_qty:cart_qty,
                            cart_quantity:cart_quantity,
                            _token:_token,
                        },
                        success:function(data){
                            swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{route('show-cartt')}}";
                            });
                        }
                    });

                });
            });
        </script>
         <script type="text/javascript">
            $('#keywords').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{route('searchcomplete')}}",
                        method: "POST",
                        data: {query:query, _token:_token},
                        success:function(data){
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        }
                    });
                }else{
                    $('#search_ajax').fadeOut();
                }
            });
            $(document).on('click','.li_search', function(){
                $('#keywords').val($(this).text());
                $('#search_ajax').fadeOut();
            });
        </script>
       
    </body>
</html>
