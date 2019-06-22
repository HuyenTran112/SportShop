@extends('admin.master')
@section('title')
Báo cáo sản phẩm bán chạy
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm bán chạy
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                     {{--  Them hình thì cần enctype  --}}
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Từ ngày</label>
                            <input type ="date"name="txtTuNgay" placeholder="Chọn ngày" value="2019-06-17" id="tungay" />
							<label>Đến ngày</label>
							 <input type ="date"name="txtDenNgay" placeholder="Chọn ngày" value="2019-06-17" id="denngay"/>
							 </div>
							 <div class="form-group">
							<label>Loại sản phẩm</label>
								<select class="form-control maloaisp"name="maloaisp">
									<option value="0">Tất cả sản phẩm</option>
									 @foreach($list as $item)
                                        <option value="{{$item->maloaisp}}">{{$item->tenloaisp}}</option>
                                    @endforeach
									
								</select>
								
                        </div>
						<div align="center">
						<button type="button" class="btn btn-default" id="thongke">Thống kê</button>&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-default" onclick="" id="inbaocao">In báo cáo</button>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
						<script>
						$(document).ready(function(){
						  $("#thongke").click(function(){
							var maloaisp=$(".maloaisp").val();
							var ngaybd=$("#tungay").val();
							var ngaykt=$("#denngay").val();
							//alert(ngaykt);
							
							$.post("bc_sanpham.php",{ maloaisp:maloaisp, ngaybd:ngaybd, ngaykt:ngaykt },function(data,status){
							$(".baocao").html(data);  
							
							});
						  });
						   $("#inbaocao").click(function(){
						   		alert("In báo cáo");
						   	});
						});
						</script>

                        </div>
						<br />
						<div class="baocao">
						</div>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

