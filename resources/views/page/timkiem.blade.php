@extends('layout.index')
@section('title')
Tìm kiếm
@endsection
@section('content')



	

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140" style="margin-top:100px">
		<div class="container">                                
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Sản phẩm tìm kiếm
				</h3>
			</div>
			<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>

			<div class="flex-w flex-sb-m p-b-52">
				

				
			@include('layout.filter')	
			<div class="row isotope-grid">
				@foreach($product as $sp)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="image/{{$sp->hinhanh}}" alt="IMG-PRODUCT" height="300px">

							<a href="{{route('chitietsanpham',$sp->masp)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Quick View
							</a>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{route('chitietsanpham',$sp->masp)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$sp->tensp}}
								</a>

								<!--<span class="stext-105 cl3">
									{{number_format($sp->dongia)}} đồng
								</span>-->
								<p class="single-item-price">
								@if($sp->giakhuyenmai==0)
                               	 	<span class="flash-sale" style="font-size:15px"><b>{{number_format($sp->dongia)}} đồng</b></span>
                           		 @else
								 	<span class="flash-sale" style="font-size:15px"><b>{{number_format($sp->giakhuyenmai)}} đồng</b></span>&ensp;&ensp;&ensp;
                                	<span class="flash-del" style="font-size:15px"><b>{{number_format($sp->dongia)}} đồng</b></span>
                            	@endif
								</p>
								<a class="button js-addcart" id = "{{$sp->masp}}"></a>&nbsp;&nbsp; 
								
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
                                               
								<a href="{{route('blog')}}" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img  src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="row isotope-grid">{{$product->links()}}</div>

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
		$(".js-select2").each(function(){
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
            
            /*---------------------------------------------*/		
            
		$('.js-addwish-b2').on('click', function(e){
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

            $('.js-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				// swal(nameProduct, "đã được thêm vào giỏ hàng", "success");
				var id = $(this).attr('id');
				var token = $("input[name='_token']").val();
				var sl = $(this).parent().parent().parent().parent().parent().parent().parent().parent().find('.js-show-cart').attr('data-notify');
				sl++;
				$(this).parent().parent().parent().parent().parent().parent().parent().parent().find('.js-show-cart').attr('data-notify', sl);
				$.ajax({
					url: 'add-to-cart/' + id,
					type: 'GET',
					cache: false,
					data: {"_token":token, "id": id},
						success:function (data){
							if(data == 'oke'){
								swal({title: nameProduct,text: "đã được thêm vào giỏ hàng",type: "success",timer: 2000});
								// swal(nameProduct, "is added to cart !", "success");
								//$(this).parent().parent().parent().parent().parent().parent().parent().parent().find('.js-show-cart').attr('data-notify',1);
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
