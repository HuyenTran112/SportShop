@section('title')
Cập nhật nhà cung cấp
@endsection
@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                    <form action="{{route('admin.supplier.getEdit', $item->manhacungcap)}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Mã nhà cung cấp</label>
                            <input class="form-control" name="txtId" value="{{$item->manhacungcap}}" readonly/>
                            <label>Category Name</label>
                            <input class="form-control" name="txtName" value="{{$item->tennhacungcap }}" />
							<label>Địa chỉ</label>
                            <input class="form-control" name="txtAddress" value="{{$item->diachi }}" />
							<label>Điện thoại</label>
                            <input class="form-control" name="txtPhone" value="{{$item->dienthoai }}" />
							<label>Email</label>
                            <input class="form-control" name="txtEmail" value="{{$item->email }}" />
                            <label>Trạng thái  </label>
							@if($item->trangthai==1)
                           		<input  class="form-group"type="checkbox" id="myCheck" name='status' checked="checked">
							@else
								<input  class="form-group"type="checkbox"  name ="status" id="myCheck">
							@endif	
  
                        </div>
                        <button type="submit" class="btn btn-default">Edit</button>
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
