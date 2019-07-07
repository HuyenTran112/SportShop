<?php
	$host="localhost";
    $username="root";
    $password="";
    $databasename="sportshop";
    $conn = new mysqli($host,$username,$password,$databasename); 
    $conn->set_charset("utf8");
	$maloaisp=$_GET['maloaisp'];
	$ngaybd=$_GET['ngaybd'];
	$ngaykt=$_GET['ngaykt'];
	$ngaybd1=date('d-m-Y', strtotime($ngaybd));
	$ngaykt1=date('d-m-Y', strtotime($ngaykt));
	if($maloaisp==0)
		$loaisp="Tất cả loại sản phẩm";
	else
	{
		$str1="select tenloaisp from loaisanpham where maloaisp='$maloaisp'";
		$rs1=$conn->query($str1);
		while($row1=$rs1->fetch_row())
			$loaisp=$row1[0];
	}
	if($maloaisp!=0)
		{
			$str="select sanpham.masp,tensp, tenmau, tensize,sum(cthd.soluong) soluongban
			from sanpham, loaisanpham, cthd, hoadon, mausac,size
			where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd  and cthd.masize=size.masize and cthd.mamau=mausac.mamau and sanpham.maloaisp='$maloaisp' and ngayhd>='$ngaybd' and ngayhd<='$ngaykt' and hoadon.trangthai=2
			group by sanpham.masp,tenmau,tensize
			order by soluongban desc
			limit 10";
		}
	else
		{
			$str="select sanpham.masp,tensp, tenmau, tensize, sum(cthd.soluong) soluongban
			from sanpham, loaisanpham, cthd, hoadon, mausac,size
			where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd  and cthd.masize=size.masize and cthd.mamau=mausac.mamau and ngayhd>='$ngaybd' and ngayhd<='$ngaykt' and hoadon.trangthai=2
			group by sanpham.masp,tenmau,tensize
			order by soluongban desc
			limit 10";
		}
		$rs=$conn->query($str);
		
echo"<style>
	body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt 'Tohoma';
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
<body onLoad='window.print();'>
<div id='page' class='page'>
    <div class='header'>
        <div class='logo'><img src='image/logo.png'/></div>
        <div class='company'>Cửa hàng SportShop TY<br>
		Khu phố 6, phường Linh Trung<br>
		Quận Thủ Đức, TPHCM<br>
		SĐT: 028247895<br>
		Email: ty@gmail.com</div>
    </div>
  <br/>
  <div class='title'>
        BÁO CÁO SẢN PHẨM BÁN CHẠY
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
  <b>Ngày bắt đầu: </b>$ngaybd1
<br>
	<b>Ngày kết thúc: </b> $ngaykt1<br>
	 <b>Loại sản phẩm: </b>$loaisp
</br></br>
	<u><b>Thông tin báo cáo:</b></u>
	</br>
</br>
  <tbody><table class='TableData'>
    <tr align='center'>
		<th align='center'>STT</th>
		<th align='center'>Mã sản phẩm</th>
		<th align='center'>Tên Sản phẩm</th>
		<th align='center'>Màu</th>
		<th align='center'>Size</th>
		<th align='center'>Số lượng</th>
	</tr>";
	$stt=1;
		while($row=$rs->fetch_row())
		{            
		echo"<tr class='odd gradeX' align='center'>
						<td>".$stt."</td>
						<td>".$row[0]."</td>
						<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td>
					</tr>";
					$stt++;
		}
			echo "</tbody> </table>";
	
  echo "<div class='footer-right'>TPHCM,ngày   , tháng   , năm   <br/>
    Người làm báo cáo</div>
</div>
</body>";

?>