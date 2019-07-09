@section('title')
Loại sản phẩm
@endsection
@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại sản phẩm
                        <small>Danh sách loại sản phẩm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="col-lg-12">
                                @if(Session::has('flash_message'))
                                     <div class="alert alert-{{Session::get('flash_level')}}">
                                         {{ Session::get('flash_message')}}
                                    </div>
                                 @endif
                        </div>
                    <thead>
                        <tr align="center">
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Xóa</th>
                            <th>Cập nhật</th>
							<th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listItem as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->maloaisp}}</td>
                            <td>{{$item->tenloaisp}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacNhanXoa('Bạn có xác nhận xóa?')" href="{{route('admin.cate.getDelete', $item->maloaisp)}}">Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.cate.getEdit', $item->maloaisp)}}">Cập nhật</a></td>
							<td class="center"><i class="fa fa-search fa-fw"></i> <a href="{{route('admin.cate.showProduct', $item->maloaisp)}}">Xem chi tiết</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
