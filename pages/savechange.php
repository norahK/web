<?php
	session_start();
if(!isset($_SESSION["user"])){
    header ("location:index.php");
}

     require "connection.php";
   
$query = "UPDATE course set name='".$_POST["cname"]."', 
description='".$_POST["cd"]."',
book='".$_POST["cb"]."',
year='".$_POST["op"]."' where ID= ".$_GET['id']."";
 if ( !( $result = mysql_query( $query, $connection ) ) )
      {
         print( "<p>Could not execute query!</p>" );
         die( mysql_error() );
      }

echo "<script type='text/javascript'>
alert(' saved successfuly ');
window.location.replace('editcourse.php')</script>";
?> 
