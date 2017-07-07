<?php 
if ( !( $database = mysql_connect( "localhost", "root", "" ) ) )
         die( "<p>Could not connect to database</p>" );
   
      if ( !mysql_select_db( "381Project", $database ) )
         die( "<p>Could not open URL database</p>" ); 
         
                 $yv = $_POST['inpp'];
                $yy = $_POST['hhh'];
$bbb="UPDATE submittedhomeworks SET grade='$yv' WHERE studentID='$yy'";
 $result8 = mysql_query( $bbb, $database ) ;
 header("Location: hwtable.php");
?>