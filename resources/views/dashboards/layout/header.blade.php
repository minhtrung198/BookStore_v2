<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="{{route('admin-dashboard')}}">
        <img src="{{asset('./img/logo.png')}}" alt="img" width="200" height="50">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="{{asset('./img/danger.jpg')}}" >
            </a>
            <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="">
                <i class="fa fa-user"></i> Profile</a>
            <a class="dropdown-item" href="{{route('logout')}}">
                <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
</header>