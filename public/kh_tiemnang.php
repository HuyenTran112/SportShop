<?php
	$host="localhost";
    $username="root";
    $password="";
    $databasename="sportshop";
    $conn = new mysqli($host,$username,$password,$databasename);
    $conn->set_charset("utf8");
	$ngaybd=$_POST['ngaybd'];
	$ngaykt=$_POST['ngaykt'];
	if($ngaybd>$ngaykt)
		echo "";
	else{
	$str="select khachhang.makh,tenkh, diachi, khachhang.email, count(*) sodonhang,sum(hoadon.tongthanhtoan) tongthanhtoan
		from khachhang, hoadon, users
		where khachhang.makh=users.manguoidung and khachhang.makh=hoadon.makh and ngayhd>='$ngaybd' and ngayhd<='$ngaykt' and level=0 and hoadon.trangthai=2
        group by khachhang.makh
        order by tongthanhtoan desc
        limit 10";
	$rs=$conn->query($str);
	echo "  <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                    <thead>
                        <tr align='center'>
                            <th>Mã khách hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
							<th>Email</th>
                            <th>Số lượng đơn hàng</th>
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
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td><td>";
					echo number_format($row[5], 3);
					echo" VND</td></tr>";
	}

		echo "</tbody> </table>";
}
?>
