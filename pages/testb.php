<?php
$connection = mysql_connect("localhost", "root","") or die("Failed to connect to MySQL: " . mysql_error());
if(!$connection){
die("conniction vaild");

}
$db=mysql_select_db("381project",$connection) or die("Failed to connect to MySQL: " . mysql_error());  
// $hid=$_POST['hid'];
 //   $tid=$_POST['tid'];

if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
 mysql_query($sql); 
}




?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Upload and view With PHP and MySql</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<button type="submit" name="btn-upload">upload</button>
</form>
</body>
</html>