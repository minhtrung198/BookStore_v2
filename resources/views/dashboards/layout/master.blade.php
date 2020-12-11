<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
          <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Styles -->
        <style>
            html, body          {background-color: #fff; color: #636b6f; font-family: 'Nunito', sans-serif; font-weight: 200; height: 100vh; margin: 0;}

            .full-height        {height: 100vh;}

            .flex-center        {align-items: center; display: flex; justify-content: center;}

            .position-ref       {position: relative;}

            .top-right          {position: absolute; right: 10px; top: 18px;}

            .content            {text-align: center;}

            .title              {font-size: 84px;}

            .links > a          {color: #636b6f; padding: 0 25px; font-size: 13px; font-weight: 600; letter-spacing: .1rem; text-decoration: none; text-transform: uppercase;}

            .m-b-md             {margin-bottom: 30px;}

            .navbar-brand       {font-family: Brush Script MT; font-size: 38px;}

            .navbar-brand:hover {background: #698B3DFF;}

            .container101       {background: #E0E0E0FF; width: 100%; height: 70px; line-height: 70px; font-size: 17px;}

            .container102       {background: #C4C4C4FF; height: 40px; line-height: 40px;}

            h1                  {text-align: center;}

            form                {width: 50%; margin: 10px auto;}

            .role               {margin-left: 0px}
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{route('admin-dashboard')}}">Book Store</a>
                    </div>
            
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <!-- <ul class="nav navbar-nav">
                            <li><a href="{{route('dashboards.addresses.list_address')}}">Address</a></li>
                            <li><a href="{{route('dashboards.authors.list_author')}}">Author</a></li>
                            <li><a href="{{route('dashboards.categories.list_category')}}">Categories</a></li>
                            <li><a href="{{route('dashboards.orderAddresses.list_orderAddress')}}">Order Address</a></li>
                            <li><a href="{{route('dashboards.orderDetails.list_orderDetail')}}">Order Detail</a></li>
                            <li><a href="{{route('dashboards.orders.list_order')}}">Order</a></li>
                            <li><a href="{{route('dashboards.products.list_product')}}">Product</a></li>
                            <li><a href="{{route('dashboards.publishers.list_publisher')}}">Publisher</a></li>
                            <li><a href="{{route('dashboards.users.list_user')}}">User</a></li>
                            <li><a href="{{route('dashboards.roles.list_role')}}">Role</a></li>
                            <li><a href="{{route('dashboards.reviews.list_review')}}">Review</a></li>
                        </ul> -->
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Register</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
           <!--  <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav> -->
        </main>
         <footer class="page-footer font-small special-color-dark pt-4">

              <!-- Footer Elements -->
              <div class="container101">

                <!-- Social buttons -->
                <ul class="list-unstyled list-inline text-center">
                    <li><a href="https://laravel.com/docs">Docs</a></li>
                    <li><a href="https://laravel-news.com">News</a></li>
                    <li><a href="https://blog.laravel.com">Blog</a></li>
                    <li><a href="https://nova.laravel.com">Nova</a></li>
                    <li><a href="https://forge.laravel.com">Forge</a></li>
                    <li><a href="https://laracasts.com">Laracasts</a></li>
                    <li><a href="https://github.com/laravel/laravel">GitHub</a></li>
                </ul>
                <!-- Social buttons -->

              </div>
              <!-- Footer Elements -->
              <!-- Copyright -->
              <div class="container102">
                  <div class="footer-copyright text-center py-3">© 2020 Copyright:
                    <a href="#">Loc Nguyen Vo</a>
                  </div>
              </div>
              <!-- Copyright -->
            </footer>
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
         <script src="Hello World"></script>
    </body>
</html>

