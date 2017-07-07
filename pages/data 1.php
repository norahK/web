<?php

$ID = $_GET['Homework ID']; 
require 'connection.php';

$query = "SELECT * FROM homework WHERE Homework ID=$ID";

$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_array($result))
{
?>
<html>
    <body>
         
        <?php
    echo" <a href=". $_SERVER['HTTP_REFERER']."><span class='glyphicon glyphicon-chevron-left'></span> return to course page </a>";
    
        echo $row['Name']."<br>";
		
		echo $row['Grade']."<br>";
		
		echo $row['courseID']."<br>";
}

        ?>
    </body>
</html>
