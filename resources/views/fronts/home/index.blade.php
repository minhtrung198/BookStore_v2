
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
    
        @include('fronts.home.header')
        @include('fronts.home.slideBar')
        @include('fronts.product.index')
        @yield('content')
        @include('fronts.product.listProduct')
        @include('fronts.home.footer')
        
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
        <script src="{{asset('js/sweetalert.min.js')}}"></script>
        <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.add-to-cart').click(function(){
                   var id=$(this).data('id');//khi click vao btn thi lay id dau tien, this la btn
                   var cart_id = $('.cart_id').val();
                   var name = $('.cart_name').val();
                   var image = $('.cart_image').val();
                   var quantity_storage = $('.quantity_storage').val();
                   var price = $('.cart_price').val();
                   var quantity = $('.cart_qty').val();
                   var _token = $('input[name="_token"]').val();
                   if(parseInt(quantity_storage) > parseInt(quantity) ){
                       alert("Bạn đã đặt quá số lượng hiện có!", "Vui lòng đặt lại cho phù hợp!");
                   }
                   else{
                        $.ajax({
                            url:'{{url('/add-cart-ajax')}}',
                            method: 'POST',
                            data:{
                                cart_id: cart_id,
                                name: name,
                                price:price,
                                quantity:quantity,
                                quantity_storage:quantity_storage,
                                image:image,
                                _token: _token
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
                                    window.location.href = "{{url('/show-cartt')}}";
                                });
                                //swal("Here's a message!")
                                 //alert(data);
                            }
                        });
                   }
                });
            });
        </script>
        
    </body>
</html>
