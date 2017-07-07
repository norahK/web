<?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} 
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"381Project");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style>
        #cancel,#reset{ background-color: cadetblue;
    color: white;
    padding: 5px 18px;
    cursor: pointer;
    height: 20%;
border-radius: 4px;
            margin-left: 1%;}
               table {margin: 3%;
        }
        .other{color: black;}
     .y ,#r {width: auto;} 
        #r{margin-top:2%; padding-bottom: 2%; }
        .y{color: aliceblue; font-weight: bold; background-color: cadetblue; height: 27px;
        font-family: "Times New Roman", Times, serif;
        font-size: 18px;}
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;}
        .container {
    padding: 16px;
}
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
</style>
    
</head>

 <body  background="https://images-eu.ssl-images-amazon.com/images/I/81yw1dEJeVL._SY355_.jpg">
            <div class="jumbotron">
  <div class="container">
      <ul class="nav nav-tabs">
  <li role="presentation"><a href="teacher.php">Home</a></li>
  <li role="presentation"><a href="Reqpage.php">Requests</a></li>
    <li role="presentation"><a href="t_editProfile">Edit Profile</a></li>
  <li role="presentation"><a href="logout.php">Log Out</a></li>


</ul>
      <br>
      <br>
     <a style="color:cadetblue;"   href="teacher.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> </a>

            <div id="r" class="panel panel-default">
                  <div class="y"> <span class="glyphicons glyphicons-envelope"></span><span style="margin-left:3%;">delete courses</span></div>


<form name="form1" action="" method="post">
<?php

$res=mysqli_query($link,"SELECT course.ID, course.name FROM course INNER JOIN teachercourseid ON teachercourseid.courseID = course.ID WHERE teachercourseid.teacherID = ".$_SESSION['user']."");
echo "<table>";
while($row=mysqli_fetch_array($res))
{
echo "<tr><td><input type='checkbox' name='num[]' class='other' value='".$row['ID']."' checked> ".$row['name']." </tr>";

}
echo "</table><br><br><input id='cancel' type='submit' name='submit1' value='delete'>
    <input id='reset' type='reset' name='reset1' value='reset' ></form>";
    

if(isset($_POST["submit1"])){
 
    if (isset($_POST['num'])){
	$box=$_POST['num'];
	while (list ($key,$val) = @each ($box)) 
	{	
    mysqli_query($link,"DELETE from course where ID=".$val.""); 
    mysqli_query($link,"DELETE FROM course INNER JOIN teachercourseid ON teachercourseid.courseID = course.ID WHERE teachercourseid.teacherID = ".$_SESSION['user']."");
        mysqli_query($link,"DELETE FROM teachercourseid WHERE teacherID=".$_SESSION['user']."&& courseID=".$val."");
	}
	
	
echo "<script type='text/javascript'>
	window.location.href=window.location.href;
	</script>";
}
}
  
?>
      </div>
                    <div style="height:280px;"></div>
</div>   </div>

</body>
</html>
