<?php
session_start();
header("Content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin: *");
require("conn.php");


    include "conn.php";
    //require_once('connect_mysql.php');
	$del=$_GET['rn'];
	$sql="Delete From comment where comment_id = '$del'";
    $result = mysqli_query($conn, $sql);

    if ($result) {  
	echo '<script>alert("Successfully cleared!")</script>';
	echo '<script>window.location="output.php";</script>';
	;
    }
    else {  
    echo '<script>alert("Cancel failed!");history.go(-1);</script>';
    }
?>