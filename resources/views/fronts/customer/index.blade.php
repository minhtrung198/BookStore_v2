<?php $user = \Auth::user() ;?>
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
<div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{route('front-dashboard')}}" class="nav-item nav-link active">Trang chủ</a>
                            <a href="{{route('list-product')}}" class="nav-item nav-link">Sản Phẩm</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                                <div class="dropdown-menu">
                                    @foreach($categories as $category)
                                        <a href="{{route('cate-product',$category->id)}}" class="dropdown-item">{{$category->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{route('show-cartt')}}" class="nav-item nav-link">Giỏ hàng</a>
                            <a href="checkout.html" class="nav-item nav-link">Thanh toán</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Tài khoản</a>
                                <div class="dropdown-menu">
                                @if(!$user)
                                     <a href="{{route('login')}}" class="dropdown-item">Đăng nhập</a>
                                    <a href="{{route('register')}}" class="dropdown-item">Đăng kí</a>
                                    @else
                                    <a href="#" class="dropdown-item">Hi! {{\Auth::user()->first_name}}</a>
                                    <a href="{{route('user-infomation',$user->id)}}" class="dropdown-item">Thông tin</a>
                                    <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
            @if (session()->has('message'))
                    <div class="alert alert-success center-block" role="alert" style="width: 300px;">
                    <h4 align="center" style="color:black;font-size: 16px;">{{ session()->get('message') }}</h4>
                    </div>
            @endif
       
        <!-- Nav Bar End -->      
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="#">Tài Khoản</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- My Account Start -->
        <div class="my-account">
            
           <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><button type="button"><i class="fa fa-user"></i>Thông tin tài khoản</button></a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Lịch sử đơn hàng</a>
                            <a class="nav-link" href="index.html"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane  show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h2>Thông tin tài khoản</h2>
                                <form action="{{route('user-update',$users->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Họ</label>
                                        <input class="form-control" type="text" value="{{$users->first_name}}" name="first_name" placeholder="Họ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tên</label>
                                        <input class="form-control" type="text" value="{{$users->last_name}}" name="last_name" placeholder="Tên">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Số điện thoại</label>
                                        <input class="form-control" type="text" value="{{$users->phone}}" name="phone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <input class="form-control" type="email" value="{{$users->email}}" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-md-12">
                                         <label for="">Địa chỉ</label>
                                        <input class="form-control" type="text" value="{{$users->address}}" name="address" placeholder="Địa chỉ">
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <button class="btn">Lưu</button>
                                        <br><br>
                                    </div> -->
                                </div>
                                <!-- <h4>Thay đổi mật khẩu</h4> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Mật khẩu hiện tại</label>
                                        <input class="form-control" name="password" type="password" placeholder="Mật khẩu hiện tại">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Mật khẩu mới</label>
                                        <input class="form-control" name="password" type="password" placeholder="Mật khẩu mới">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nhập lại mật khẩu</label>
                                        <input class="form-control" type="password" name="password_confirm" placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Lưu</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- My Account End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="img/godaddy.svg" alt="Payment Security" />
                            <img src="img/norton.svg" alt="Payment Security" />
                            <img src="img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
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
    </body>
</html>
