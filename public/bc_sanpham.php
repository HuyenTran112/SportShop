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
	if($maloaisp!=0)
	{
		$str="select sanpham.masp,tensp, dongia, giakhuyenmai, sum(cthd.soluong) soluongban, sum(thanhtien) as thanhtien
		from sanpham, loaisanpham, cthd, hoadon
		where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd
		and  sanpham.maloaisp='$maloaisp' and ngayhd>='$ngaybd' and ngayhd<='$ngaykt'
		group by sanpham.masp
        order by soluongban desc
        limit 10";
	}
	else
	{
		$str="select sanpham.masp,tensp, dongia, giakhuyenmai, sum(cthd.soluong) soluongban, sum(thanhtien) as thanhtien
		from sanpham, loaisanpham, cthd, hoadon
		where sanpham.maloaisp=loaisanpham.maloaisp and sanpham.masp=cthd.masp and hoadon.sohd=cthd.sohd
		and ngayhd>='$ngaybd' and ngayhd<='$ngaykt'
		group by sanpham.masp
        order by soluongban desc
        limit 10";
	}
	$rs=$conn->query($str);
	echo "  <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                    <thead>
                        <tr align='center'>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
							<th>Giá khuyến mãi</th>
                            <th>Số lượng bán</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>";
	$tong=0;
    while($row=$rs->fetch_row())
	{            
	echo"<tr class='odd gradeX' align='center'>
					<td>".$row[0]."</td>
					<td>".$row[1]."</td>
					<td>";
					echo number_format($row[2], 3);
					echo" VND</td>
					<td>";
					echo number_format($row[3], 3);
					echo" VND</td>
					<td>".$row[4]."</td>";
					echo "<td>";
					echo number_format($row[5],3);
					echo" VND</td>
				</tr>";
		$tong+=$row[5];
	}
	
		echo "<tr><td colspan='5' align ='center'>";
		echo "<b>Tổng doanh thu</b></td>";
		echo "<td>".$tong."</td>";
		echo "</tbody> </table>";
    
?>