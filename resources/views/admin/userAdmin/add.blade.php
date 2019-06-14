@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">UserAdmin
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('admin.userAdmin.getAdd')}}" method="POST"> 
                            @include('admin.blocks.error')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{--  Tài khoản user  --}}
                            <div class="form-group">
                                <label>Username (*)</label>
                                <input class="form-control" name="txtUsername" placeholder="Please Enter Username" />
                            </div>
                            {{--  Mật khẩu  --}}
                            <div class="form-group">
                                <label>Password (*)</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                            </div>
                            {{--  Nhập lại mất khẩu  --}}
                            <div class="form-group">
                                <label>RePassword (*)</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                            </div>
                            {{--  Phân quyền 0 là superAdmin , 1 là Admin , 2 là member  --}}
                            <div class="form-group">
                                <label>Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div>
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
   