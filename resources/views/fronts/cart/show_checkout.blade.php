@extends('fronts.layouts.index')
@section('content')
    <body>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thanh toán</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Địa chỉ thanh toán</h2>
                                <div class="row">
                                    <form action="{{route('save-checkout')}}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                        <p style="color:red">{{ $errors->first('fullname') }}</p>
                                            <label>Họ tên <span style="color:red">*</span></label>
                                            @if(\Auth::user()!= null)
                                                <input name="fullname" value="{{ \Auth::user()->last_name. ' '.\Auth::user()->first_name }}" class="form-control" type="text" placeholder="">
                                            @else
                                            <input class="form-control" type="text" placeholder="Họ tên" name="fullname" value="">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                        <p style="color:red">{{ $errors->first('email') }}</p>
                                            <label>E-mail</label>
                                            @if(\Auth::user() != null)
                                                <input name="email" value="{{ \Auth::user()->email }}" class="form-control" type="text" placeholder="">
                                            @else
                                            <input class="form-control" type="text" placeholder="E-mail" name="email" value="{{ old('email') }}">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                        <p style="color:red">{{ $errors->first('phone') }}</p>
                                            <label>Số điện thoại <span style="color:red">*</span></label>
                                            @if(\Auth::user() != null)
                                            <input name="phone" value="{{ \Auth::user()->phone }}" class="form-control" type="text" placeholder="">
                                            @else
                                            <input class="form-control" type="text" placeholder="Số điện thoại" name="phone" value="{{ old('phone') }}">
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <label>Địa chỉ <span style="color:red">*</span></label>
                                            @if(Auth::user() != null)
                                            <input name="address" value="{{ \Auth::user()->address }}" class="form-control" type="text" placeholder="">
                                            @else
                                            <input class="form-control" type="text" placeholder="Địa chỉ" name="address">
                                            @endif
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <label>Quốc gia</label>
                                            <input class="form-control" type="text" placeholder="" readonly  name="" value="Việt Nam">
                                            <select class="custom-select">
                                                <option selected>United States</option>
                                                <option>Afghanistan</option>
                                                <option>Albania</option>
                                                <option>Algeria</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Thành phố</label>
                                            <input class="form-control" type="text" placeholder="City">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Quận</label>
                                            <input class="form-control" type="text" placeholder="State">
                                        </div> -->
                                        <div class="col-md-12">
                                            <label>Ghi chú</label>
                                            <input class="form-control" type="textarea" name="notes" placeholder="Ghi chú">
                                        </div>
                                        <div class="col-md-12 checkout-payment">
                                            <div class="col-md-6 checkout-btn">
                                                <button class="btn checkout-btn" name="checkout">Thanh Toán</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="shipping-address">
                                <h2>Shipping Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Họ <span style="color:red">*</span></label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tên <span style="color:red">*</span>"</label>
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Số điện thoại <span style="color:red">*</span></label>
                                        <input class="form-control" type="text" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Địa chỉ <span style="color:red">*</span></label>
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Quốc gia</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Thành phố</label>
                                        <input class="form-control" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Quận</label>
                                        <input class="form-control" type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" placeholder="ZIP Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                 @php
                                    $content=Cart::content();
                                    $cartqty=Cart::count();
                                @endphp
                                <h1>Tổng Hóa Đơn</h1>
                                <p>Số lượng<span>{{$totalQuantity}}</span></p>
                                <p class="sub-total">Thuế VAT<span>0 đ </span></p>
                                <p class="ship-cost">Phí ship<span><img src="img/free-delivery.png" width="40px" height="40px" alt=""></span></p>
                                <p class="ship-cost">Tổng Tiền<span><b>{{number_format($totalPayment)}} VNĐ</b></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->
        
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
@endsection