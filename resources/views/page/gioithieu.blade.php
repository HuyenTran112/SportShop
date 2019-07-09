@extends('layout.index')
@section('title')
Giới thiệu
@endsection
@section('content')
<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('image/bn1.png');">
	<!-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');"> -->
		<h2 class="ltext-105 cl0 txt-center">
			Giới thiệu
		</h2>
	</section>	


	<!-- Content page -->

		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Câu chuyện của chúng tôi
						</h3>

						<p class="stext-113 cl6 p-b-26">
						SportShopTY ra đời vào cuối năm 2018 là sản phẩm hợp tác giữa 2 bạn trẻ UITer. Ban đầu chúng tôi nhận cung cấp các mặt hàng cho Hội thao sinh viên cấp trường của UIT. Sau đó, chúng tôi nhận thấy đây là một lĩnh vực khá tiềm năng vì Làng đại học rất đông sinh viên chơi thể thao. Vì vậy chúng tôi quyết định phát triển lên xây dựng một website để thuận tiện cho mọi người trong quá trình chọn và mua hàng. Hiện tại SportShopTY nhận các đơn hàng trên khắp Việt Nam. Vì mới phát triển nên SportShopTY chỉ có dịch vụ Ship COD truyền thống, chắc chắn sắp tới đây chúng tôi sẽ thêm nhiều kênh thanh toán trực tuyến để thuận tiện hơn các bạn!
						</p>

						
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="image/dtvnd.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Sứ mệnh
						</h3>

						<p class="stext-113 cl6 p-b-26">
							SportShopTY cung cấp đa dạng các sản phẩm cho lĩnh vực thể thao từ quần áo, giày cho đến dụng cụ. Các sản phẩm luôn được cập nhật phù hợp xu hướng và đem lại sự thoải mái cho người sử dụng. Giá cả hợp lý, chất lượng được cam kết.
						</p>

						<!-- <div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Các sản phẩm luôn được cập nhật phù hợp xu hướng và đem lại sự thoải mái cho người sử dụng. Giá cả hợp lý, chất lượng được cam kết.
							</p>

							<span class="stext-111 cl8">
								- Steve Job’s 
							</span>
						</div> -->
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="image/bong.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
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
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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