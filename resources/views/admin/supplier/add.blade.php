@extends('admin.master')
@section('content')
<body>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhà cung cấp
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                    <form action="{{route('admin.supplier.getAdd')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên nhà cung cấp</label>
                            <input class="form-control" name="txtName" placeholder="Nhập tên nhà cung cấp" />
							<label>Địa chỉ</label>
                            <input class="form-control" name="txtAddress" placeholder="Nhập địa chỉ nhà cung cấp" />
							<label>Điện thoại</label>
                            <input class="form-control" name="txtPhone" placeholder="Nhập điện thoại nhà cung cấp" />
							<label>Email</label>
                            <input class="form-control" name="txtEmail" placeholder="Nhập email nhà cung cấp" />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
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