<?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
}
    require "connection.php"; 
    $cid=$_GET['cid'];
$id=$_SESSION["user"];
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
        td a{font-family: "Times New Roman", Times, serif; font-size: 18px;
        color: palevioletred;}
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
        .y ,#r {width: 600px;} 
        #r{margin-top:0%;}
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;}
        
        .btn-group{margin-top: 6%;}
        .btn{background-color: cadetblue;color: white; text-align: left;font-weight: bold;font-size: 16px; font-family: "Times New Roman", Times, serif;padding-left: 6px;}
        .form-control{margin-left: 240%;}
          #Sbutton{margin-left: 705%;}
        h1{color: darkgray;}
        h3{color: darkseagreen;}
        
    </style>
    </head>
<body  background="https://images-eu.ssl-images-amazon.com/images/I/81yw1dEJeVL._SY355_.jpg">
      <div class="jumbotron">
  <div class="container">
<div class="nav">
      <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="studentH.php?id=<?php echo $id; ?>">Home</a></li>
    <li role="presentation"><a href="editProfile.php?id=<?php echo $id; ?>" >Edit Profile</a></li>
  <li role="presentation"><a href="logout.php">Log Out</a></li>
          <li><div class="left"> <input type="text" class="input" placeholder="Search home work">
          <button class="formButton" type="submit">Search</button></div></li>
</ul>
    
   </div> 
    
  <div id="contant" class="panel panel-default">
      <?php
 $sql=mysql_query("SELECT * FROM course WHERE ID =".$cid);
    if($sql){
        echo "<div>";  
        while($row=mysql_fetch_array($sql)){
             echo "<h1>".$row['name']."</h1><h3>Info:</h3></br>".$row['description']."</br><h3>book:</h3>".$row['book']."</br><h3>year and semester :</h3>".$row['year']."<h3>HomeWorks:</h3></br>";
             //techer name??
        }
    }
else
        {
            echo "error !! ";
   // how
        }
            
            $sqlh=mysql_query("SELECT * From homework WHERE 	courseID=".$cid);
            if($sqlh){
                echo "<table class'table'>";
                 while($c=mysql_fetch_array($sqlh)){
            echo " <tr><td><a href='HW.php?cid=$cid&hid=".$c['ID']."' target='_blank'>".$c['Name']."</a></td></tr>";
                    
        }
            echo "</table>";
            }
            else{
              echo "<p>no homeworks in this course</p>";
            }
        echo "</div>";
    
?>
      </div>
        </div>
    </div>
 
    </body>
</html>