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
		echo "";
	else{
		if($maloaisp!=0)
		{
			$str="select sanpham.masp,tensp, tenmau, tensize,sum(cthd.soluong) soluongban
			from sanpham, loaisanpham, cthd, hoadon, mausac,size
			where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd  and cthd.masize=size.masize and cthd.mamau=mausac.mamau and sanpham.maloaisp='$maloaisp'
			group by sanpham.masp
			order by soluongban desc
			limit 10";
		}
		else
		{
			$str="select sanpham.masp,tensp, tenmau, tensize,sum(cthd.soluong) soluongban
			from sanpham, loaisanpham, cthd, hoadon, mausac,size
			where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd  and cthd.masize=size.masize and cthd.mamau=mausac.mamau
			group by sanpham.masp
			order by soluongban desc
			limit 10";
		}
		$rs=$conn->query($str);
		echo "  <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
						<thead>
							<tr align='center'>
								<th>STT</th>
								<th>Mã sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Tên màu</th>
								<th>Tên size</th>
								<th>Số lượng</th>
							</tr>
						</thead>
						<tbody>";
						$stt=1;
		while($row=$rs->fetch_row())
		{            
		echo"<tr class='odd gradeX' align='center'>
						<td>".$stt."</td>
						<td>".$row[0]."</td>
						<td>".$row[1]."</td>";
						echo"<td>".$row[2]."<td>".$row[3]."<td>".$row[4]."
					</tr>";
			$stt++;
		}
			echo "</tbody> </table>";
			echo "<a align='center' href='print_bc_sanpham.php?ngaybd=$ngaybd&ngaykt=$ngaykt&maloaisp=$maloaisp'> <button type='button' class='btn btn-default'>In báo cáo</button></a>";
	}		
?>