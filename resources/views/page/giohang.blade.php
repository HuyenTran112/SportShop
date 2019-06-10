@extends('layout.index')
@section('title')
Giỏ hàng
@endsection
@section('content')
<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="{{route('giohang')}}" method="post">
	<input type="hidden" name="_token" value="{!!csrf_token()!!}">
	<div class="row"> @if(Session::has('thongbao')) <div class="alert alert-success">{{Session::get('thongbao')}}</div> @endif</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Sản phẩm</th>
									<th class="column-2"></th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số lượng</th>
									<th class="column-5">Thành tiền</th>
									<th class="column-6">Chức năng</th>
								</tr>
							 @if(Session::has('cart'))
                                 @foreach($product_cart as $cart)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="image/{{$cart['item']['hinhanh']}}" alt="IMG">
										</div>
									</td>
									
									<td class="column-2">{{$cart['item']['tensp']}}</td>
									
									@if ($cart['item']['giakhuyenmai']==0)
									<!-- <td style="width: 100px"></td> -->
                               	 	<td class="column-3 gia"  id="{{$cart['item']['masp']}}">{{number_format($cart['item']['dongia'])}}</td>
                           		 	@else
								 	<td class="column-3 gia" id="{{$cart['item']['masp']}}">{{number_format($cart['item']['giakhuyenmai'])}}</td>
                            		@endif
									<td class="column-4">
									
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down1 cl8 hov-btn3 trans-04 flex-c-m" style="width: 45px; height: 100%; cursor: pointer">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="{{$cart['qty']}}" id="test">

											<div class="btn-num-product-up1 cl8 hov-btn3 trans-04 flex-c-m" style="width: 45px; height: 100%; cursor: pointer">
												<i class="fs-16 zmdi zmdi-plus" ></i>
											</div>
										</div>
									
									</td>
									
									<td class="column-5 TotalPrice">{{number_format($cart['price'])}}</td>
									<td class="column-6">
										<a class="cart-item-delete btn-DelCart" style="text-aline:center; cursor: pointer"><i class="fa fa-times"></i></a>
										<!-- href="{{route('xoagiohang', $cart['item']['masp'])}}"  -->
										<!-- <button class="btn"><i class="fa fa-edit" id={{$cart['item']['masp']}}></i></button> -->
									</td>
								</tr>
								@endforeach
								@endif
								</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						
						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2" style="color:red">
									Tổng tiền:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2" style="color:red">
									@if(Session::has('cart'))
									<div class="TongTien">{{number_format($totalPrice)}}</div> 
									@else
									<div class="TongTien">0</div>@endif đồng
								</span>
							</div>
						</div>
						<br>
						<h3>Thông tin người nhận</h3><br>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<div class="stext-110 cl2" >Họ tên</div>
								<div class="stext-110 cl2" >Địa chỉ</div>
								<div class="stext-110 cl2" >Số điện thoại</div>
								<div class="stext-110 cl2" >Email</div>
								<div class="stext-110 cl2" >Ghi chú</div>
							</div>
							
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" required placeholder="Họ và tên">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" required placeholder="Địa chỉ">
									</div>
									
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" required placeholder="Số điện thoại">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" placeholder="expample@gmail.com">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="note" placeholder="Ghi chú" href="#">
									</div>	
								</div>
							</div>
						</div>
						
						<br>
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Đặt hàng
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
		

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
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
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
	<script>
		$(document).ready(function()
		{
			// $('.fa-edit').click(function(){
			// 	var rowid=$(this).attr('id');
			// 	var qty=$(this).parent().parent().parent().find(".num-product").val();
			// 	var token=$("input[name='_token']").val();
			// 	$.ajax(
			// 	{
			// 		url:'cap-nhat/'+rowid+'/'+qty,
			// 		type:'GET',
			// 		cache:false,
			// 		data:{'_token':token,'masp':rowid,'qty':qty},
			// 		success:function(data)
			// 		{
			// 			if(data=="oke")
			// 			{
			// 				alert("Yes");
			// 			}
			// 		}
			// 	});
			// });

			$(".btn-num-product-down1").click(function(){
				var numProduct = Number($(this).next().val());
				if(numProduct > 1) $(this).next().val(numProduct - 1);

				var t = $(this).parent().parent().parent().find(".gia").text();
				var sl = Number($(this).parent().find(".num-product").val());
				var res = Number(t.replace(/\,/g, ''));
				$(this).parent().parent().parent().find(".TotalPrice").text(addCommas(res*sl)); //gán lại thành tiền
				
				var tt = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().find(".TongTien").text();
				var Ttien = Number(tt.replace(/\,/g, ''));
				if(numProduct > 1)
					$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().find(".TongTien").text(addCommas(Ttien - res)); // gán lại Tổng Tiền
			});

			$('.btn-num-product-up1').click(function(){
				var numProduct = Number($(this).prev().val());
        		$(this).prev().val(numProduct + 1);

				var t = $(this).parent().parent().parent().find(".gia").text();
				var sl = Number($(this).parent().find(".num-product").val());
				var res = Number(t.replace(/\,/g, ''));
				$(this).parent().parent().parent().find(".TotalPrice").text(addCommas(res*sl)); //gán lại thành tiền

				var tt = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().find(".TongTien").text();
				var Ttien = Number(tt.replace(/\,/g, '')); //bỏ tất cả dấu "," trong number-format
				$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().find(".TongTien").text(addCommas(Ttien + res)); // gán lại Tổng Tiền
				// alert(tt.replace(/\,/g, ''));
			});

			$('.btn-DelCart').click(function(){
				var Tht = $(this).parent().parent().find(".TotalPrice").text(); //gán lại thành tiền
				var Thanhtien = Number(Tht.replace(/\,/g, ''));

				var tt = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find(".TongTien").text();
				var Tongtien = Number(tt.replace(/\,/g, '')); //bỏ tất cả dấu "," trong number-format

				$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().find(".TongTien").text(addCommas(Tongtien - Thanhtien)); // gán lại Tổng Tiền
				$(this).parent().parent().remove();
			});

		});
	//number-format
	function addCommas(nStr)
	{
    	nStr += '';
    	x = nStr.split('.');
    	x1 = x[0];
    	x2 = x.length > 1 ? '.' + x[1] : '';
    	var rgx = /(\d+)(\d{3})/;
    	while (rgx.test(x1)) {
        	x1 = x1.replace(rgx, '$1' + ',' + '$2');
    	}
    	return x1 + x2;
	}
	
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/cart.js"></script>
@endsection
