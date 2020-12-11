
@section('content')
    <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
            <div class="promo-section-heading">
        <h2>Những Cuốn Sách Phổ Biến</h2>
    </div>
<div class="row">
    <!-- @foreach($products as $product) -->
    <div class="col-md-3">
        <div class="single-slide">
            <div class="product-card">
                <div class="product-header">
                    <!-- <a href="" class="author">
                        jpple
                    </a> -->
                </div>
                <div class="product-card--body">
                    <div class="card-image">
                        <img src="{{url(asset('./img'))}}/{{$product->image}}" alt="img">
                        <div class="hover-contents">
                            <a href="product-details.html" class="hover-image">
                            </a>
                            <div class="hover-btns">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" class="cart_id">
                                    <input type="hidden" value="{{$product->name}}" class="cart_name">
                                    <input type="hidden" value="{{$product->image}}" class="cart_image">
                                    <input type="hidden" value="{{$product->price}}" class="cart_price">
                                    <input type="hidden" value="1" class="cart_qty">
                                    
                                    <a href="{{route('product.detail',$product->id)}}" class="single-btn">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- <a href="{{route('product.detail',$product->id)}}" class="single-btn">
                                        <i class="fas fa-eye"></i>
                                    </a> -->
                                    <button type="button" class="single-btn add-to-cart" data-id="{{$product->id}}" name="add-to-cart">
                                        <i class="fas fa-shopping-basket"></i>
                                    </button>
                                </form>    
                            </div>
                        </div>
                    </div>
                    <div class="price-block">
                        <span class="price" style="font-size:15px;">{{number_format($product->price).' '.'vnđ'}}</span>
                        <h3><a href="product-details.html">{{$product->name}}</a></h3>

                       <!--  <del class="price-old">70.000VNĐ</del>
                        <br>
                        <span class="price-discount">Sale 20%</span> -->
                    </div>
                </div>
               
            </div>
        </div>
    </div>  
    <!-- @endforeach -->
</div>
<div class="center-block">{{$products->links()}}</div>

    
