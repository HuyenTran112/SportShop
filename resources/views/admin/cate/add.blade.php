@section('title')
Thêm loại sản phẩm
@endsection
@extends('admin.master')
@section('content')

<body>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại sản phẩm
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                    <form action="{{route('admin.cate.getAdd')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
						
                        <div class="form-group">
                            <label>Tên loại sản phẩm</label>
                            <input class="form-control" name="txtCateName" placeholder="Nhập tên loại sản phẩm" />
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