<?php
	$host="localhost";
    $username="root";
    $password="";
    $databasename="sportshop";
    $conn = new mysqli($host,$username,$password,$databasename); 
    $conn->set_charset("utf8");

    $maphi=$_GET['map'];
    $tongtien=$_GET['ttien'];

    $str = "select phi from phigiaohang where maphi = $maphi";
    $rs = $conn->query($str);
    while($row=$rs->fetch_row())
    {
        $TongThanhToan = $tongtien + $row["0"];
        echo "Phí giao hàng: ".number_format($row["0"])." đồng <br>";
        echo "<span class='mtext-110 cl2' style='color:red'>";
        echo "Tổng thanh toán: ".number_format($TongThanhToan)." đồng";
        echo "</span>";
    }
        
?>