<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <main>
  <form action="{{route('register')}}" method="POST">
    @csrf 
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <!-- <img src="assets/images/logo.svg" alt="logo" class="logo"> -->
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Đăng Kí</h1>
                <div class="form-group">
                    <label for="name">Họ <span style="color:red">*</span></label>
                    <input type="text" name="first_name"  id="name" class="form-control"  value="{{old('first_name')}}" placeholder="Tran ">
                    @if($errors->has('first_name'))
                      <p style="color:red">{{$errors->first('first_name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Tên <span style="color:red">*</span></label>
                    <input type="text" name="last_name" id="name"  class="form-control"  value="{{old('last_name')}}" placeholder="Van A">
                    @if($errors->has('last_name'))
                      <p style="color:red">{{$errors->first('last_name')}}</p>
                    @endif
                </div>
              <div class="form-group">
                <label for="email">Email <span style="color:red">*</span></label>
                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="email@example.com">
                @if($errors->has('email'))
                      <p style="color:red">{{$errors->first('email')}}</p>
                    @endif
              </div>
              <div class="form-group">
                    <label for="name">Số điện thoại <span style="color:red">*</span></label>
                    <input type="integer" name="phone" id="name"  class="form-control" value="{{old('phone')}}" placeholder="0123456789">
                    @if($errors->has('phone'))
                      <p style="color:red">{{$errors->first('phone')}}</p>
                    @endif
                </div>
              <div class="form-group mb-4">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu">
                @if($errors->has('password'))
                      <p style="color:red">{{$errors->first('password')}}</p>
                    @endif
              </div>
              <div class="form-group mb-4">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" id="" class="form-control" placeholder="Địa chỉ">
              </div>
              @if(session()->has('fail'))
                    <p style="color: red">{{session()->get('fail')}}</p>
              @endif
              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Đăng Kí">
            <a href="{{route('login')}}" class="forgot-password-link">Đăng nhập</a>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="img/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
    </form>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
