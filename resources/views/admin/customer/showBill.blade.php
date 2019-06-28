@section('title')
Danh sách đơn hàng
@endsection
@extends('admin.master')
@section('content')
    <!-- Page Content -->
	<form method="get">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa đơn
                        <small>Danh sách hóa đơn</small>
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
                            <th>Số hóa đơn</th>
                            <th>Ngày đặt hàng</th>
							<th>Địa chỉ giao hàng</th>
                            <th>Tổng giá</th>
							<th>Phí giao hàng</th>
							<th>Tổng thanh toán</th>
                            <th>Trạng thái</th>
                             <th>Chi tiết </th>
                            <!-- <th>Edit</th>  -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bill as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->sohd}}</td>
                            <td>{{$item->ngayhd}}</td>
                            <td>{{$item->diachigiaohang}}</td>
                            <td>{{$item->tongtien}}</td>
							<td>{{$item->phigiaohang}}</td>
							<td>{{$item->tongthanhtoan}}</td>
                            <td >
                                @if($item->trangthai == 1)
                                    Đã xác nhận
                                 @endif
								 @if($item->trangthai==0)
								 	Chờ xác nhận
                             	@endif
								@if($item->trangthai==2)
									Đã thanh toán
                             	@endif
							 </td>
							 
                            <td class="center"><i class="fa fa-search fa-fw"></i> <a href="{{route('admin.bill.showBillDetail',$item->sohd)}}">Xem chi tiết</a></td> 
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
	</form>
@endsection