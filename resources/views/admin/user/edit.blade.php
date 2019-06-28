@section('title')
Cập nhật user
@endsection
@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Cập user admin</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                        <form action="{{route('admin.user.getEdit',$username->id)}}" method="POST"> 
                            @include('admin.blocks.error')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{--  Địa chỉ email  --}}
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input class="form-control" name="txtEmail" value="{{$username->email}}"placeholder="Please Enter Email" disabled />
                            </div>
                            {{--  Mật khẩu cũ  --}}
                            <div class="form-group">
                                <label>Password (*)</label>
                                <input type="password" class="form-control" name="txtPass"  placeholder="Please Enter Password" />
                            </div>
                            {{--  Mật khẩu mới --}}
                            <div class="form-group">
                                <label>RePassword (*)</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                            </div>
                            {{--  Tên hiện thị  --}}
                            <div class="form-group">
                                <label>Tên hiện thị</label>
                                <input type="text" class="form-control" name="txtName" value="{{$username->tenhienthi}}" placeholder="Please Enter Name" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">User Edit</button>
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
   