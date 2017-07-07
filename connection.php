<?php
$connection = mysql_connect("localhost", "root","") or die("Failed to connect to MySQL: " . mysql_error());
if(!$connection){
die("conniction vaild");

}
$db=mysql_select_db("381project",$connection) or die("Failed to connect to MySQL: " . mysql_error());    
