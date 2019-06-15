<?php
	$host="localhost";
    $username="root";
    $password="";
    $databasename="sportshop";
    $conn = new mysqli($host,$username,$password,$databasename); 
    $conn->set_charset("utf8");
	$sohd=$_GET['sohd'];
	$str="update hoadon set trangthai=1 where sohd='$sohd'";
	$rs=$conn->query($str);
?>