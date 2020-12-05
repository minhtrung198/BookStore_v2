@extends('fronts.layouts.index')


@section('content')
@include('fronts.home.menubar')
<?php $user = \Auth::user() ;?>
<div class="cart-page">
            <div class="container-fluid">
                <div class="row" style="margin-top: -289px;margin-left: 300px">
                    <div class="col-md-12">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                @php
                                    $content=Cart::content();
                                @endphp
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
                                        @foreach($content as $cart)
                                        
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{ URL::to('/img/'.$cart->options->image) }}" width="50px" alt="Image"></a>
                                                    <p>{{$cart->name}}</p>
                                                </div>
                                            </td>
                                            <td>{{number_format($cart->price).' '.'vnđ'}}</td>
                                            <td>
                                                <div class="qty">
                                                <form action="{{route('update-to-cart-quantity')}}" method="post">
                                                @csrf
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" name="cart_quantity" value="{{$cart->qty}}">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                    <input type="hidden" value="{{$cart->rowId}}" name="rowId_cart">
                                                </div>
                                            </td>
                                            <td> 
                                                @php
                                                    $subtotal = $cart->price * $cart->qty;
                                                @endphp
                                                {{number_format($subtotal).' '.'vnđ'}}
                                                
                                            </td>
                                            <td><a href="{{route('delete-to-cart',$cart->rowId)}}">
                                                    <button type="submit" name="update-cart"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                        @endforeach
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
                                            <p>Tổng tiền<span>{{Cart::Subtotal().' '.'vnđ'}}</span></p>
                                            <p>Tiền ship<span>Miễn phí</span></p>
                                            <h2>Thành Tiền<span>{{Cart::Subtotal().' '.'vnđ'}}</span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            
                                        @if(!$user)
                                            
                                            <a href=""><button class="checkout-cart" style="width: 115px;">Thanh Toán</button></a>
                                        @else
                                            <a href="{{route('show-checkout')}}" class=""><button style="width: 115px;">Thanh Toán</button></a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
</div>
    <!-- Footer Start -->
    <div class="footer col-lg-12" >
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
       
       
@endsection
