<?php
session_start();//we can delet it !!
if(!isset($_SESSION["user"])){
	header("location:index.php");
} else {
    $connection = mysql_connect("localhost", "root","") or die("Failed to connect to MySQL: " . mysql_error());
if(!$connection){
die("conniction vaild");

}
$db=mysql_select_db("381project",$connection) or die("Failed to connect to MySQL: " . mysql_error());   
    $hid=$_POST['hid'];
   // $tid=$_POST['tid'];
    $tid=$_POST['tid'];
    //json_decode().
	//echo $hid." ".."  ".$_POST['file'];
   // $t="img/".basename($_FILES['file']);
  //  echo $t;
//$file=$_POST['file'];  
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="fils/";

 move_uploaded_file($file_loc,$folder.$file);
// $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
// mysql_query($sql); 
    
	//email details
	//echo date("Y-m-d h:i:sa"); 
//course name
//tname
//file 
    
   //  mail();
    $addq= mysql_query("INSERT INTO `submittedhomeworks` (`file`, `studentID`, `HWID`, `teacherID`, `studentsubmitdate`,`grade`,`file_type`, `size`) VALUES ('".$file."', '".$_SESSION['user']."', '".$hid."', '".$tid."', '".date('Y-m-d')."','-1','".$file_type."', '".$file_size."')");
    
    
         if($addq){//green alart
                require 'send-email-from-localhost-php/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'alnoor0416@gmail.com';          // SMTP username
$mail->Password = 'norah1416'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('alnoor0416@gmail.com', 'CodexWorld');
$mail->addReplyTo('alnoor0416@gmail.com', 'CodexWorld');
$mail->addAddress($_SESSION["email"]);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>subnited sucsussfully </br>date and time:</h1>'.date("Y-m-d h:i:sa");
$bodyContent .= '<p>ate and time:'.date("Y-m-d h:i:sa").'</p>';//cname tname 

if (isset($_FILES['file']) &&
    $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['file']['tmp_name'],
                         $_FILES['file']['name']);
    echo "hii";
}
$mail->Subject = 'submited HW';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
     echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."?&msg=error'</script>";
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}     
             
             
             
             
           // echo "<div class='alert alert-info alert-dismissable'><a class='panel-close close' data-dismiss='alert'>×</a> <i class='fa fa-coffee'></i> You have Successfully submitted HW ..... </div>";
            echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."?&msg=sent  successfully'</script>";
             
                // header('Location: contact.php?msg=sent successfully');
        //return to homework page with error or coorect result 
		   
                      
                  }else {//red alart 
              echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."?&msg=error'</script>";
             
                 //     echo  "<div class='alert alert-info alert-dismissable'> <a class='panel-close close' data-dismiss='alert'>×</a>  <i class='fa fa-coffee'></i>   error in submiting HW .....  </div>";
                      
                      
                  }
                  
                  
              } ?>