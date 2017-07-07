 <?php
session_start();
if(!isset($_SESSION["user"])){
    header ("location:ndex.php");
}
 require "connection.php";

$course=$_POST['cid'];

$student=$_SESSION["user"];

$teacher="SELECT * FROM `teachercourseid` WHERE `courseID` =".$course;

$result1=mysql_query($teacher ,$connection);
if(!$result1)echo "noo";
//$row=mysql_fetch_array($result1);
while($row=mysql_fetch_array($result1)){
$query=mysql_query("INSERT INTO `requests`(`ReqID`, `courseID`, `studentID`, `teacherID`) VALUES ('',".$course.",".$student.",".$row['teacherID'].")");
}
//$result=mysql_query($query ,$connection);
if(!$query){
    echo "nerror ";
    
}
?>