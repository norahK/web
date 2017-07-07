   <?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} else {
    require "connection.php"; 
    $id=$_SESSION["user"];
    $sql=mysql_query("SELECT * From coursestudentid WHERE studentID=".$id);
    if($sql){
        echo "<table class='table'>";  
        while($row=mysql_fetch_array($sql)){
            $sqlco=mysql_query("SELECT * From course WHERE 	
ID=".$row['courseID']);
            if($sqlco){
                 while($c=mysql_fetch_array($sqlco)){
            echo " <tr><td><a href='coursePage.php?cid=".$row['courseID']."' >".$c['name']."</a></td></tr>";
                    
        }
            }
            else{
              echo "Error....!!";
            }
        
        
    }
        echo "</table>";
    }else
        {
            echo "no subscribed courses!! ";
    
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

<?php
}
?>