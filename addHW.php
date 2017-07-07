<?php
	session_start();
if(!isset($_SESSION["user"])){
    header ("location:ndex.php");
}
 require "connection.php";

if(isset($_POST['btn-upload']))
{
    
      
$tit = $_POST['ht'];
$des = $_POST['hdes'];
$ded = $_POST['hd'];
$cor =$_POST['cid'];
    
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
    	$file_type = $_FILES['file']['type'];
	$folder="uploads/";   
  // new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    //move_uploaded_file($file_loc,$folder.$final_file);
    if(move_uploaded_file($file_loc,$folder.$final_file))
	{
        
 $sql = "INSERT INTO homework SET Name='".$tit."',file='".$final_file."',file_size='".$new_size."',file_type='".$file_type."',description ='".$des."',deadline='".$ded."',courseID='".$_POST['cid']."'";
		if(!mysql_query($sql)){
     echo    "<script>alert('not qqqquery');
        window.location.href='Tcoursepage.php?id=".$cor."' </script>";
         
     }
#$sql = "INSERT INTO homework SET Name='".$tit."',file='".$final_file."',file_size='".$new_size."',file_type='".$file_type."',description ='".$des."',deadline='".$ded."',courseID='".$_POST['cid']."'";
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='Tcoursepage.php?id='<?php echo $cor; ?>'';
        </script>
		<?php 
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='Tcoursepage.php?id=fail';
        </script>
		<?php
	}
 echo "<script type='text/javascript'>
window.location.replace('Tcoursepage.php?id=".$cor."')</script>";    
}
?> 
