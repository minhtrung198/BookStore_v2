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
                                <input type="text" name="key" id="keywords"  placeholder="Tìm kiếm sản phẩm">
                                <div id="search_ajax"></div>
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
        <div class="brand">
                <div class="container-fluid">
                    <div class="brand-slider">
                        <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                    </div>
                </div>
            </div>
            <!-- Brand End -->      
            
            <!-- Feature Start-->
            <!-- <div class="feature">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fab fa-cc-mastercard"></i>
                                <h2>Secure Payment</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fa fa-truck"></i>
                                <h2>Worldwide Delivery</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fa fa-sync-alt"></i>
                                <h2>90 Days Return</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fa fa-comments"></i>
                                <h2>24/7 Support</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Feature End-->      
            
            <!-- Category Start-->
            <!-- <div class="category">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="category-item ch-400">
                                <img src="img/category-3.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="category-item ch-150">
                                <img src="img/category-6.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                            <div class="category-item ch-250">
                                <img src="img/category-7.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="category-item ch-400">
                                <img src="img/banner.png" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            
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