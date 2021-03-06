	<link rel="icon" type="image/png" href="image/favicon.png"/>
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.png"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" href="{{URL::asset("css/main.css")}}">
	<link rel="stylesheet" href="{{URL::asset("css/style1.css")}}">
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<!--Free shipping for standard order over $100-->
					</div>

					<div class="right-top-bar flex-w h-full">
					@if(Auth::check())
						<a class="flex-c-m p-lr-10 trans-04 tenhienthi" style="color:#d9d9d9" idUser="{{Auth::user()->manguoidung}}">
							Chào bạn ({{Auth::user()->tenhienthi}}) 							
						</a>
						@if(Auth::user()->level!=0)
							<a href="{{route('admin.bill.showBill')}}" class="flex-c-m p-lr-10 trans-04" style="color:#d9d9d9">
							<?php
								$count=DB::table('hoadon')->where('trangthai','0')->count();
							?>
							@if($count>0)
								Settings ({{$count}})	
							@else
								Settings
							@endif				
							</a>
						@endif

						<a href="{{route('logout')}}" class="flex-c-m p-lr-10 trans-04">
							Đăng xuất
						</a>
					@else
						<a href="{{route('login')}}" class="flex-c-m p-lr-10 trans-04">
							Đăng nhập
						</a>

						<a href="{{route('signin')}}" class="flex-c-m p-lr-10 trans-04">
							Đăng ký
						</a>
					@endif

					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<div class="logo" style="height:90px;">
						<img src="image/logo1.png" alt="IMG-LOGO">
						<!-- <img src="images/icons/logo-01.png" alt="IMG-LOGO"> -->						
					</div>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="{{route('trang-chu')}}">Trang chủ</a>
								
							</li>

							<li>
								<a >Sản phẩm</a>
                                <ul class="sub-menu">
									@foreach($loai as $l)
									<li><a href="{{route('loai-san-pham',$l->maloaisp)}}">{{$l->tenloaisp}}</a></li>
									@endforeach
								</ul>
							</li>

							<li>
								<a href="{{route('gioithieu')}}">Giới thiệu</a>
							</li>

							<li>
								<a href="{{route('lienhe')}}">Liên hệ</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
                                            
                        <form class="example" style="margin:auto;max-width:700px" method="get" action="{{route('search')}}">
                            <input type="text" placeholder="Search.." name="key">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="@if(Session::has('cart')){{Session('cart')->totalQty}} @else 0 @endif ">
							<a href="{{route('giohang')}}"><i class="zmdi zmdi-shopping-cart"></i></a>
						</div>
					</div>                   
				</nav>
			</div>	
		</div>
<!-- *************************************************************************************************** -->
		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href=""><img src="image/logo1.png" alt="IMG-LOGO"></a>
				<!-- <a href=""><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a> -->
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="@if(Session::has('cart')){{Session('cart')->totalQty}} @else 0 @endif">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">

				<li>
					<div class="right-top-bar flex-w h-full">
					
					@if(Auth::check())
						<a class="flex-c-m p-lr-10 trans-04" style="color:#d9d9d9">
							Chào bạn ({{Auth::user()->tenhienthi}}) 							
						</a>
						@if(Auth::user()->level!=0)
							<a href="{{route('admin.bill.showBill')}}" class="flex-c-m p-lr-10 trans-04" style="color:#d9d9d9">
							<?php
								$count=DB::table('hoadon')->where('trangthai','0')->count();
							?>
							@if($count>0)
								Settings ({{$count}})	
							@else
								Settings
							@endif				
							</a>
						@endif

						<a href="{{route('logout')}}" class="flex-c-m p-lr-10 trans-04">
							Đăng xuất
						</a>
					@else
						<a href="{{route('login')}}" class="flex-c-m p-lr-10 trans-04">
							Đăng nhập
						</a>

						<a href="{{route('signin')}}" class="flex-c-m p-lr-10 trans-04">
							Đăng ký
						</a>
					@endif

					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="{{route('trang-chu')}}">Trang chủ</a>
					
				</li>

				<li>
					<a>Sản phẩm</a>
                        <ul class="sub-menu-m">
						@foreach($loai as $l)
							<li><a href="{{route('loai-san-pham',$l->maloaisp)}}">{{$l->tenloaisp}}</a></li>
						@endforeach
						</ul>
                            <span class="arrow-main-menu-m">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
							</span>
				</li>

				<li>
					<a href="{{route('gioithieu')}}">Giới thiệu</a>
				</li>

				<li>
					<a href="{{route('lienhe')}}">Liên hệ</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="key" placeholder="Search...">
				</form>
			</div>
		</div>
                      
                
	</header>