@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                        <form action="{{route('admin.user.getAdd')}}" method="POST"> 
                            @include('admin.blocks.error')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{--  Địa chỉ email  --}}
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input class="form-control" name="txtEmail" placeholder="Please Enter Email" />
                            </div>
                            {{--  Mật khẩu  --}}
                            <div class="form-group">
                                <label>Password (*)</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                            </div>
                            {{--  Nhập lại mật khẩu  --}}
                            <div class="form-group">
                                <label>RePassword (*)</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                            </div>
                            {{--  Họ tên  --}}
                            <div class="form-group">
                                <label>Name (*)</label>
                                <input type="text" class="form-control" name="txtName" placeholder="Please Enter Name" />
                            </div>
                            {{--  Giới tính  --}}
                            <div class="form-group">
                                <label>Gender</label>
                                <input type="text" class="form-control" name="txtGender" placeholder="Please Enter Gender" />
                            </div>
                            {{--  Địa chỉ  --}}
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Address" />
                            </div>
                            {{--  Số điện thoại  --}}
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control" name="txtPhoneNumber" placeholder="Please Enter Phone Number" />
                            </div>
                            {{--  <div class="form-group">
                                <label>Gender</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div>  --}}
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
   