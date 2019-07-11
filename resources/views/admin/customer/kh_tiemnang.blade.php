@section('title')
Khách hàng tiềm năng
@endsection
@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách hàng tiềm năng
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                     {{--  Them hình thì cần enctype  --}}
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Từ ngày</label>
                            <input type ="date"name="txtTuNgay" placeholder="Chọn ngày" value="2019-07-12" id="tungay" />
							<label>Đến ngày</label>
							 <input type ="date"name="txtDenNgay" placeholder="Chọn ngày" value="2019-07-12" id="denngay"/>
							 </div>
						<div align="center">
						<button type="button" class="btn btn-default" id="thongke">Thống kê</button>&nbsp;&nbsp;&nbsp;<br />
					    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
						<script>
						$(document).ready(function(){
						  $("#thongke").click(function(){
							var ngaybd=$("#tungay").val();
							var ngaykt=$("#denngay").val();
							if(ngaybd>ngaykt)
								alert("Ngày bắt đầu phải lớn hơn ngày kết thúc");

							$.post("kh_tiemnang.php",{ngaybd:ngaybd, ngaykt:ngaykt },function(data,status){
							$(".baocao").html(data);

							});
						  });

						});
						</script>
						</br>
						<div class="col-lg-12 baocao">
						</div>
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
