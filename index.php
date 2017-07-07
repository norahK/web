<!DOCTYPE html>
<?php
require 'connection.php';
?>
<html>
    
<head>
     <title>HOMEWORK submision system</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
 <style>
     /*bootstrab*/
     .jumbotron{  width: auto; margin-left: 48%; margin-top: 10%; background-color: transparent;}
     h1.homeFont{color: white;
      font-family: "Times New Roman", Times, serif;
         font-weight: bold;
}
     #HomeP{font-family: "Times New Roman", Times, serif;}
     #sign {width: auto;border-radius: 4px;
     margin-top:6%; margin-left: 35%;}
      #sign2 {width: auto;border-radius: 4px;
    margin-left: 35%; }
     
   /* Full-width input fields */
input[type=text], input[type=password] ,input[type=email] {
    width: auto;
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
        width: auto;
border-radius: 4px;
}

/* Extra styles for the cancel button */
.cancelbtn {
  border-radius: 4px;  
    width: auto;
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
    width: auto; /* Full width */
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
    width: auto;/* Could be more or less, depending on screen size */
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
<body background="http://cdn3.volusion.com/mache.udhvk/v/vspfiles/photos/R2595-PARENT-2.jpg">
    <div class="jumbotron">
  <div class="container">
  <h1 class="homeFont">Home Work Uploader </h1>
  <p   id="HomeP" style="font-size: 22px; margin-left: 10%; ">upload , submit your home work easly</p>
      <div style="position:relative; display:inline;">
  <p><a onclick="document.getElementById('id01').style.display='block'" id="sign" class="btn btn-default" href="#" role="button">Sign in</a></p>
  <p><a onclick="document.getElementById('id02').style.display='block'" id="sign2" class="btn btn-default" href="#" role="button">Sign Up</a></p>
   </div>     
  </div>
</div>

    <div id="id01" class="modal">
  
  <form class="modal-content animate" method="post">
  	   <div id="r"></div>
 <div id="cont1" class="container">

      <label><b>sign in as:</b></label>
      <select name="op1" id="op" required>
    <option value="teacher">teacher</option>
    <option value="student">student</option>
  </select> </div>
    <div id="cont1" class="container">
      <label><b>ID</b></label>
      <input  id="id1" type="text" placeholder="Enter ID" name="ID" required>

      <label><b>Password</b></label>
      <input id="pass1" type="password" placeholder="Enter Password" name="psw" required>
        <br>
		<input class="btn btn-cancel" type="button" name="Login" value="Login" id="loginb" role="button">
         <button type="button" class="btn btn-cancel" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
	</form>
</div>
    <!--register-->
    <div id="id02" class="modal">
  
  <form class="modal-content animate" method="post">
  <div id="r1"> </div>
    <div id="cont1" class="container">
          <select id="op2" name="op" required>
    <option value="teacher" selected>teacher</option>
    <option value="student">student</option>
  </select>
   <br>
         <label><b>First name </b></label>
      <input id="fname"  class="form-control" type="text" placeholder="Enter your first name" name="Fname" pattern=".{3,}^[A-Za-z]+" required>
         <label><b>Last name </b></label>
      <input id="lname" type="text" class="form-control"  placeholder="Enter your last name" name="Lname" pattern="^[A-Za-z]+" required>
      <label><b>ID </b></label>
      <input id="id" type="text" class="form-control" placeholder="Enter ID" name="id" pattern="^[0-9]+" required>
         <label><b>email </b></label>
      <input id="email" type="email" class="form-control" placeholder="Enter email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
      <label><b>Password</b></label>
      <input id="pass" class="form-control"  type="password" placeholder="Enter Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
		 <label><b>confirm Password</b></label>
      <input id="cpass" type="password"  class="form-control" placeholder="Enter CPassword" name="psw" required>
        <br>
      <!--button class="formButton" type="submit" id="signup">signup</button-->
     <input  type="button" name="signup" value="signup" id="signup"  role="button" class="btn btn-cancel">
         <button type="button" onclick="document.getElementById('id02').style.display='none'"  class="btn btn-cancel">Cancel</button>
    </div>

  </form>
    </div> 
<script>
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == document.getElementById('id01')){
    
        document.getElementById('id01').style.display = "none";
    }
    else if(event.target == document.getElementById('id02')) {
        document.getElementById('id02').style.display = "none";
    }
        
}
	$('#loginb').click(function() {
			//function login(){
				var op1=$('#op').val();
 //var id = $('#id1').val();
     var id = $( '#id1' ).val();
var pass = $('#pass1').val();
$('#r').html("loading ....");
 //$('#r').html(id+pass+op1);
//if(!id.empty()) {//not empty
$.ajax({
               url: "check.php",
               type: 'POST',
               data: 'action=login&id='+id+'&pass='+pass+'&op1='+op1,
             //  dataType: 'String',
               success: function (data) {
                   $('#r').html("");
                   $('#r').append(data);
                   
                    }
            });
    });
		//for signup
$('#signup').click(function() {
    $("#r1").empty();
var name = $("#fname").val();
var lname = $("#lname").val();
var id = $("#id").val();
var email = $("#email").val();
var pass = $("#pass").val();
var cpassword = $("#cpass").val();
var op=$('#op2').val();
             //  dataType: 'String',
    
if (name.length == 0 || email.length == 0 || lname.length == 0||pass.length == 0 || id .length == 0) {
$('#r1').append("<div class='alert alert-warning alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'></i>Please fill all fields...!!!!!!   </div>");
}//but more than error in same time 
    else if(!(/^[A-Za-z ]+$/.test(name)&&/^[A-Za-z ]+$/.test(lname))){
         $('#r1').append("<div class='alert alert-warning alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'></i>name should be charecter only </div>");
        
    }
    else if(id.length<9){
         $('#r1').append("<div class='alert alert-warning alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'></i>id should be 9 numbers </div>");      
    }
    else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)){
  $('#r1').append("<div class='alert alert-warning alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'></i>input valid email plz:)</div>"); 
        
        
    }
else if ((pass.length) < 8) {
$('#r1').append(
    "<div class='alert alert-warning alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'></i>Password should atleast 8 character in length...!!!!!!</div>");
}
    else if (!(pass).match(cpassword)) {
 $('#r1').append("<div class='alert alert-warning alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'></i>Your passwords don't match. Try again?</div>");
}

else{    
$.ajax({
               url: "check.php",
               type: 'POST',
 data:'action=signup&id='+id+'&pass='+pass+'&op='+op+'&Fname='+name+'&Lname='+lname+'&email='+email,
               success: function (data) {
                         $('#r1').append(data);
                    }
            });

}
});

</script>
</body>
</html>