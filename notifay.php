<?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} 
///notifay when new data added to student id 
    require "connection.php"; 


    $sql=mysql_query("SELECT * From submittedhomeworks WHERE StudentID =".$_SESSION["user"]);
    if($sql){
		$numof=0;
        while($row=mysql_fetch_array($sql)){
          $sqlco=mysql_query("SELECT * From homework WHERE ID =".$row['HWID']);
            if($sqlco){
        while($co=mysql_fetch_array($sqlco)){
			if($co['Grade']!=-1){//-1when you add home work
	       $numof++;

			}
		}echo $numof;
		}}
	}echo 0;
		
	//COUNT(*)	
?>
