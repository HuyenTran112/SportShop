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
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt hàng</th>
							<th>Địa chỉ giao hàng</th>
                            <th>Tổng giá</th>
                            <th>Trạng thái</th>
							<th>Xác nhận</th>
							<th>Thanh toán</th>
							<th>Hủy</th>
                             <th>Chi tiết </th>
                            <!-- <th>Edit</th>  -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listItem as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->sohd}}</td>
                            <td>{{$item->tenkh}}</td>
                            <td>{{$item->ngayhd}}</td>
                            <td>{{$item->diachigiaohang}}</td>
                            <td>{{$item->tongtien}}</td>
                                @if($item->trangthai == 1)
                                   <td style="color:#3300FF"><b> Đã xác nhận</b></td>
                                 @endif
								 @if($item->trangthai==0)
								 	<td style="color:#FF0000"><b>Chờ xác nhận</b></td>
                             	@endif
								@if($item->trangthai==2)
									<td style="color:#0066FF"><b>Đã thanh toán</b></td>
                             	@endif
							<td class="center"><i class="fa fa-check-square"></i> <a href={{route('admin.bill.getUpdateBill',$item->sohd)}}>Xác nhận</a></td>
							 <td class="center"><i class="fa fa-money"></i> <a href={{route('admin.bill.getCheckBill',$item->sohd)}}>Thanh toán</a></td>
							 <td class="center"><i class="fa fa-trash-o"></i> <a href={{route('admin.bill.getDeleteBill',$item->sohd)}}>Hủy</a></td>
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
