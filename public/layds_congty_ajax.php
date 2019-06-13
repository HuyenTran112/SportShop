<?php
	$host="localhost";
    $username="root";
    $password="";
    $databasename="sportshop";
    $conn = new mysqli($host,$username,$password,$databasename); 
    $conn->set_charset("utf8");
	$maloaisp=$_POST['ma'];
	$str="select n.manhacungcap, tennhacungcap from nhacungcap n, loaisanpham l , nhacungcap_loaisanpham ln where 
	n.manhacungcap=ln.manhacungcap and ln.manhacungcap=n.manhacungcap and l.maloaisp=ln.maloaisp and l.maloaisp='$maloaisp'";
	$rs=$conn->query($str);
	echo "<select class='form-control' name='txtSupplier' >";
	while($row=$rs->fetch_row())
	{                 
     	echo "<option value=$row[0]>".$row[1]."</option>";                              
	}
	echo "</select>";
		
?>