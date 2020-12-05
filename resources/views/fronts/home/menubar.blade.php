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
                    </div>
</div>                   
