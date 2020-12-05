<!-- Nav Bar Start -->
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
                            <a href="{{route('front-dashboard')}}" class="nav-item nav-link active">Trang chủ</a>|
                            <a href="{{route('list-product')}}" class="nav-item nav-link">Sản Phẩm</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                                <div class="dropdown-menu">
                                    @foreach($categories as $category)
                                        <a href="wishlist.html" class="dropdown-item">{{$category->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a href="" class="nav-item nav-link">Chi tiết sản phẩm</a>
                            <a href="{{route('show-cart')}}" class="nav-item nav-link">Giỏ hàng</a>
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
                                    <a href="{{route('user-detail',$user->id)}}" class="dropdown-item">Thông tin</a>
                                    <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->   