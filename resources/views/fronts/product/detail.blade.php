@extends('fronts.layouts.index')
@section('content')
<div class="header">
                <div class="container-fluid">
                        <div class="col-md-3">
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <h2>Danh mục sản phẩm</h2>
                                    </li>
                                    <li class="nav-item">
                                        @foreach($categories as $category)
                                        <a class="nav-link" href="{{route('cate-product',$category->id)}}"><i class="fa fa-book"></i>{{$category->name}}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </nav>
                        </div>
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="product-slider-single normal-slider">
                    <img src="{{url(asset('./img'))}}/{{$products->image}}" alt="Producdt Image">
                </div>
                
            </div>
            <div class="col-md-6">
                <form>
                    @csrf
                    <input type="hidden" value="{{$products->id}}" name="product_id" class="cart_id_{{$products->id}}">
                    <input type="hidden" value="{{$products->name}}" name="product_name" class="cart_name_{{$products->id}}">
                    <input type="hidden" value="{{$products->image}}" name="product_image" class="cart_image_{{$products->id}}">
                    <input type="hidden" value="{{$products->price}}" name="product_price" class="cart_price_{{$products->id}}">
                    <input type="hidden" value="{{$products->quantity}}" name="product_quantity" class="cart_quantity_{{$products->id}}">
                    <div class="product-content">
                        <div class="title"><h2>{{($products->name)}} </h2></div>
                        <div class="price">
                            <span>Giá: {{number_format($products->price)." ".'VNĐ'}}</span>
                        </div>
                        <div class="quantity">
                            <div class="qty">
                                <h3>Số lượng:</h3>
                                <!-- <button class="btn-minus"><i class="fa fa-minus"></i></button> -->
                                <input name="qty" type="number" min="1" style="width:50px;" class="cart_qty_{{$products->id}}" value="1">
                                <!-- <input type="hidden" value="{{$products->qty}}" name="product_qty" class="cart_qty_{{$products->id}}"> -->
                            </div>
                        </div>
                    <div>
                
                        <br>
                    </div>    
                    <div class="action">
                    <button type="submit" class="btn btn-single add-to-cart" data-id_product="{{$products->id}}" name="add-to-cart">
                        <i class="add-to-cart"></i>Thêm Vào Giỏ
                        </button>
                        <a href="{{route('show-cartt')}}"><button type="button" class="btn btn-default"><i ></i>Đến Giỏ Hàng</button></a>
                    </div>
                </form>
                    <br>
                    <p><b>Tình trạng:</b> Còn hàng</p>
                    <p><b>Số lượng trong kho :</b> {{$products->quantity}} quyển</p>
				    <p><b>Thể loại:</b> {{$products->categories['name']}}</p>
                </div>
            </div>
                    <div class="row">
                    <div class="col-lg-8"><br></div>
                    <div class="col-lg-8"><br></div>
                    <div class="col-lg-8"><br></div>
                    <div class="col-lg-8"><br></div>
                    <div class="col-lg-8"><br></div>
                    <div class="col-lg-8"><br></div>
                    <div class="col-lg-8"><br></div>
                    <div class="col-lg-8"><br></div>
                </div>
                <div class="row product-detail-bottom">
                    <div class="col-md-8">
                        <ul class="nav nav-pills nav-justified" style="width: 594px;">
                            <li class="nav-item"  style="background-color: #77acd9;font-weight: bold;font-size: 17px;" >
                                <a class="nav-link active" data-toggle="pill" href="#description">Mô tả sản phẩm</a>
                            </li>
                            <li class="nav-item"  style="background-color: #77acd9;font-weight: bold;font-size: 17px;">
                                <a class="nav-link" data-toggle="pill" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                    </div>
                <div class="tab-content">
                    <div id="description" class="container tab-pane active">
                        <h4>Tên sách: {{$products->name}}</h4><hr>
                        <h4>Tác giả: {{$products->author->name}}</h4><hr>
                        <h4>Nhà cung cấp: {{$products->publisher->name}}</h4><br>
                        <h4>Mô tả chi tiết sản phẩm:</h4><br>
                        <p>{{$products->description}}</p>
                    </div>
                    <div id="reviews" class="container tab-pane fade">
                        <div class="reviews-submitted">
                            <br><!-- <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div> -->
                        </div>
                        <div class="reviews-submit">
                            <div class="row form">
                                @if(Auth::user())
                                <form action="{{route('comment',$products->id)}}" method="POST">
                                    @csrf
                                <div class="col-md-12">
                                    <h4>Viết bình luận... <span class="glyphicon glyphicon-pencil"></span></h4>
                                        <div class="form-group" style="width: 730px;">
                                            <textarea placeholder="Bình luận ..." class="form-control" name="comment" rows="3"></textarea>
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn-primary" style="width: 50px;height: 30px;" type="submit">Gửi</button>
                                </div>
                                </form>
                                @endif
                                @foreach($products->comment as $cm)
                                <div class="col-md-12 media">
                                    <a href="#" class="pull-left">
                                        <img src="http://placehold.it/64x64" alt="Ảnh">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$cm->user->first_name}}
                                            <small>{{$cm->created_at}}</small>
                                        </h4>
                                        {{$cm->comment}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>
        </div>
        </div>
    </div>
</div>
    
<!--                    
              
    <div class="col-lg-4 sidebar">
        <div class="sidebar-widget widget-slider">
            <div class="sidebar-slider normal-slider">
                <div class="product-item">
                    <div class="product-title">
                        <a href="#">Product Name</a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.html">
                            <img src="img/thieunhi2.jpg" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span>$</span>99</h3>
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product-title">
                        <a href="#">Product Name</a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.html">
                            <img src="img/product-9.jpg" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span>$</span>99</h3>
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product-title">
                        <a href="#">Product Name</a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.html">
                            <img src="img/product-8.jpg" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span>$</span>99</h3>
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                    </div>
                </div>
            </div>
            </div>
            
            <div class="sidebar-widget tag">
                <h2 class="title">Tags Cloud</h2>
                <a href="#">Lorem ipsum</a>
                <a href="#">Vivamus</a>
                <a href="#">Phasellus</a>
                <a href="#">pulvinar</a>
                <a href="#">Curabitur</a>
                <a href="#">Fusce</a>
                <a href="#">Sem quis</a>
                <a href="#">Mollis metus</a>
                <a href="#">Sit amet</a>
                <a href="#">Vel posuere</a>
                <a href="#">orci luctus</a>
                <a href="#">Nam lorem</a>
            </div>
        </div>
    </div>   -->


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
