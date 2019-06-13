@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhà cung cấp
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
                            <th>Mã nhà cung cấp</th>
                            <th>Tên nhà cung cấp</th>
							<th>Địa chỉ</th>
							<th>Điện thoại</th>
							<th>Email</th>
							<th>Trạng thái</th>
                            <th>Delete</th>
                            <th>Edit</th>
							<th>View more</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listItem as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->manhacungcap}}</td>
                            <td>{{$item->tennhacungcap}}</td>
							<td>{{$item->diachi}}</td>
							<td>{{$item->dienthoai}}</td>
							<td>{{$item->email}}</td>
							<td>{{$item->trangthai}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a >Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href=>Edit</a></td>
							<td class="center"><i class="fa fa-search fa-fw"></i> <a href=>View more</a></td>
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
