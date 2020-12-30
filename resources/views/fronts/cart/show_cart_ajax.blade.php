@extends('fronts.layouts.index')
@section('content')
@include('fronts.home.menubar')

<div class="cart-page">
            <div class="container-fluid">
                <div class="row" style="margin-top: -289px;margin-left: 300px">
                    <div class="col-md-12">
                   
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                            <form action="{{route('update-cart')}}" method="post">
                                @csrf
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Tên sách</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @if (Session::get('cart'))
                                         @foreach(Session::get('cart') as $key => $cart)
                                            <tr>
                                                <td>
                                                    <div class="img">
                                                        <a href="#"><img src="{{asset('img/'.$cart['image'])}}" width="50px" alt="Image"></a>
                                                        <p>{{$cart['name']}}</p>
                                                        <!-- <input type="hidden" class="cart_id" value="{{$cart['product_id']}}"> -->
                                                    </div>
                                                </td>
                                                <td>{{number_format($cart['price'])}} VNĐ</td>
                                                <td>
                                                    <div class="qty">
                                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                        <input type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['qty']}}" autocomplete="off" min="1" max="50">
                                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                        <input type="hidden" value="" name="rowId_cart">
                                                    </div>
                                                </td>
                                                @php
                                                    $subtotal = $cart['price']*$cart['qty'];
                                                    $total += $subtotal;
                                                @endphp
                                                <td>{{number_format($subtotal)}} VNĐ</td>
                                                <td><a href="{{route('delete-cart',$cart['session_id'])}}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        @endif
                                        
                                    </tbody>
                                </table>
                            
                                <div class="btn btn-default cart-btn" style="float: right;background-color: #FF6F61;color:white;width:127px;">
                                    <button type="submit">Cập nhập giỏ hàng</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container-fluid">
            <div class="col-lg-6" style="margin-left: 430px;">
                        <div class="cart-page-inner" >
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="coupon">
                                        <input type="text" placeholder="Coupon Code">
                                        <button>Mã khuyến mãi</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Tổng đơn hàng</h1>
                                            <p>Tổng tiền<span>{{number_format($total)}} VNĐ</span></p>
                                            <p>Tiền ship <span><img src="img/free-delivery.png" width="40px" height="40px" alt=""></span></p>
                                            <h2>Thành Tiền<span>{{number_format($total)}} VNĐ</span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <!-- <form action="{{route('show-checkout')}}" method="post">
                                                @csrf -->
                                            <a href="{{route('show-checkout')}}"><button style="width: 115px;">Thanh Toán</button></a>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
</div>
    <!-- Footer Start -->
    <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Thông tin liên lạc</h2>
                            <div class="contact-info" style="width: 295px;" >
                                <p><i class="fa fa-map-marker"></i>12 Quang Trung, Hải Châu, Đà Nẵng</p>
                                <p><i class="fa fa-envelope" style="margin-right: 54px"></i>unicornbook@example.com</p>
                                <p><i class="fa fa-phone" style="    margin-right: 153px;"></i>+123-456-7890</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Theo dõi chúng tôi</h2>
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
                            <h2>Thông tin công ty</h2>
                            <ul>
                                <li><a href="#">Về công ty</a></li>
                                <li><a href="#">Chính sách riêng tư</a></li>
                                <li><a href="#">Điều khoản-Điều kiện</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Thông tin thanh toán</h2>
                            <ul>
                                <li><a href="#">Chính sách thanh toán</a></li>
                                <li><a href="#">Chính sách vận chuyển</a></li>
                                <li><a href="#">Chính sách hoàn trả</a></li>
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
@endsection
