@extends('fronts.layouts.index')
@section('content')
<div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <h2>Danh mục sản phẩm</h2>
                                    </li>
                                    <li class="nav-item">
                                        @foreach($categories as $category)
                                        <a class="nav-link" href="{{route('cate-product',$category->id)}}"><i class="fa fa-book"></i>{{$category->name}}<span>(12)</span></a>
                                        @endforeach
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-9">
                        <div class="product-detail-top">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="product-slider-single normal-slider">
                    <img src="{{url(asset('./img'))}}/{{$products->image}}" alt="Producdt Image">
                </div>
                
            </div>
            <div class="col-md-6">
                <form action="{{route('save-cart')}}" method="post">
                    @csrf
                    <div class="product-content">
                        <div class="title"><h2>{{($products->name)}} </h2></div>
                        <div class="price">
                            <span>Giá: {{number_format($products->price)." ".'VNĐ'}}</span>
                        </div>
                        <div class="quantity">
                            <div class="qty">
                                <h3>Số lượng:</h3>
                                <!-- <button class="btn-minus"><i class="fa fa-minus"></i></button> -->
                                <input name="qty" type="number" min="1" style="width:50px;" value="1">
                                <input name="product_id_hidden" type="hidden" style="width:50px;" value="{{$products->id}}">
                                <!-- <button class="btn-plus"><i class="fa fa-plus"></i></button> -->
                                <!-- <span class="currency">sadsa</span> -->
                                <input type="hidden" name="product_name" class="product_name" value="{{$products->name}}">
                                <input type="hidden" name="product_price" class="product_price" value="{{$products->price}}">
                                <input type="hidden" name="quantity_storage" class="quantity_storage" value="{{$products->quantity}}">
                                <input type="hidden" name="product_image" class="product_image" value="{{$products->image}}">
                            </div>
                        </div>
                    <div>
                
                        <br>
                    </div>    
                    <div class="action">
                        <button type="submit" class="btn btn-default add-to-cart"><i class="add-to-cart"></i>Thêm Vào Giỏ</button>
                        <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Mua Ngay</a>
                    </div>
                </form>
                    <br>
                    <p><b>Tình trạng:</b> Còn hàng</p>
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
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item"  style="background-color: #77acd9;font-weight: bold;font-size: 17px;" >
                                <a class="nav-link active" data-toggle="pill" href="#description">Mô tả sản phẩm</a>
                            </li>
                            <li class="nav-item"  style="background-color: #77acd9;font-weight: bold;font-size: 17px;">
                                <a class="nav-link" data-toggle="pill" href="#reviews">Reviews</a>
                            </li>
                        </ul>

                <div class="tab-content">
                    <div id="description" class="container tab-pane active">
                        <h3>Tên sách: {{$products->name}}</h3><hr>
                        <h3>Tác giả: {{$products->author->name}}</h3><hr>
                        <h3>Nhà cung cấp: {{$products->publisher->name}}</h3><br>
                        <p>{{$products->description}}</p>
                    </div>
                    <div id="reviews" class="container tab-pane fade">
                        <div class="reviews-submitted">
                            <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                            </p>
                        </div>
                        <div class="reviews-submit">
                            <h4>Give your Review:</h4>
                            <div class="ratting">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="row form">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" placeholder="Email">
                                </div>
                                <div class="col-sm-12">
                                    <textarea placeholder="Review"></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button>Submit</button>
                                </div>
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


        
@endsection
