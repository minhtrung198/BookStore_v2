@extends('fronts.layouts.index')

@section('content')
<div class="col-md-12">
    <div class="col-md-3">
        @include('fronts.home.menubar')

    </div>

    <div class="col-md-8">
        <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                <div class="promo-section-heading">
            <h2>Sách Theo Thể Loại</h2>
        </div>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
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
                                    <input type="hidden" value="{{$product->id}}" class="cart_id_{{$product->id}}">
                                    <input type="hidden" value="{{$product->name}}" class="cart_name_{{$product->id}}">
                                    <input type="hidden" value="{{$product->image}}" class="cart_image_{{$product->id}}">
                                    <input type="hidden" value="{{$product->price}}" class="cart_price_{{$product->id}}">
                                    <input type="hidden" value="1" class="cart_qty_{{$product->id}}">
                                    
                                    <a href="{{route('product.detail',$product->id)}}" class="single-btn">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- <a href="{{route('product.detail',$product->id)}}" class="single-btn">
                                        <i class="fas fa-eye"></i>
                                    </a> -->
                                    <button type="submit" class="single-btn add-to-cart" data-id_product="{{$product->id}}" name="add-to-cart">
                                        <i class="fas fa-shopping-basket"></i>
                                    </button>
                                </form>    
                            </div>
                        </div>
                    </div>
                    <div class="price-block">
                        <span class="price" style="font-size:15px;">{{number_format($product->price).' '.'vnđ'}}</span>
                        <h3><a href="{{route('product.detail',$product->id)}}">{{$product->name}}</a></h3>

                       <!--  <del class="price-old">70.000VNĐ</del>
                        <br>
                        <span class="price-discount">Sale 20%</span> -->
                    </div>
                </div>
               
            </div>
        </div>
    </div>  
        @endforeach
    </div>
    </div>
    {{$products->links()}}
</div>
   
@endsection
    
