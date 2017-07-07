<?php
session_start();
if(!isset($_SESSION["user"])){
    header ("location:ndex.php");
}
 require "connection.php";

$query="SELECT `ID` ,`name`,`EndReceiveReqDate`  FROM `course` WHERE `ID` NOT IN(SELECT `courseID` FROM `coursestudentid`)";

$result=mysql_query($query , $connection);
if(!$result){
    echo "<p>no courses to subscribe !!</p>";
}
$today = date("Y-m-d");
echo"<table>";
//$row=mysql_fetch_array($result);

 while($row=mysql_fetch_array($result)){
     if($row==0)   echo "<p>no courses to subscribe !!</p>";
	echo "<tr id='".$row['ID']."'>";
	if($row['EndReceiveReqDate'] > $today){
		//echo "<td>";
	echo "<td>".$row['name']."</td>";
	//echo "</td>";
	$cid=$row['ID'];
	//echo "<td>";
	echo  "<td><button value='add' id='add'> ADD </button> </td>";
	//echo "</td>";
	echo "<td><button value='view' id='view'> VIEW </button> </td>";
	
	//echo "<button "."value='view'" ."id='view'"."onclick='myFunction()'".">"."VIEW"."</button>";
	
	//"onclick='<?php include 'view.php';'".">"echo "<input type='submit'". "name='submit'"." />";	
}   
    echo "</tr>";
	
}

echo "</table>";	

?>
<html>
<body>
     <div style="height:250px;"> <div id="r">hii</div></div>
<script>

    
     var cid=<?php echo $cid; ?>;
    	$('#add').click(function() {
//$('#result').html("ublouding ....");
//if(!id.empty()) {//not empty   
$.ajax({
               url: "add.php",
               type: 'POST',
               data: 'cid='+cid,
   // dataType: "html",
               success: function (data) {
                  $('#'+cid).hide();
                   //$('#r').html(data);
}});});
    
    	$('#view').click(function() {
//$('#result').html("ublouding ....");
//if(!id.empty()) {//not empty
$.ajax({
               url: "view.php",
               type: 'POST',
               data: 'cid='+cid,
   // dataType: "html",
               success: function (data) {
                  //$('#r').html(data);
                   alert(data);
                 // $('#'+cid).hide();
                 //  
                 //  $(':tr')
}});});
   // $('#result').html("<p>"+data+"</p>");
//function myFunction() {//}

</script>
</body>
</html>
