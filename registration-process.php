<?php 
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
//-----------------------------------------//
  $sql1="SELECT * FROM `or_member` WHERE `username`='".$_POST['username']."'";  



$res1=query($conn,$sql1);
  $num1=numrows($res1);




if($num1==0)
{  
	
$sql="SELECT * FROM `or_member` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['sponsor']))."' AND `status`='A' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

$userid=$usercode.rand(1111111,9999999);

$sql="INSERT INTO `or_member` (`userid`,`username`,`sponsor`,`name`,`package`,`position`,`password`,`email`,`phone`,`date`,`status`,`address`) VALUES('".trim($userid)."','".trim($_POST['username'])."','".trim($_POST['sponsor'])."','".trim($_POST['name'])."','".trim($_POST['package'])."','".trim($_POST['position'])."','".base64_encode(trim($_POST['password']))."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".date('Y-m-d')."','A','".trim($_POST['address'])."')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
if($id)
{
/*---------------mail-------------------*/
if($_POST['email'])
{
$headers="From: ".$welcomemail."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Your registration is completed in ".$title;

$message="Dear ".trim($_POST['name'])." ,<br/> Welcome To ".$title.".<br/> User ID: ".$userid." <br/> Password: ".trim($_POST['password'])."<br/> Visit us ".$weblink." to login into your account. <br/><br/>Thanks ".$title;

mail($to,$subject,$message,$headers);
}
/*---------------mail-------------------*/

 

}


if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}else{
redirect('registration.php?msg=4&id='.$id);
}

}else{

if($_REQUEST['case']=='introducer')
{ 
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&q=4');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&q=4');
}
}
} 
else{

if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&q=9');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&q=9');
}
}



//-----------------------------------------//

}
?>