@extends('fronts.customer.index')
@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="tab-content">
                            <!-- <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                            <form action="{{route('user-update',$users->id)}}" method="post">
                                @csrf
                                @method('PUT')
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Thông tin chi tiết</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="first_name" value="{{$users->first_name}}" placeholder="Họ">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="last_name" value="{{$users->last_name}}" placeholder="Tên">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="Địa chỉ" value="{{$users->address}}" placeholder="Địa chỉ">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="phone" value="{{$users->phone}}" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="email" value="{{$users->email}}" placeholder="Email">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Lưu</button>
                                        <br><br>
                                    </div>
                                </div>
                                <h4>Bạn muốn thay đổi mật khẩu</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


@endsection