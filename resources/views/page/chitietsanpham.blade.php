@extends('layout.index')
@section('title')
Chi tiết sản phẩm
@endsection
@section('content')
<!-- Product -->
</br>
</br>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="image/{{$sanpham->hinhanh}}">
									<div class="wrap-pic-w pos-relative">
										<img src="image/{{$sanpham->hinhanh}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="image/{{$sanpham->hinhanh}}" >
									<div class="wrap-pic-w pos-relative">
										<img src="image/{{$sanpham->hinhanh}}" alt="IMG-PRODUCT"  />

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="image/{{$sanpham->hinhanh}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="image/{{$sanpham->hinhanh}}">
									<div class="wrap-pic-w pos-relative">
										<img src="image/{{$sanpham->hinhanh}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$sanpham->tensp}}
						</h4>

						<span class="mtext-106 cl2">
							@if($sanpham->giakhuyenmai==0)
                               	 	<span class="flash-sale" style="font-size:15px"><b>{{number_format($sanpham->dongia)}} đồng</b></span>
                           		 @else
								 	<span class="flash-sale" style="font-size:15px"><b>{{number_format($sanpham->giakhuyenmai)}} đồng</b></span>&ensp;&ensp;&ensp;
                                	<span class="flash-del" style="font-size:15px"><b>{{number_format($sanpham->dongia)}} đồng</b></span>
                            	@endif
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{$sanpham->mieuta}}
						</p>

						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<?php
									$count_color=DB::table('mausac')->join('sanpham_mausac','mausac.mamau','=','sanpham_mausac.mamau')->where('masp','=',$sanpham->masp)->count();
								?>
								@if($count_color>0)
								
								<div class="size-203 flex-c-m respon6">
									Màu sắc
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
									<?php
										$color=DB::table('mausac')->join('sanpham_mausac','mausac.mamau','=','sanpham_mausac.mamau')->where('masp','=',$sanpham->masp)->get();
									?>
										<select class="color" name="color">
											
											@foreach($color as $item)
											{
												<option value="{{$item->mamau}}">{{$item->tenmau}}</option>	
											}
											@endforeach
											
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
								
								@endif
							</div>

							<div class="flex-w flex-r-m p-b-10">
							<?php
									$count_size=DB::table('size')->join('sanpham_size','size.masize','=','sanpham_size.masize')->where('masp','=',$sanpham->masp)->count();
								?>
								@if($count_size>0)
								
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
									<?php
										$size=DB::table('size')->join('sanpham_size','size.masize','=','sanpham_size.masize')->where('masp','=',$sanpham->masp)->get();
									?>
										<select class="size" name="size">
											
											@foreach($size as $item)
											{
												<option value="{{$item->masize}}">{{$item->tensize}}</option>	
											}
											@endforeach
											
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
								
								@endif
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" style="width: 45px; height: 100%; cursor: pointer">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" style="width: 45px; height: 100%; cursor: pointer">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									
									<a ><button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id = "{{$sanpham->masp}}">
										Thêm vào giỏ hàng
									</button></a>
								</div>
							</div>
						</div>					
				</div>
			</div>

		
	</section>
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Sản phẩm tương tự
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				@foreach($sp_tuongtu as $sp)
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="image/{{$sp->hinhanh}}"  height="300px" alt="IMG-PRODUCT" >

								<a href="{{route('chitietsanpham',$sp->masp)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Chi tiết
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{route('chitietsanpham',$sp->masp)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{$sp->tensp}}
									</a>

									<span class="stext-105 cl3">
										@if($sp->giakhuyenmai==0)
                               	 	<span class="flash-sale" style="font-size:14px"><b>{{number_format($sp->dongia)}} đồng</b></span>
                           		 @else
								 	<span class="flash-sale" style="font-size:14px"><b>{{number_format($sp->giakhuyenmai)}} đồng</b></span>&ensp;&ensp;
                                	<span class="flash-del" style="font-size:14px"><b>{{number_format($sp->dongia)}} đồng</b></span>
                            	@endif

								
									</span>
									
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

@endsection
@section('script')
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".color").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});
		$(".size").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>

	$(document).ready(function(){
		$(".btn-num-product-down").click(function(){
			var numProduct = Number($(this).next().val());
			if(numProduct > 1) $(this).next().val(numProduct - 1);
		});

		$('.btn-num-product-up').click(function(){
			var numProduct = Number($(this).prev().val());
        	$(this).prev().val(numProduct + 1);
		});
	});
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				
				var id = $(this).attr('id');		
				var token = $("input[name='_token']").val();
				var mamau = $(".color option:selected").val();
				if (typeof mamau == "undefined")
					mamau = 1;	
				var masize = $(".size option:selected").val();
				if (typeof masize == "undefined")
					masize = 1;	
				
				var soluongsp = Number($(this).parent().parent().find('.num-product').val());
				
				var sl = Number($(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find('.js-show-cart').attr('data-notify'));
				sl += soluongsp;
				$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find('.js-show-cart').attr('data-notify', sl);
				$.ajax({
					
					url: 'cart/add/' + id +'/' + mamau + '/' + masize + '/' + soluongsp,
					type: 'GET',
					cache: false,
					data: {"_token":token, "id": id},
						success:function (data){
							if(data == 'oke'){
								swal({title: nameProduct,text: "đã được thêm vào giỏ hàng",type: "success",timer: 1500});	
							}
						}
				});
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
@endsection
