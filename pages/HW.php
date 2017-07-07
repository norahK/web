<?php //HW.php باخليها في السبميتيد هومورك +الكورسس لما يدخله نفسها 
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
}
    require "connection.php"; 
if(isset($_GET['msg'])){
    echo  "<div class='alert alert-info alert-dismissable'> <a class='panel-close close' data-dismiss='alert'>×</a>  <i class='fa fa-coffee'></i>".$_GET['msg']."</div>";
    
}
$id=$_SESSION["user"];
  $cid=$_GET['cid'];
 $hid=$_GET['hid'];
$queryhw = "SELECT * FROM homework WHERE ID=".$hid;
$querysub = "SELECT * FROM submitted homeworks' WHERE HW ID=".$hid."";//to check if submitted or no ??
$queryt = "SELECT 	TID FROM tci WHERE CID=".$cid;//to get name for email
        $resulthw = mysql_query( $queryhw);
	    $resultsub = mysql_query( $querysub); 
$resutt=mysql_query( $queryt); 
if($resutt){
               
                  while($row=mysql_fetch_array($resutt)){
					 $TID=$row['TID'];
                       $result = mysql_query("SELECT Firstname FROM teacher WHERE ID=".$row['TID']);
                      if($result){
                             while($c=mysql_fetch_array($result)){
                          $TN=$c['Firstname'];}
                      }else echo "error while find tname";
                  }
}else echo "error while find tid assosiat with cid";
?>
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
        .submitHW{    background-color: cadetblue;
    color: white;
        border: none;border-radius: 4px;
}
        .submitBtn {
    background-color: cadetblue;
    color: white;
    margin: 8px 0;
    cursor: pointer;
    height: 20%;
        width: 25%;
border-radius: 4px;
}
        input[type=file] {margin-left: 4%;}
.cancelbtn {
  border-radius: 4px;  
    width: 25%;
    color: black;
    background-color: antiquewhite;
}
.container {
    padding: 16px;
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
    padding-top: 80px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 14% auto 15% auto; /* 8% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
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

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

        td a{font-family: "Times New Roman", Times, serif; font-size: 18px;
        color: palevioletred;}
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
        #r{margin-top: 7%;width: 600px;}
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;}
        
        .btn-group{margin-top: 6%;}
        .btn{background-color: cadetblue;color: white; text-align: left;font-weight: bold;font-size: 16px; font-family: "Times New Roman", Times, serif;padding-left: 6px;}
        .form-control{margin-left: 240%;}
          #Sbutton{margin-left: 705%;}

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
          echo" <a href=". $_SERVER['HTTP_REFERER']."><span class='glyphicon glyphicon-chevron-left'></span> return to course page </a>";
           if($resulthw){
          while($row=mysql_fetch_array($resulthw)){
					 // echo $TN."  ".$cid;
              echo "<p><h3>Homework title:</h3>".$row['Name']."</br><h3>description:</h3>".$row['description']."</br><h4>Home work file :</h4>";//.$row['file']."";with uploads/path
              echo "<a href='uploads/ ".$row['file']."' target='_blank'>view file</a>";
                      
            $line= $row['deadline'] ;  $cid=$row['courseID'] ;
                       echo "<h3>Homework deadline:</h3>". $line."</br>";
                      //if submitted will be green 
                  }
//green تم التسليم 
//red بينتهي التسليم خلال يوم
//prupl التسليم متاخر ينظر فيه  

    $submitted= mysql_query("SELECT * FROM submittedhomeworks WHERE HWID=".$hid);
               
               $time=date('Y-m-d');//time();
               echo $time;
               if($line<$time){
                    echo " <div style='background-color:purple ;'><input ";
                   
               }
               else if($line==$time){
                    echo " <div style='background-color:red;'><input";
                   
               }
               else if($submitted) {
                    echo " <div style='background-color:green;'><input style=''";
                   
               }
               else  echo " <div><input style=''";
              echo "onclick=document.getElementById('id01').style.display='block' class='submitHW' type='button' value='submit'> </div>";
           }              ?>
 

</div>
  </div>
           <div id="id01" class="modal" style="">
  <form enctype="multipart/form-data" class="modal-content animate" method="post" action="submit.php" >
      <div id="result"></div>
   <div class="container">
   <input type="hidden" name="hid" value='<?php echo $hid; ?>'>
       <input type="hidden" name="cid" value='<?php echo $cid; ?>'>
        <input type="hidden" name="tid" value='<?php echo $TID; ?>'>
      <input type="file" class="browsebtn" id="file" name="file">

       <div class="container"> 
       <!--input class="submitBtn" type="button" name="subHW" value="submit" id="submitb"-->
      <button class="submitBtn" name="subHW" type="submit"><b>Submit</b></button>
    
      <button type="button" class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
	  
      </div>
	  
      </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        //made it as index page
    }
}
</script>

</div> 

 

    </body></html>  