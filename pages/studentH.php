<?php 
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} else {
    require "connection.php"; 
    $id=$_GET['id'];
?> 

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
     <script src="studentH.js"></script> 
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
      <div class="nav">
      <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="studentH.php?id=<?php echo $id; ?>">Home</a></li>
    <li role="presentation"><a href="editProfile.php?id=<?php echo $id; ?>" >Edit Profile</a></li>
  <li role="presentation"><a href="logout.php">Log Out</a></li>
          <li><div class="left">
              <input id="search" type="text" class="input" placeholder="Search home work">
        </div></li>
</ul>
    
   </div>  
<div><h1>welcom <?=$_SESSION["fname"];?>!</h1></div> 
      
      
       <div id="dilog" class="modal-content animate">
  	   <div id="searchr"> hiii</div>
 <div class="container">
         <button type="button" class="btn btn-cancel" onclick="document.getElementById('dilog').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
</div>
      
      
<div class="btn-group" id="insaid">
  <button  type="button" class="btn"> <a href="courses" style="color:white;">My course | </a>  </button>

  <button  id="sButton" type="button" class="btn">
       <a href="phpSubscribe" style="color:white;">Subscribe course | </a>
      </button>
   <button  id="gButton" type="button" class="btn">
        <a href="grades" id="gb" style="color:white;">Submitted HW and Grades </a>
</button>
</div>

      <div id="r" class="panel panel-default"> 

</div>
       <input id="hiddenfiled" type="hidden" name="rows" value=""/>
  </div>

</div> 
    </body></html>  
<?php
}
?>