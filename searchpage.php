<?php 
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} else {
    require "connection.php";
    if(isset($_POST['searchb'])){
    $name=$_POST['key'];
        //return previos page 
        //echo "<script>window.location.href='studentH.php?id=".$id."';</script>";
?><html>
    <head>
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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

/* Extra styles for the cancel button */
        
.cancelbtn {
  border-radius: 4px;  
    width: 10%;
    padding: 10px 18px;
    color: black;
    background-color: antiquewhite;
}
        #dilog{
            display:"none";
        }
.container {
    padding: 15px;
}

/* The Modal (background) */
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
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
       
    </style>
        
 </head>
    <body  background="https://images-eu.ssl-images-amazon.com/images/I/81yw1dEJeVL._SY355_.jpg">
         <div class="jumbotron">
  <div class="container">
      <div style="background-color:white;" id="r" class="panel panel-default"> 
<?php  echo" <a href=". $_SERVER['HTTP_REFERER']."><span class='glyphicon glyphicon-chevron-left'></span> return to home page page </a></br>";
$query = "SELECT * FROM homework WHERE  Name LIKE '%".$name."%'";
$result = mysql_query( $query, $connection);
if($result){
while ($row = mysql_fetch_array($result)) {
    echo "<a href='HW.php?hid=".$row['ID']."&cid=".$row['courseID']."'>". $row['Name']."</a>";
	    //echo"grad is :".$row['grade']."<br>";
	 //$response.="<a href='HW.php?hid=".$row['ID']."'=".$row['Homework Name']."'><b>".$row['grade']."</b></a><br>";
}
    }
else echo "no result";
    }
}
?>
</div>
             </div>
        </div>
    </body>
</html>

