@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bill
                        <small>Show Bill</small>
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
                            <th>Đã thanh toán</th>
                            <th>Trạng thái</th>
                             <th>Chi tiết </th>
                            <!-- <th>Edit</th>  -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listItem as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->sohd}}</td>
                            <td>{{$item->makh}}</td>
                            <td>{{$item->ngayhd}}</td>
                            <td>{{$item->diachigiaohang}}</td>
                            <td>{{$item->tongtien}}</td>
							<td>{{$item->trangthai}}</td>
                            <td>
                                @if($item->trangthai == 0)
                                    Chưa thanh toán
                                    @else
                                    Đã thanh toán
                             @endif</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Thanh toán</a></td> 
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Xem chi tiết</a></td> 
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