<?php

session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');


$sqlp="SELECT * FROM `or_epin` WHERE `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."' AND `status`='A'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
	$fetchpin=fetcharray($resp);
	  
	 $package=$fetchpin['packid'];
	   
	 $pvalue=getSettingsJoining($conn,$package,'bv');
	 
	
	
$sql1="UPDATE `or_member` SET `paystatus`='A',`approved`='".date('Y-m-d')."',`epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_SESSION['mid']))."'";

$res1=query($conn,$sql1);

$sql2="UPDATE `or_epin` SET `status`='U',`usedby`='".$userid."',`usedon`='".date('Y-m-d')."' WHERE `epin`='".trim(mysqli_real_escape_string($conn,$_POST['epin']))."'";
$res2=query($conn,$sql2);

$sql21="INSERT INTO `or_member_count`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res21=query($conn,$sql21);

$sql41="INSERT INTO `or_member_sales`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res41=query($conn,$sql41);

$sql41="INSERT INTO `or_member_sales1`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res41=query($conn,$sql41);

 
$sql42="INSERT INTO `or_member_count_pair`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res42=query($conn,$sql42);
 
 
 
 //------------------Direct Sponsor Bonus--------------------//
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
if($sponsor)
{ 

$sqlph="SELECT * FROM `or_epin` WHERE `usedby`='".$sponsor."' AND `status`='U'";
$resph=query($conn,$sqlph);
$fetchpinh=fetcharray($resph);
	
	

$direct11=getSettingsJoining($conn,$fetchpinh['packid'],'direct');

$getpakamt=getSettingsJoining($conn,$package,'joining');

$direct=$getpakamt*$direct11/100; 
  
if($direct>0)
{
$sqld="INSERT INTO `direct_income` (`userid`,`dowlineid`,`amount`,`date`) VALUES ('".$sponsor."','".$userid."','".$direct."','".date('Y-m-d')."')";
$resd=query($conn,$sqld);
}
} 
//------------------Direct Sponsor Bonus--------------------//


//-----------------Placement Logic--------------------------//
$position=getMemberUserid($conn,$userid,'position');
$sponchek=getMemberUserid($conn,$userid,'sponsor');
$orguserid=$userid;

function getXtremeDownline($conn,$userid,$placement,$position)
{
$sql="SELECT * FROM `or_genealogy` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['userid'])
{
getXtremeDownline($conn,$userid,$fetch['userid'],$position);
}
}else{
$sqlch="SELECT * FROM `or_genealogy` WHERE `userid`='".$userid."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<1)
{
$sqls="INSERT INTO `or_genealogy` (`userid`,`placement`,`position`,`date`) VALUES('".$userid."','".$placement."','".$position."','".date('Y-m-d')."')";
$ress=query($conn,$sqls);

$sql6="UPDATE `or_member` SET `placement`='".$placement."' WHERE `userid`='".$userid."'";
$res6=query($conn,$sql6);
}
}
}  

if($sponchek!='' && $position!='')
{
getXtremeDownline($conn,$userid,$sponchek,$position);
}
//-----------------------------------//
 
//-------------------------BV Calculation----------------//
$packamt=getSettingsJoining($conn,$package,'bv');
 $packamt1=getSettingsJoining($conn,$package,'joining');
 
$placement=getMemberUserid($conn,$userid,'placement'); 
 
function getSalesDistribute($conn,$userid,$placement,$packamt,$packamt1,$k)
{
$pos=getDownlinePosition($conn,$userid,$placement);
if($pos=='Left') 
{
$ldown=getDownlineCount($conn,$placement,'left');
$leftdown=($ldown+1);

$sqld1="UPDATE `or_member_count` SET `left`='".$leftdown."' WHERE `userid`='".$placement."'";
$resd1=query($conn,$sqld1);


$lbalb=getSales1($conn,$placement,'left');
$tleftb=($lbalb+$packamt1);

$sqlsb="UPDATE `or_member_sales1` SET `left`='".$tleftb."' WHERE `userid`='".$placement."'";

$ressb=query($conn,$sqlsb);



$lbal=getSales($conn,$placement,'left');
$tleft=($lbal+$packamt);

$sqls="UPDATE `or_member_sales` SET `left`='".$tleft."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);



$lbalc=getCountPair($conn,$placement,'left');
$tleftct=($lbalc+1);

$sqls1="UPDATE `or_member_count_pair` SET `left`='".$tleftct."' WHERE `userid`='".$placement."'";
$ress1=query($conn,$sqls1);


}

if($pos=='Right')
{
$rdown=getDownlineCount($conn,$placement,'right');
$rightdown=($rdown+1);

$sqld2="UPDATE `or_member_count` SET `right`='".$rightdown."' WHERE `userid`='".$placement."'";
$resd2=query($conn,$sqld2);



$rbalb=getSales1($conn,$placement,'right');
$trightb=($rbalb+$packamt1);

$sqlsb="UPDATE `or_member_sales1` SET `right`='".$trightb."' WHERE `userid`='".$placement."'";
$ressb=query($conn,$sqlsb);
 


$rbal=getSales($conn,$placement,'right');
$tright=($rbal+$packamt);

$sqls="UPDATE `or_member_sales` SET `right`='".$tright."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);




$rbalc=getCountPair($conn,$placement,'right');
$rbalct=($rbalc+1);

$sqls1="UPDATE `or_member_count_pair` SET `right`='".$rbalct."' WHERE `userid`='".$placement."'";
$ress1=query($conn,$sqls1);
}

$k=$k+1;
$upline=getUplineID($conn,$placement);
if($upline)
{
getSalesDistribute($conn,$placement,$upline,$packamt,$packamt1,$k);
}
}

$k=1;
$upline=getUplineID($conn,$userid);
if($upline)
{
getSalesDistribute($conn,$userid,$upline,$packamt,$packamt1,$k);
} 

//----------------------------------//
 
/*------------------------Pair Income--------------------------*/
 
include('calculate-pair-bonus.php');
 
//-------------End of pair Calculation------------------//

/*------------------------matching Income--------------------------*/

include('calculate-matching-bonus.php');
  
//-------------End of matching Calculation------------------//
  



redirect('dashboard.php?m=1');
}else{
redirect('activation.php?e=1');
}
}
?>