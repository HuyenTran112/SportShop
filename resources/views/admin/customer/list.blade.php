@section('title')
Danh sách user khách hàng
@endsection
@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>Danh sách khách hàng</small>
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
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
								<th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($listItem as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->makh}}</td>
                            <td>{{$item->tenkh}}</td>
							<td>{{$item->diachi}}</td>
							 <td>{{$item->sodt}}</td>
							<td>{{$item->email}}</td>
							<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.customer.showBill', $item->makh)}}">Xem chi tiết</a></td>
							
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