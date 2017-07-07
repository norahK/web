<?php
require 'connection.php';
if((isset($_POST['action']))&&$_POST['action']=='login'){if(!empty($_POST['id']) && !empty($_POST['pass'])) {
    
    $op=$_POST['op1'];
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$query=mysql_query("SELECT * FROM ".$op." WHERE ID='".$id."' AND password='".$pass."'");
    $numrows=mysql_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysql_fetch_assoc($query))
	{
	$dbid=$row['ID'];
	$dbpassword=$row['password'];
        $fname=$row['Firstname'];
        $lname=$row['Lastname'];
         $email=$row['email'];
	}

	if($id == $dbid && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['user']=$id;
     $_SESSION['fname']=$fname;   
      $_SESSION['op']=$op; 
        $_SESSION['lname']=$lname; 
          $_SESSION['email']=$email; 
          $_SESSION['pass']=$pass; 
if($op=="student")
	/* Redirect browser */
     //echo'true';
	//header("Location: studentH.php?id=$id");
	echo "<script>window.location.href='studentH.php?id=".$id."';</script>";
else
    echo "<script>window.location.href='teacher.php?id=".$id."';</script>";
//header("Location: tetcherH.php?id=$id");
	}
	} else {
     // return Invalid username or password!"// header("Location: index.php?error=Invalid username or password!"); 
	echo "<div class='alert alert-danger alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'>Invalid username or password!</i></div>";
	}

} else {
     // header("Location: index.php?error=All fields are required!"); 
	echo "<div class='alert alert-danger alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'>All fields are required!</i></div>";
}
}//end login check
if(isset($_POST['action'])&&$_POST['action']=='signup'){
$op=$_POST['op']; // Fetching Values from URL.
$fname=$_POST['Fname'];
$lname=$_POST['Lname'];
$id=$_POST['id'];
$email=$_POST['email'];
$password= $_POST['pass'];//sha1($_POST['pass']); // Password Encryption, If you like you can also leave sha1.
$result = mysql_query("SELECT * FROM ".$op." WHERE ID=".$id);
if(!$result) echo "<div class='alert alert-danger alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'>id should be numbers only</i></div>";
else{
$data = mysql_num_rows($result);
    //validation 
    
    //aleady in js 
    //we can add it hear also but we haven,t get time 
    
    
    
if(($data)==0){
$query = mysql_query("INSERT INTO ".$op." (ID, Firstname, Lastname, email, Password) VALUES ('$id', '$fname', '$lname','$email','$password')"); // Insert query
if($query){
   //pr wecan send requist to login 
echo "<div class='alert  alert-success alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'>You have Successfully Registered plz login :).....</i></div>";
}else
{
echo "<div class='alert alert-danger alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'>fill all input....!!</i></div>";
}
}else{
echo "<div class='alert alert-danger alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'>This id is already registered, Please try another id or log in ...</i></div>";
}
}
}
mysql_close ($connection);
?>
