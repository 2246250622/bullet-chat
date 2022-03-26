<?php
$hostname= "localhost"; //127.0.0.1
$user="root";
$pwd="" ;
$db = "web";
$conn = mysqli_connect($hostname, $user, $pwd, $db )
or die (mysqli_connect_error());
?>