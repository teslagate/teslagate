<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
$sql="UPDATE `or_member` SET `name`='".trim(mysqli_real_escape_string($conn,$_POST['name']))."',`address`='".trim(mysqli_real_escape_string($conn,$_POST['address']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`usdtwallet`='".trim(mysqli_real_escape_string($conn,$_POST['usdtwallet']))."' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_SESSION['mid']))."'";
$res=query($conn,$sql);
 
redirect('edit-profile.php?m=1');

}
}
?>