<?php 
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{ 
$sql="SELECT * FROM `or_member` WHERE `username`='".mysqli_real_escape_string($conn,trim($_POST['userid']))."' AND `password`='".base64_encode(mysqli_real_escape_string($conn,trim($_POST['password'])))."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['mid']=$fetch['id'];

redirect('investor/dashboard.php');
}else{
redirect('index.php?e=1');
}
}
?>