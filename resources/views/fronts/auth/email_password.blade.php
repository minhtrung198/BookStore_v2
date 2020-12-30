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
    <?php $user = \Auth::user() ;?>
    
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vui lòng cung cấp email để lấy lại mật khẩu !') }}</div>
                <div class="col-md-6">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                <div class="card-body">
                    <form method="POST" action="{{route('send-reset-password')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Gửi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>