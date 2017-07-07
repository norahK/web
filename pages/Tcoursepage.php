 <?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} 
 require "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
           td tb {color: black;}
     td {
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
.container {
    padding: 16px;
}
        .fff{color: palevioletred;}
        td.infocell{
                     font-family: "Times New Roman", Times, serif; font-size: 18px;
            width: auto;
            color: palevioletred;
    padding-right: 30px;
        padding-left: 30px;
        }
        td.cell{
                     font-family: "Times New Roman", Times, serif; font-size: 18px;
            width: auto;
           color: black;
    padding-right: 30px;
        padding-left: 30px;        }
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
    width: 30%; /* Could be more or less, depending on screen size */
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
        .jumbotron{width: 96%; height: 100%; margin-left: 2%;margin-top:2%;}
        .y ,#r {width: auto;} 
        #arrowicon{cursor: pointer;}
      li a{ color: cadetblue;font-weight: bold; font-family: "Times New Roman", Times, serif; font-size: 18px;}
        
        .btn-group{margin-top: 2%;}
        a {color: white;}
        .btn{background-color: cadetblue; color: white; text-align: left;font-weight: bold;font-size: 16px; font-family: "Times New Roman", Times, serif;padding-left: 6px;}
        #icon{margin-top: 3%;margin-bottom: -1%; }
        #prev{font-size: 14px; font-family: "Times New Roman", Times, serif;}
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
  <br><br>   
<div id="n">
    <a style="color:cadetblue;"   href="teacher.php"><span class="glyphicon glyphicon-circle-arrow-left"> previouse </span> </a>
         <br>
          <!--<span style="color:cadetblue;" id="arrowicon" class="glyphicon glyphicon-list"> homeworks </span> -->
           <?php
    echo '<a style="color:cadetblue;"   href="Tcoursepage.php?id='.$_GET['id'].'"><span class="glyphicon glyphicon-list"> homeworks </span> </a>';
    ?>
    
         </div>
<div class="btn-group">

    <button  id="addhw" type="button" class="btn"> Add home work | </button> 
  <button  id="infoButton" type="button" class="btn">course information |  </button>
  <button  id="studentButton" type="button" class="btn">Students Gegistered |</button>
   <button id="stat" type="button" class="btn">view statistics</a></button>
</div>
      <div id="r" class="panel panel-default">
<table class="table">
        <?php
if(isset($_GET['id']))
	{ 	
        $query = "SELECT * FROM homework where courseID='".$_GET['id']."'";
        if ( !( $result = mysql_query( $query, $connection ) ) )
      {
         print( "<p>Could not execute query!</p>" );
         die( mysql_error() );
      }
    while($data = mysql_fetch_row( $result )){
    echo '<tr><td> <a class="fff" target="_blank" href="uploads/'.$data[2].'">'.$data[1].'</a></td><td><button name="viewhw" id="vhw">view submissions</button></td></tr>';
	}}

		?>

	
  
    <?php

#$query = "SELECT * FROM homework where courseID='".$_GET["id"]."'";

 #if ( !( $result = mysql_query( $query, $connection ) ) )
     # {
         #print( "<p>Could not execute query!</p>" );
        # die( mysql_error() );
     # }
#while($data = mysql_fetch_row( $result ))

#echo '<tr><td>'.$data[1].'</td></tr>';
 ?>
      
  </table>
</div>
             <div style="height:280px;"></div>
   
  </div>

</div> 

<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="addHW.php" enctype="multipart/form-data">
    <div>

 <div class="container">
    <?php  echo '<input type="hidden" name="cid" value="'.$_GET["id"].'"></div>'; ?>
    <div class="container">
      <label><b>Homework Title</b></label><br>
      <input type="text" class="form-control" placeholder="Enter homework title" name="ht" required></div>
      
      <div class="container">
      <label><b>Homework deadline</b></label><br>
      <input class="form-control" type="date" placeholder="Enter Homework deadline" name="hd" required></div>
      
      <div class="container">
      <label><b>Homework description</b></label><br>
      <input class="form-control" type="text" placeholder="Enter homework description" name="hdes" ></div>
      
      <div class="container">
      <input type="file" name="file" required></div>
       <div class="container"> 
       
      <button name="btn-upload" type="submit"><b>Upload</b></button>
    
      <button id="cancel" type="button">Cancel</button>
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
    }
}
</script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
          $("#stat").click(function() {
        $("#r").html("mm");
    Highcharts.chart('r', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'semesters Average HW grades'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: ['semester/2015', 'semester/2015', 'semester/2016', 'semester/2016']
        },
        yAxis: {
            title: {
                text: 'grades'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'HW1',
            data: [7.0, 6.9, 9.5, 14.5]
        }, {
            name: 'HW2',
            data: [3.9, 4.2, 5.7, 8.5, 11.9]
        }]
    });
});
        
 $("#studentButton").click(function() {
  document.getElementById("r").innerHTML= "<?php 
            
           echo "<br><table class='cell'>"; 
   echo  "<th>";
      echo  "<tr><td class='cell'><em> ID</em></td>";
       echo "<td class='cell'><em> Name </em></td>";
      echo "</th>";
   $query1="SELECT * FROM coursestudentid WHERE courseID=102";
   $result = mysql_query( $query1, $connection ) ;
   while($data = mysql_fetch_row( $result))
            { $b=$data[1];
            $a= "SELECT * FROM Student WHERE ID='$b'";
             $result2 = mysql_query( $a, $connection ) ;
             while($data2 = mysql_fetch_row( $result2 ))
              {
              $q1= $data2[0];
              $q2=$data2[1];
              $q3=$data2[2];
              $q4=$data2[3];
                  echo "<tr><td class='infocell'>".$q3."</td><td class='infocell'>".$q1.'  '.$q2."</td></tr>";

               }
            }
              echo "</table>";
                ?>"+"<div style='height:200px;'></div>";
                  });
        
        
       $('#infoButton').click(function(){
           
            document.getElementById("r").innerHTML= "<?php 
            
            echo "<br><table>";
    
$query = "SELECT * FROM course where ID='".$_GET['id']."'";
             if ( !( $result = mysql_query( $query, $connection ) ) )
      {
         print( "<p>Could not execute query!</p>" );
         die( mysql_error() );
      }
                  
while($data = mysql_fetch_row( $result )){
echo "<tr><td><strong> course name :</strong></td><td><tb>".$data[1]."</td></tr>";
echo "<tr><td><strong> course description :</strong></td><td><tb>".$data[2]."</td></tr>";

    echo "<tr><td> <strong> course book :</strong></td><td><tb>".$data[3]."</td></tr>";
    echo "<tr><td> <strong>course year :</strong></td><td><tb>".$data[4]."</td></tr>";

}
            echo "</table>";
                ?>"+"<div style='height:200px;'></div>";
                
        });
           
 
                $("#addhw").click(function() {
document.getElementById('id01').style.display='block';    
  });
      
                    //$("#arrowicon").click(function() {
           // window.location.replace('Tcoursepage.php');            
 /// });   
       $("#cancel").click(function() {
document.getElementById('id01').style.display='none';    
  }); 
          
        <?php
       echo " $('#vhw').click(function() {
                  window.location.replace('hwtable.php?id=".$_GET["id"]."');
  }); ";
    ?>    
    </script>
    
 
    </body></html>  