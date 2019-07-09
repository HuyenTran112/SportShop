<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- CKEditor -->
    <script src="{{url('templateEditor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <div class="navbar-brand"></div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
					<?php
							$id=Auth::user()->id;
						?>
                        <li><a href="{{route('admin.user.getEdit',$id)}}"><i class="fa fa-user fa-fw"></i>&nbsp;{{Auth::user()->tenhienthi}}</a>
                        </li>
                        <li><a href="{{route('trang-chu')}}"><i class="fa fa-gear fa-fw"></i>Trang chủ</a>
                        </li>
						
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!--<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>-->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Loại sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.cate.list')}}">Danh sách loại sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.cate.getAdd')}}">Thêm loại sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i>Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.product.list')}}">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.product.getAdd')}}">Thêm sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
							<?php
								$count=DB::table('hoadon')->where('trangthai',0)->count();
							?>
							@if($count>0)
                            <a href="{{route('admin.bill.showBill')}}"><i class="glyphicon glyphicon-list-alt"></i>Đơn hàng <b>({{$count}})</b><span class="fa"></span></a>
							@else
							 <a href="{{route('admin.bill.showBill')}}"><i class="glyphicon glyphicon-list-alt"></i>Đơn hàng<span class="fa arrow"></span></a>
							 @endif
                            
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Công ty<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.supplier.list')}}">Danh sách công ty</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.supplier.getAdd')}}">Thêm công ty</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-book"></i>Báo cáo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.report.BaoCaoDoanhThu')}}">Báo cáo doanh thu</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.report.BaoCaoSanPham')}}">Sản phẩm bán chạy</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.customer.list')}}">Danh sách khách hàng</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.customer.kh_tiemnang')}}">Khách hàng tiềm năng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
							@if(Auth::user()->level==1)
                            <a href="#"><i class="fa fa-users fa-fw"></i>User admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.user.list')}}">Danh sách user</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.user.getAdd')}}">Thêm user</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        @yield('content')
    	<div class="col-lg-7">
			@if(Session::has('flash_message'))
				<div class="alert alert-{{Session::get('flash_level')}}">
					{{Session::get('flash_message')}}
				</div>
			@endif
		</div>
	</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('public/admin/js/myscript.js')}}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

    function xacNhanXoa(msg) {
        if(window.confirm(msg)) {
            return true;
        }
        else
            return false;
    };
	$("div.alert").delay(3000).slideUp();
    </script>
</body>
</html>