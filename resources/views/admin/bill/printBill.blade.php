<style>

	body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
</style>
<link rel='icon' type='image/png' href='../../../../public/image/favicon.png'/>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="../../../../public/image/minlogo.JPG"/></div>
        <div class="company">Cửa hàng SportShop TY<br>
		Khu phố 6, phường Linh Trung<br>
		Quận Thủ Đức, TPHCM<br>
		SĐT: 028247895<br>
		Email: ty@gmail.com</div>
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
  <b>Thông tin khách hàng:</b>
  <table>
      <tr>
            <td><b>Số hóa đơn</b></td>
            <td>{{$bill->sohd}}</td>
      </tr>
	<tr>
		<td><b>Tên khách hàng:</b></td>
		<td>{{$customer->tenkh}}</td>
	</tr>
	 <tr>
		<td><b>Số điện thoại:</b></td>
		<td>{{$customer->sodt}}</td>
	</tr>
	 <tr>
		<td><b>Địa chỉ:</b></td>
		<td>{{$customer->diachi}}</td>
	</tr>
	 <tr>
		<td><b>Email:</b></td>
		<td>{{$customer->email}}</td>
	</tr>
	 <tr>
		<td><b>Ngày đặt hàng:</b></td>
		<td>{{$bill->ngayhd}}</td>
	</tr>
	 <tr>
		<td><b>Địa chỉ giao hàng:</b></td>
		<td>{{$bill->diachigiaohang}}</td>
	</tr>
	 <tr >
		<td><b>Ghi chú:</b></td>
		<td>{{$bill->ghichu}}</td>
	</tr>

</table>
<br>
	<b>Thông tin đơn hàng</b><br>
	<br>
  <table class="TableData">
    <tr align="center">
		<th align="center">STT</th>
		<th align="center">Tên Sản phẩm</th>
		<th align="center">Màu</th>
		<th align="center">Size</th>
		<th align="center">Số lượng</th>
		<th align="center">Thành tiền</th>
	</tr>
	<?php $stt=1;?>
	@foreach($bill_detail as $item)
	<tr>
		<?php $name = DB::table('sanpham')->where('masp',$item->masp)->first();
		echo "<td>".$stt."</td>";
		$stt++;?>
		<td>{{$name->tensp}}</td>
		<?php
			$color=DB::table('mausac')->where('mamau',$item->mamau)->first();
			echo "<td>".$color->tenmau."</td>";
		?>

		<?php
			$size=DB::table('size')->where('masize',$item->masize)->first();
			echo "<td>".$size->tensize."</td>";
		?>
		<td>{{$item->soluong}}</td>
		<td>{{number_format($item->thanhtien)}}</td>

	</tr>
	@endforeach
	<tr align="center">
		<td colspan="5" align="right"><b>Tổng tiền</b></td>
		<td>{{number_format($bill->tongtien)}}</td>
	</tr>
	<tr align="center">
		<td colspan="5" align="right"><b>Phí giao hàng</b></td>
		<td>{{number_format($bill->phigiaohang)}}</td>
	</tr>
	<tr align="center">
		<td colspan="5" align="right"><b>Tổng thanh toán</b></td>
		<td><b>{{number_format($bill->tongthanhtoan)}}</b></td>
	</tr>
</tbody>
	</table>
  <div class="footer-left">TPHCM,ngày   , tháng   , năm   <br/>
    Khách hàng </div>
  <div class="footer-right">TPHCM,ngày   , tháng   , năm   <br/>
    Nhân viên </div>
</div>
</body>
