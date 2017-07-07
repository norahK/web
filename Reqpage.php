 <?php
	session_start();
if(!isset($_SESSION["user"])){
    header ("location:index.php");
}
 if ( !( $database = mysql_connect( "localhost", "root", "" ) ) )
         die( "<p>Could not connect to database</p>" );
   
      if ( !mysql_select_db( "381Project", $database ) )
         die( "<p>Could not open URL database</p>" );
?>
<!DOCTYPE html>
<html>
<head>
    
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
        width: 10%;
border-radius: 4px;
            margin-left: 15%;
}
        #cancel{ background-color: cadetblue;
    color: white;
    padding: 10px 18px;
    cursor: pointer;
    height: 20%;
        width: 10%;
border-radius: 4px;
            margin-left: 1%;}
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
        .y ,#r {width: auto;} 
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
      <div id="r" class="panel panel-default">
  <div class="y"> <span style="margin-left:3%;">my requests</span></div>

  <table class="table">
    <th>
        <tr><td class="thth"><em>Course Name</em></td>
        <td class="thth"><em>Student Name</em></td>
        <td class="thth"><em>Student ID</em></td></tr>
      </th>
      <?php
      $query="SELECT * FROM requests WHERE teacherID=".$_SESSION["user"]."";
      $result = mysql_query( $query, $database ) ;
         $c="SELECT studentID FROM requests ORDER BY
studentID ASC";
      if ( !( $result ) )
      {
         print( "<p>Could not execute query!</p>" );
         die( mysql_error() );
      } 

      while($data = mysql_fetch_row( $result )){
     echo  '<form method="post" action="sss.php">';
   
//$j=data[2];
//static $g;
//if ($j >= $g )
{
$f=$data[1];
     $x=$data[2];
          $e1="SELECT * FROM requests WHERE studentID='$x'";
          $result1 = mysql_query( $e1, $database ) ;
          $a= "SELECT * FROM Student WHERE ID='$x'";
          $result2 = mysql_query( $a, $database ) ;
         while($data2 = mysql_fetch_row( $result2 ))
         {
         $q1= $data2[0];
         $q2=$data2[1];
         $q3=$data2[2];
         //$g++;
         }
        $e="SELECT * FROM course WHERE ID='$f'";
        $result3 = mysql_query( $e, $database ) ;
         while($data3 = mysql_fetch_row( $result3 ))
         {
         $course= $data3[1];
         echo '<tr><td>'.$course.'</td>';
         }
        echo '<td>'.$q1." ".$q2.'</td><td>'.$q3.'</td><td><input type="submit" name="button1" value="Accept"></td><td><input type="submit" name="button2" value="Decline"></td><td><input name="h" type="hidden" value="'.$data[0].'"></td></tr>'; 
echo '</form>';
         //"studentID"
      }}
    /*if ( !( $result = mysql_query( $e, $database ) ) || !( $result = mysql_query( $e1, $database ) ) || !( $result = mysql_query( $e2, $database ) ) )
      {
         print( "<p>Could not execute query!</p>" );
         die( mysql_error() );
      } */
      

//$data = mysql_fetch_row( $result)

?>
  </table>
          <div style="height:250px;"></div>

</div>
      
           

    <div style="height:280px;"></div>
  </div>

</div> 
    
        <script>
        
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