<?php 
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} else {
    require "connection.php"; 
    name=$_POST['key'];
$query = "SELECT * FROM homework WHERE  Name LIKE '%".$name%."'";

$result = mysql_query( $query, $connection);



while ($row = mysql_fetch_array($result)) {
	    echo $row['Name']."grad is :".$row['grade']."<br>";
	 //$response.="<a href='HW.php?hid=".$row['ID']."'=".$row['Homework Name']."'><b>".$row['grade']."</b></a><br>";
}


?>