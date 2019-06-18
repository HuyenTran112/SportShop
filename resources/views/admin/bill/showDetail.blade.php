@section('title')
Thông tin đơn hàng
@endsection
@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn hàng<br />
                        <small>Thông tin khách hàng</small>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="col-lg-12">
                                @if(Session::has('flash_message'))
                                     <div class="alert alert-{{Session::get('flash_level')}}">
                                         {{ Session::get('flash_message')}}
                                    </div>
                                 @endif
                        </div>
       					<div class="col-lg-12">
                        <tr>
                            <td><b>Tên khách hàng</b></td>
                            <td>{{$customer->tenkh}}</td>
                        </tr>
						 <tr>
                            <td><b>Số điện thoại</b></td>
                            <td>{{$customer->sodt}}</td>
                        </tr>
						 <tr>
                            <td><b>Địa chỉ</b></td>
                            <td>{{$customer->diachi}}</td>
                        </tr>
						 <tr>
                            <td><b>Email</b></td>
                            <td>{{$customer->email}}</td>
                        </tr>
						 <tr>
                            <td><b>Ngày đặt hàng</b></td>
                            <td>{{$bill->ngayhd}}</td>
                        </tr>
						 <tr>
                            <td><b>Địa chỉ giao hàng</b></td>
                            <td>{{$bill->diachigiaohang}}</td>
                        </tr>
						 <tr >
                            <td><b>Ghi chú</b></td>
                            <td>{{$bill->ghichu}}</td>
                        </tr>
                    </div>
					
                </table>
				<!-- /.col-lg-12 -->
				<h1 class="page-header">
                        <small>Thông tin đơn hàng</small>
                    </h1>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="col-lg-12">
                                @if(Session::has('flash_message'))
                                     <div class="alert alert-{{Session::get('flash_level')}}">
                                         {{ Session::get('flash_message')}}
                                    </div>
                                 @endif
                        </div>
                    <thead>
                        <tr class="even gradeC" align="center">
							<th align="center">STT</th>
                            <th align="center">Tên Sản phẩm</th>
                            <th align="center">Số lượng</th>
                            <th align="center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $stt=1;?>
                        @foreach($list as $item)
                        <tr class="even gradeC" align="center">
                            <?php $name = DB::table('sanpham')->where('masp',$item->masp)->first(); 
							echo "<td>".$stt."</td>";
							$stt++;?>
                            <td>{{$name->tensp}}</td>
                            <td>{{$item->soluong}}</td>
                           	<td>{{$item->thanhtien}}</td>
							
                        </tr>
                        @endforeach
						<tr class="even gradeC" align="center">
							<td colspan="3" align="right"><b>Tổng tiền</b></td>
							<td>{{$bill->tongtien}}</td>
						</tr>
                    </tbody>
                </table>
				<div align="right">
				 <button type="button" class="btn btn-default"  onclick="window.print();return false;">In đơn hàng</button>
				</div>
				</br>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection