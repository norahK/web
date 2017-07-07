  <?php
	session_start();
if(!isset($_SESSION["user"])){
    header ("location:ndex.php");
}
 if ( !( $database = mysql_connect( "localhost", "root", "" ) ) )
         die( "<p>Could not connect to database</p>" );
   
      if ( !mysql_select_db( "homework", $database ) )
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
        strong{
            padding-left: 35px;
        }
           
     th  {
         font-family: "Times New Roman", Times, serif; font-size: 18px;
        color: palevioletred;}
input[type=text],input[type=date]{
   width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
}


/* Set a style for all buttons */
button[type=submit] ,#cancel{
     background-color: cadetblue;
    color: white;
    padding: 10px 18px;
    margin: 8px 0;
    cursor: pointer;
    height: 20%;
        width: 15%;
border-radius: 4px;
}
      .thth{font-family: "Times New Roman", Times, serif; font-size: 16px;
        color: dimgrey;font-weight: bold;}
     input[type=button]  {
    background-color: cadetblue;
    color: white;
    padding: 10px 18px;
    cursor: pointer;
    height: 20%;
        width: 10%;
border-radius: 4px;
            margin-left: 20%;
}
        table{margin-left: 2%;}
        table,th,tr{ border: 1px solid black;
        padding: 5px;}
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
        .y ,#r {width: auto;} 
     
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;}
        
        .btn-group{margin-top: 4%;}
        .btn{background-color: cadetblue;color: white; text-align: left;font-weight: bold;font-size: 16px; font-family: "Times New Roman", Times, serif;padding-left: 6px;}
        #icon{margin-top: 3%;margin-bottom: -1%;}
        #prev{font-size: 14px; font-family: "Times New Roman", Times, serif;}
    </style>
  
    </head>
    <body  background="https://images-eu.ssl-images-amazon.com/images/I/81yw1dEJeVL._SY355_.jpg">
        
       <div class="jumbotron">
  <div class="container">
      <ul class="nav nav-tabs">
  <li role="presentation"><a href="teacher.php">Home</a></li>
  <li role="presentation"><a href="Reqpage.php">Requests</a></li>
    <li role="presentation"><a href="t_editProfile">Edit Profile</a></li>
  <li role="presentation"><a href="logout.php">Log Out</a></li>
</ul>
     
<div id="icon">
         <a style="color:cadetblue;" href="Tcoursepage.php">
          <span  class="glyphicon glyphicon-circle-arrow-left"></span>
        </a><span id="prev">previouse</span></div>
      <br><br>

      <div id="r" class="panel panel-default">
          <br><br>
          <table>
          <tr>
                 <th> student name </th>
                  <th> submitted HW </th>
                  <th> add grade </th>
                  <th> update grade </th>
 
              </tr>
          
          
          
          
          </table>

          <div  style="height:250px;"></div>

</div>
             <div style="height:280px;"></div>
   
  </div>

</div> 


    
 
    </body></html>  