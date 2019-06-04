@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>List</small>
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
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Giá khuyến mãi</th>
							<th>Miêu tả</th>
							<th>Trạng thái</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listItem as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->masp}}</td>
                                <td>{{$item->tensp}}</td>
                                <td>{{$item->tenloaisp}}</td>
                                <td> 
                                    {{number_format($item->dongia, 3)}} VND 
                             
                                </td>
                                <td>
                                    {{number_format($item->giakhuyenmai, 3)}} VND
                                </td>
                                <td>{{$item->mieuta}}</td>
								<td>{{$item->trangthai}}</td>
								<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="" href="">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Edit</a></td>
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
