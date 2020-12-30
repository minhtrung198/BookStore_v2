    <!-- Bottom Bar Start -->
            <div class="bottom-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('get-search')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="search">
                                @if(isset($key_word))
                                <input type="text" name="key" id="keywords" value="{{Request::get('key')}}" placeholder="TÌm kiếm sản phẩm">
                                <div id="search_ajax"></div>
                                @else
                                <input type="text" name="key" id="keywords" placeholder="TÌm kiếm sản phẩm">
                                <div id="search_ajax"></div>
                                @endif
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                            </form>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="user">
                                <a href="wishlist.html" class="btn wishlist">
                                    <i class="fa fa-heart"></i>
                                    <span>(0)</span>
                                </a>
                                <a href="cart.html" class="btn cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>(0)</span>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- Bottom Bar End -->       
            
            <!-- Main Slider Start -->
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
                                        <a class="nav-link" href="{{route('cate-product',$category->id)}}"><i class="fa fa-book"></i>{{$category->name}}</a>
                                        @endforeach
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-book"></i>Tiếng Anh</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-book"></i>Khoa Học</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-book"></i>Văn Học</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-book"></i>Tiểu thuyết</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-book"></i>Kỹ Năng Sống</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-book"></i>Văn Hóa - Địa Lý</a>
                                    </li> -->
                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-6">
                            <div class="header-slider normal-slider">
                                <div class="header-slider-item">
                                    <img src="img/bannerbook.jpg" alt="Slider Image" />
                                    <div class="header-slider">
                                        
                                    </div>
                                </div>
                                <div class="header-slider-item">
                                    <img src="img/bannerbook2.jpg" alt="Slider Image" />
                                    <div class="header-slider">
                                    <img src="img/bannerbook6.jpg" alt="Slider Image" />
                                    </div>
                                </div>
                                <div class="header-slider-item">
                                    <img src="img/bannerbook3.jpg" alt="Slider Image" />
                                    <div class="header-slider">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="header-img">
                                <div class="img-item">
                                    <img src="img/bannerbook4.jpg" />
                                    
                                </div>
                                <div class="img-item">
                                    <img src="img/bannerbook5.jpg" />
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Slider End -->
        <!-- Brand Start -->
    
            <!-- Category End-->    
    <!-- Call to Action Start -->
    <!-- <div class="call-to-action">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1>call us for any queries</h1>
                        </div>
                        <div class="col-md-6">
                            <a href="tel:0123456789">+012-345-6789</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Call to Action End -->     
