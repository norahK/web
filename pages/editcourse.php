
<?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} 
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
    <li role="presentation"><a href="t_editProfile">Edit Profile</a></li>
  <li role="presentation"><a href="logout.php">Log Out</a></li>


</ul>
      <br>
      <br>
               <?php
      echo '<a style="color:cadetblue;" href="teacher.php"><span class="glyphicon glyphicon-circle-arrow-left"> previouse </span> </a>';

      ?>
      <div id="r" class="panel panel-default">
  <div class="y"> <span style="margin-left:3%;">edit courses</span></div>

<?php
echo '<form method="POST" action="editcourse2.php"</form>';     
          echo '<table class="table">';
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"381Project");
$res=mysqli_query($link,"SELECT course.ID, course.name FROM course INNER JOIN teachercourseid ON teachercourseid.courseID = course.ID WHERE teachercourseid.teacherID ='".$_SESSION['user']."'");
echo "<table>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>"; ?> <input type="radio" name="num" class="other" value="<?php echo $row["ID"]; ?>" checked /> <?php echo "</td>";
echo "<td>"; echo $row["name"]; echo "</td>";

echo "</tr>";
}
echo "</table>";
?>
      
  </table>
          <div style="height:250px;"></div>

</div>
  
     <input id="edit" type="submit" name="submit1" value="       edit        ">


</form>

    <div style="height:280px;"></div>
  </div>

</div> 


    </body></html> 