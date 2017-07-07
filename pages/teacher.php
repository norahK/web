 <?php
	session_start();
if(!isset($_SESSION["user"])){
    header ("location:index.php");
}
 require "connection.php";
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
/* Full-width input fields */
input[type=text] {
   width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
}

/* Set a style for all buttons */
button {
     background-color: cadetblue;
    color: white;
    padding: 10px 18px;
    margin: 8px 0;
    cursor: pointer;
    height: 20%;
        width: 25%;
border-radius: 4px;
}
.container {
    padding: 16px;
}


/* The Modal (background) */
.modal{
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
.modal-content{
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

     #add  {
    background-color: cadetblue;
    color: white;
    padding: 10px 18px;
    cursor: pointer;
    height: 20%;
border-radius: 4px;
            margin-left: 15%;
}
        #cancel,#edit{ background-color: cadetblue;
    color: white;
    padding: 10px 18px;
    cursor: pointer;
    height: 20%;
border-radius: 4px;
            margin-left: 1%;}
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
        #r{margin-top:5%;}
        .y{color: aliceblue; font-weight: bold; background-color: cadetblue; height: 27px;
        font-family: "Times New Roman", Times, serif;
        font-size: 18px;}
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;}
        td a{font-family: "Times New Roman", Times, serif; font-size: 18px;
        color: palevioletred;}
        .thth{font-family: "Times New Roman", Times, serif; font-size: 19px;
        color: dimgrey;font-weight: bold;}
        h2{font-family: "Times New Roman", Times, serif; font-weight: bold;
        color: gray;}
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
      <br>
      <br>
      <h2>Welcom  <?php   echo  $_SESSION['fname']; ?> ..</h2>
      <div id="r" class="panel panel-default">
  <div class="y"> <span style="margin-left:3%;">my courses</span></div>

  <table class="table">
  
     <?php
$query = "SELECT course.ID, course.name FROM course INNER JOIN teachercourseid ON teachercourseid.courseID = course.ID WHERE teachercourseid.teacherID ='".$_SESSION['user']."'";
 if ( !( $result = mysql_query( $query, $connection ) ) )
      {
         print( "<p>Could not execute query!</p>" );
         die( mysql_error() );
      }
while($data = mysql_fetch_row( $result ))

echo '<tr><td><a href="Tcoursepage.php?id='.$data[0].'">'.$data[1].'</a></td></tr>';
$_SESSION["c"]=$data[0];

?> 
      
  </table>
          <div style="height:250px;"></div>

</div>
      <button class="btn btn" id="add" onclick="document.getElementById('id01').style.display='block'" type="button" name="add course">add course</button>

      

<button class="btn btn" id="cancel" 
 name="deletecourse">delete course</button>   
<button class="btn btn" id="edit" 
 name="editcourse">edit course</button>
         

    <div style="height:280px;"></div>
  </div>

</div> 
    <div id="id01" class="modal">

  
  <form class="modal-content animate" action="addcourse.php" method="post">
    <div>
 <div class="container">
           <input name="tid" type="hidden" value="<?php echo $_SESSION['user']; ?>"></div>

      <label><b>Course ID</b></label>
      <input  class="form-control" type="text" placeholder="Enter Course ID" name="cid" required></div>

    <div class="container">
      <label><b>Course Name</b></label>
      <input  class="form-control" type="text" placeholder="Enter Course Name" name="cname" required></div>
      
     
      
      <div class="container">
      <label><b>Course description</b></label>
      <input  class="form-control" type="text" placeholder="Enter Course description" name="cd" ></div>
      
      <div class="container">
      <label><b>Course Book</b></label>
      <input type="text" placeholder="Enter Course Book" name="cb" ></div>
      
      <div class="container">
      <label><b>Year and semster</b></label>
      <select name="op">
    <option value="2016 first semester">2016 first semester</option>
    <option value="2016 second semester">2016 second semester</option>
    <option value="2017 first semester" selected>2017 first semester</option>
    <option value="2017 second semester">2017 second semester</option>
          
  </select>
          <br>
                <label><b>Enter end date of request</b></label>
      
            <input type="date" name="reqd" required></div>

      
      

     
       <div class="container"> 
      <button type="submit"><b>Add</b></button>
      <button type="button" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
      </div>      </div>

          </form>

        </div>
         </body>  
        <script>
     $("#cancel").click(function(){
      window.location.replace('deletecourse.php');   
     });
               $("#edit").click(function(){
      window.location.replace('editcourse.php');   
     });
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>

    </body></html>