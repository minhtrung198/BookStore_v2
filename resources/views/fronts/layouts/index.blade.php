
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Store - Unicorn</title>
        <!-- Bootstrap CSS -->
        <link href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        <!-- Google Fonts -->
        <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap')}}" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{asset('lib/slick/slick-theme.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/plugins.css')}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/main.css')}}" />
        <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <body>
    
        @include('fronts.home.header')
        @yield('content')
    </body>
    <footer>
        <!-- jQuery -->
        <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/slick/slick.min.js')}}"></script>
        
        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/ajax-mail.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
        <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        
        <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('.checkout-cart').click(function(){
                swal("Đăng nhập để tiếp tục"),{
                    buttons:["đăng nhập",true],
                }
            });
        });
        </script> -->
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
                    //alert(cart_name);
                    if(parseInt(cart_qty) > parseInt(cart_quantity)){
                        alert("Bạn đã đặt quá số lượng trong kho vui lòng đặt nhỏ hơn" +cart_quantity);
                    }else{
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
                            _token:_token
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
                    }
                 });
                
            });
        </script>
    </footer>
    
</html>
