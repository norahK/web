<?php
if ( !( $database = mysql_connect( "localhost", "root", "" ) ) )
         die( "<p>Could not connect to database</p>" );
   
      if ( !mysql_select_db( "381Project", $database ) )
         die( "<p>Could not open URL database</p>" ); 
                 
        $y = $_POST['h'];
        
       if (isset($_POST["button1"])){
        $query="SELECT * FROM Requests WHERE ReqID='".$y."'";
      $result4 = mysql_query( $query, $database ) ;
  while ( $data4 = mysql_fetch_row( $result4 ))
   {  
   $lq = "INSERT INTO coursestudentid (courseID , studentID) VALUES ('".$data4[1]."', '".$data4[2]."')";
          $result6 = mysql_query( $lq, $database ) ;}}
      
      $query1="DELETE FROM Requests WHERE ReqID='".$y."'";
      $result5 = mysql_query( $query1, $database ) ;
      header("Location: Reqpage.php"); 
?>