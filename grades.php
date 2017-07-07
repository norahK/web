<?php 
//notifay use ajax with this page use some method 
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} 
///notifay when new data added to same id ??
    require "connection.php"; 
    $id=$_SESSION["user"];
	//if(isset($_POST['grades'])){
    $sql=mysql_query("SELECT * From submittedhomeworks WHERE StudentID =".$id);
    if($sql){
		$numof=0;
		   echo "<table class='table'>";  
        while($row=mysql_fetch_array($sql)){
          $sqlco=mysql_query("SELECT * From homework WHERE ID =".$row['HWID']);
            if($sqlco){
        while($co=mysql_fetch_array($sqlco)){
            echo " <tr>
            <td><a href='HW.php?hid=".$row['HWID']."&cid=".$co['courseID']."' target='_blank'>".$co['Name']."</a></td> <td>";
			if($row['grade']!=-1){//-1
			echo $row['grade']." </td>";
			}
			else echo "not graded </td>";                    //if no grade ??

            echo "</tr>";
       $numof++;
       
            }
			}
            else{
              echo "Error....!!";
            }
        }
		 echo "</table>"; 
        
    }
    else
        {
            echo "error with data!! ";
    
        }
		
?> 
<!DOCTYPE html>
<html>
<head>
    
    </head>
<body>
    <div style="height:250px;"></div>
    </body>
</html>

