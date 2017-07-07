<?php
session_start();
if(!isset($_SESSION["user"])){
    header ("location:ndex.php");
}
 require "connection.php";

$cid=$_POST['cid'];

$student=$_SESSION["user"];
$query="SELECT * FROM `course` WHERE ID=".$cid;

$result=mysql_query($query ,$connection);
if(!$result)echo "nooooo!!";
//$row=mysql_fetch_row($result);
else{
while($row=mysql_fetch_row($result)){
    // `description`, book is `book`, the course close in `EndReceiveReqDate
    $b=$row[2]."</br>book is :".$row[3]."</br>the course close in".$row[5];
}
echo $b;}

?>

