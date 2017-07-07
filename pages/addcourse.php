<?php
	session_start();
if(!isset($_SESSION["user"])){
    header ("location:ndex.php");
}
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"381Project");
$techerid=$_POST['tid'];
$id=$_POST['cid'];
$name= $_POST['cname'];
$des = $_POST['cd'];
$book = $_POST['cb'];
$ye =  $_POST['op'];
$req =  $_POST['reqd'];

$res=mysqli_query($link,"INSERT INTO course SET ID='".$id."',name='".$name."',description ='".$des."',book='".$book."',year='".$ye."',EndReceiveReqDate='".$req."'");

$res2=mysqli_query($link,"INSERT INTO teachercourseid SET teacherID='".$techerid."',courseID='".$id."'");


echo "<script type='text/javascript'>
alert(' added successfuly ');
window.location.replace('teacher.php?id=".$techerid."')</script>";
?> 




