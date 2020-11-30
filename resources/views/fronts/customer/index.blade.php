@extends('layouts.index')
@section('content')
    <div class="container" >
        <h1 class="text-center">Thông tin tài khoản</h1>
        <div class="tab-pane" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
            
            <div class="row">
                <div class="col-md-6">
                <h4>* Thông tin chi tiết</h4>
                    <p>Tên: {{$users->first_name}} {{$users->last_name}} </p>
                    <p>Email: {{$users->email}}</p>
                    <p>Số điện thoại: {{$users->phone}}</p>
                    <p>Địa chỉ: {{$users->address->street}}, {{$users->address->state}}, {{$users->address->city}}. </p>
                </div>
                
            </div>
        </div>
        <hr>
        <div class="tab-pane" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
            <h4>* Bạn muốn thay đổi thông tin?</h4>
            <form action="{{route('user-update',$users->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="row" >
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" name="first_name" value="{{$users->first_name}}" type="text" placeholder="First Name">
                </div>
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" name="last_name" value="{{$users->last_name}}" type="text" placeholder="Last Name">
                </div>
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" name="phone" value="{{$users->phone}}" type="text" placeholder="Điện thoại">
                </div>
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" name="email" value="{{$users->email}}" type="text" placeholder="Email">
                </div>
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" type="text" placeholder="Địa chỉ">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Update Account</button>
                    <br><br>
                </div>
                </form>
            </div>
            <h4>Thay đổi mật khẩu.</h4>
            <div class="row">
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" type="password" placeholder="Mật khẩu hiện tại">
                </div>
                <div class="col-md-6" style="padding:6px">
                </div>
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" type="text" placeholder="Mật khẩu mới">
                </div>
                <div class="col-md-6" style="padding:6px">
                    <input class="form-control" type="text" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
        
@endsection