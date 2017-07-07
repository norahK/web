<?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} 
 if ( !( $database = mysql_connect( "localhost", "root", "" ) ) )
         die( "<p>Could not connect to database</p>" );
   
      if ( !mysql_select_db( "381Project", $database ) )
         die( "<p>Could not open URL database</p>" );
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
    <style>
    .cancelbtn {
  border-radius: 4px;  
    width: 25%;
    color: black;
    background-color: antiquewhite;
}
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}
.modal-content {
    background-color: #fefefe;
    margin: 14% auto 15% auto; /* 8% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
}
.submitHW{    background-color: cadetblue;
    color: white;
        border: none;border-radius: 4px;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 80px;
}
td {font-family: "Times New Roman", Times, serif; font-size: 18px;
        ; padding:10px; text-align: center;}
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
        .y ,#r {width: auto;} 
        #arrowicon{cursor: pointer;}
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;}
        
        .btn-group{margin-top: 2%;}
        a {color: white;}
        .btn{background-color: cadetblue; color: white; text-align: left;font-weight: bold;font-size: 16px; font-family: "Times New Roman", Times, serif;padding-left: 6px;}
        #icon{margin-top: 3%;margin-bottom: -1%; }
        #prev{font-size: 14px; font-family: "Times New Roman", Times, serif;}
    </style>
  
    </head>
    <body  background="https://images-eu.ssl-images-amazon.com/images/I/81yw1dEJeVL._SY355_.jpg">
        
       <div class="jumbotron">
  <div class="container">
      <ul class="nav nav-tabs">
  <li role="presentation"><a href="teacher.php">Home</a></li>
  <li role="presentation"><a href="Reqpage.php">Requests</a></li>
    <li role="presentation"><a href="t_editProfile.php">Edit Profile</a></li>
  <li role="presentation"><a href="logout.php">Log Out</a></li>
</ul>
  <br><br>   
<div id="n">
    
    
    <?php
    echo '<a style="color:cadetblue;"   href="Tcoursepage.php?id='.$_GET['id'].'"><span class="glyphicon glyphicon-circle-arrow-left"> previouse </span> </a>';
    ?>
    
         <br>       
         </div>
         
  <div id="r" class="panel panel-default">
     <table class="table">
 <th><tr><td ><em><b>Student Name</b></em></td>
       <td><em><b>Student ID</b></em></td>
       <td><em><b>Add Grade</b></em></td>
       <td><em><b>Update Grade</b></em></td>
       <td><em><b>Submitted File</b></em></td></tr>
      </th>
<?php

$query6="SELECT * FROM submittedhomeworks WHERE teacherID=".$_SESSION['user']." ORDER BY
studentID ASC";
          $result = mysql_query( $query6, $database ) ;
            while($data8 = mysql_fetch_row( $result))
            {
            $spe=$data8[0];
            $v=$data8[3];
            $vs=$data8[5];
            $gg=$data8[6];
            $apss ="SELECT * FROM homework WHERE ID='".$v."'";
          $resultnn = mysql_query( $apss, $database ) ;
         while($datanm = mysql_fetch_row( $resultnn ))
         {
         $q4= $datanm[6];
          $hm=$data8[2];
          $ap= "SELECT * FROM student WHERE ID='".$hm."'";
         if ($q4<=$vs)
         { 
          $resultn = mysql_query( $ap, $database ) ;
         while($datan = mysql_fetch_row( $resultn ))
         {
         $q1= $datan[0];
         $q2=$datan[1];
         $q3=$datan[2];
         echo '<form method="post" action="kkk.php"><tr style="background-color: #ff8080;">';
          echo  '<input name="hhh" type="hidden" value="'.$hm.'">';
         echo '<td>'.$q1.' &nbsp; '.$q2.'</td>';
         echo '<td>'.$q3.'</td><td><input type="text" placeholder="Enter Grade" name="inpp"><input type="submit" name="button1" value="Add"></td>';
         echo '</form>';
         echo '<form method="post" action="uuu.php">';
          echo  '<input name="nnn" type="hidden" value="'.$hm.'">';
         echo '<td><input type="text" placeholder="Enter new Grade" name="ins"><input type="submit" name="button2" value="Update"></td>';
         echo '</form>';
                 echo '<td><a href="fils/<?php echo $data8[0] ?>" target="_blank">view student file</a></td>';
         echo '</tr>';
        }
        }
        
         if ($q4>$vs)
         { 
          $resultz = mysql_query( $ap, $database );
         while( $datanx = mysql_fetch_row($resultz)) 
         {
         $q1= $datanx[0];
         $q2=$datanx[1];
         $q3=$datanx[2];
          echo '<form method="post" action="kkk.php"><tr style="background-color: #99e699;">';
          echo  '<input name="hhh" type="hidden" value="'.$hm.'">';
         echo '<td>'.$q1.' &nbsp; '.$q2.'</td>';
         echo '<td>'.$q3.'</td><td><input type="text" placeholder="Enter Grade" name="inpp"><input type="submit" name="button1" value="Add"></td>';
         echo '</form>';
         echo '<form method="post" action="uuu.php">';
          echo  '<input name="nnn" type="hidden" value="'.$hm.'">';
         echo '<td><input type="text" placeholder="Enter new Grade" name="ins"><input type="submit" name="button2" value="Update"></td>';
         echo '</form>';
        echo '<td><a href="uploads/<?php echo $data8[0] ?>" target="_blank">view student file</a></td>';
         echo '</tr>';
         }
         }
         }
         }
         //file <td>" "</td>';
 ?>   
 </table>  
</div>
          <div style="height:250px;"></div>

</div>
<div align="center" style="height:280px;">
 <label for="male">View all students Grades</label> 
<input onclick="document.getElementById('id01').style.display='block'" class="submitHW" type="button" value="View">
  <div id="id01" class="modal">  
  <form class="modal-content animate">
<?php 
                echo '<table>';
echo '<th><tr><td ><em><b>Student ID</b></em></td>';
       echo '<td><em><b>Student Grade</b></em></td>';
      echo '</tr></th>';
$bb="SELECT * FROM submittedhomeworks  WHERE teacherID=".$_SESSION['user']." ORDER BY
studentID ASC";
 $result99 = mysql_query( $bb, $database ) ;
 while($dataf = mysql_fetch_row( $result99))
            {
           $pj= $dataf[2];
            $ps=$dataf[6];
            echo '<tr><td>'.$pj.'</td><td>'.$ps.'</td></tr>';
            }
            echo '</table>'; ?>
<button type="button" class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Close</button>
</form> </div>
           </div></div>
        
       </body>
        </html>  