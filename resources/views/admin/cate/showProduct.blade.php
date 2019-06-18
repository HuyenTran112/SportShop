@section('title')
Chi tiết loại sản phẩm
@endsection
@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Danh sách sản phẩm của nhóm {{$tenloaisp->tenloaisp}}</small>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->masp}}</td>
                            <td>{{$item->tensp}}</td>
							<?php
								$name=DB::table('loaisanpham')->where('maloaisp',$item->maloaisp)->first();
                           		echo "<td>{$name->tenloaisp}</td>";
							?>
							<td>{{$item->dongia}}</td>
							<td>{{$item->giakhuyenmai}}</td>
							<td>{{$item->mieuta}}</td>
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