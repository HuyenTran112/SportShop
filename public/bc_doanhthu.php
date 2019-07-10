<?php
	$host="localhost";
    $username="root";
    $password="";
    $databasename="sportshop";
    $conn = new mysqli($host,$username,$password,$databasename); 
    $conn->set_charset("utf8");
	$maloaisp=$_POST['maloaisp'];
	$ngaybd=$_POST['ngaybd'];
	$ngaykt=$_POST['ngaykt'];
	if($ngaybd>$ngaykt)
	{
		echo "";
	}
	else{
		if($maloaisp!=0)
		{
			$str="select sanpham.masp,tensp, tenmau, tensize,dongia, giakhuyenmai, sum(cthd.soluong) soluongban, sum(thanhtien) as thanhtien
			from sanpham, loaisanpham, cthd, hoadon, mausac,size
			where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd  and cthd.masize=size.masize and cthd.mamau=mausac.mamau and sanpham.maloaisp='$maloaisp' and ngayhd>='$ngaybd' and ngayhd<='$ngaykt' and hoadon.trangthai=2
			group by sanpham.masp, tenmau, tensize";
		}
		else
		{
			$str="select sanpham.masp,tensp, tenmau, tensize,dongia, giakhuyenmai, sum(cthd.soluong) soluongban, sum(thanhtien) as thanhtien
			from sanpham, loaisanpham, cthd, hoadon, mausac,size
			where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd  and cthd.masize=size.masize and cthd.mamau=mausac.mamau and ngayhd>='$ngaybd' and ngayhd<='$ngaykt' and hoadon.trangthai=2
			group by sanpham.masp, tenmau, tensize";
		}
		$rs=$conn->query($str);
		echo " <br> <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
						<thead>
							<tr align='center'>
								<th>STT</th>
								<th>Mã sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Tên màu</th>
								<th>Tên size</th>
								<th>Đơn giá</th>
								<th>Giá khuyến mãi</th>
								<th>Số lượng bán</th>
								<th>Tổng tiền</th>
							</tr>
						</thead>
						<tbody>";
		$tong=0;
		$stt=1;
		while($row=$rs->fetch_row())
		{            
		echo"<tr class='odd gradeX' align='center'>
						<td>".$stt."</td>
						<td>".$row[0]."</td>
						<td>".$row[1]."</td>
						<td>".$row[2]."</td>
						<td>".$row[3]."</td>
						<td>";
						echo number_format($row[4], 3);
						echo"</td>
						<td>";
						echo number_format($row[5], 3);
						echo"</td>
						<td>".$row[6]."</td>";
						echo "<td>";
						echo number_format($row[7],3);
						echo"</td>
					</tr>";
					$stt++;
			$tong+=$row[7];
		}
		
			echo "<tr><td colspan='8' align ='right'>";
			echo "<b>Tổng doanh thu</b></td>";
			echo "<td>".number_format($tong,3)." VND</td>";
			echo "</tbody> </table>";
			echo "<a href='print_bc_doanhthu.php?ngaybd=$ngaybd&ngaykt=$ngaykt&maloaisp=$maloaisp'> <button type='button' class='btn btn-default' id='print'>In báo cáo</button></a>";
	}
?>