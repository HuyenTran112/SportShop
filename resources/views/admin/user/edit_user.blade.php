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
                                <input class="form-control" name="txtEmail" value="{{$username->email}}"placeholder="Please Enter Email" disabled readonly/>
                            </div>
                            {{--  Tên hiện thị  --}}
                            <div class="form-group">
                                <label>Tên hiện thị</label>
                                <input type="text" class="form-control" name="txtName" value="{{$username->tenhienthi}}" placeholder="Please Enter Name" readonly/>
                            </div>
                            {{--  Level  --}}
                            <div class="form-group">
                                <label>Level</label>
								@if($username->level==1)
									<label class="radio-inline">
									<input name="rdoLevel" value="1" checked="" type="radio">Admin
									</label>
									<label class="radio-inline">
										<input name="rdoLevel" value="2" type="radio">Member
									</label>
								@else
									<label class="radio-inline">
									<input name="rdoLevel" value="1"  type="radio">Admin
									</label>
									<label class="radio-inline">
										<input name="rdoLevel" value="2" checked="" type="radio">Member
									</label>

								@endif
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
   