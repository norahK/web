<?php 
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} else {
    require "connection.php"; 
    $id=$_SESSION["user"];//$_GET['id'];
?> 
<!DOCTYPE html>
<html>
<head>
    <title>edit profile</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
    <style>
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;} 
            h2,h3{font-family: "Times New Roman", Times, serif;}
        h3{font-weight: bold;color: palevioletred;font-size: 26px; margin-left: 45%; margin-bottom: 3%;}
        h2{ font-weight: bold;color: grey; margin-top: 3%; font-size: 38px;}
        label{font-weight: bold;color: grey;font-family: "Times New Roman", Times, serif;font-size: 16px;}
        #save{background-color: cadetblue;}
       
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
          <!--li><div class="left"> <input type="text" class="input" placeholder="Search home work">
          <button class="formButton" type="submit">Search</button></div></li-->
</ul>
    
   </div>  
      <?php
      $Fname=$_SESSION['fname'];
 $Lname=$_SESSION['lname'];
    $email=$_SESSION['email'];
     $Pass=$_SESSION['pass'];
    function fill($id) {
   $selectd=mysql_query("SELECT * From ".$_SESSION['op']." WHERE ID =".$id);
            if($selectd){
                while($rr=mysql_fetch_array($selectd)){
                    
        global $Fname ,$Lname,$email,$Pass;
            
            $Fname=$rr['Firstname'];
     $Lname=$rr['Lastname'];
       $email=$rr['email'];
        $Pass=$rr['password'];
                }
              
            }  else    echo" <div class='alert alert-info alert-dismissable'  name='alert' style='color:red'>
          <a class='panel-close close' data-dismiss='alert' >×</a> 
          <i class='fa fa-coffee'></i> <strong> error in database...!!!</strong>
        </div>";
    }
    fill($id);
    
    if(isset($_POST['update'])){
          $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
      $update="UPDATE ".$_SESSION['op']." SET Firstname='$fname',Lastname ='$lname', email='$email', Password='$pass' WHERE ID='$id'";
   $q=mysql_query($update,$connection);
            if($q){
               echo" <div class='alert alert-info alert-dismissable' name='alert' style='color:green'>
          <a class='panel-close close' data-dismiss='alert'>×</a> 
<i class='fa fa-bolt' aria-hidden='true'></i>
           <strong>ubdate compleat sucssusfuly </strong>
        </div>";
                fill($id);
            }//dont forgate and fontawosm to stylesheet
            else{
                  echo" <div class='alert alert-info alert-dismissable'>
          <a class='panel-close close' data-dismiss='alert'>×</a> 
          <i class='fa fa-coffee'></i>
          <strong>error while ubdating data</strong>
        </div>";
                
                
            }
        
        }
    else if(isset($_POST['cancel'])){
        
        header("location:studentH.php?id=".$id);
        
    }

//action="editProfile.php"
    ?>
      
      <div class="container">
    <h2>Edit Profile</h2>
  	<hr>
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form class="form-horizontal" role="form" method="post" >
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="fname" type="text" value="<?php echo $Fname; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="lname" type="text" value="<?php echo $Lname; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">ID:</label>
            <div class="col-lg-8">
              <input class="form-control" name="id" type="text" value="<?php echo $id; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="<?php echo $email; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" name="pass" type="password" value="<?php echo $Pass; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div style="margin-left:43%;"  class="col-md-8">
              <input type="submit" name="update" id="save" class="btn" value="Save Changes">
              <span></span>
              <input type="submit" name="cancel" id="cancel" class="btn" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

           </div>

        </div>
    </body></html> 
<?php
}

?>