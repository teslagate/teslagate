<?php
/*-----------------Database Connection-----------------------*/
$db_host="localhost"; 		
$db_user='root'; 		
$db_pass='';	
$db_name='meta';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(!$conn){
	echo "Not connect";
}

date_default_timezone_set('Asia/Calcutta');
/*-----------------Database Connection-----------------------*/
$title='MetaInv';
$copyright="MetaInv";
$walletno="TTkyGG4o9wXcx3HB5EdVmeBYj9Ke8A2gR8";
$ethertype="TRC20";
$welcomemail='info@teslagateway.com';
$forgotmail='info@teslagateway.com';
$feedmail='info@teslagateway.com';
$usercode='META';
$weblink='https://teslagateway.com';
error_reporting(0); // Turn off all error reporting

function redirect($url)
{
	header('Location: '.$url);
	exit();
}
function query($conn,$sql)
{
	$res=mysqli_query($conn,$sql);
	return $res;
}
function numrows($exe)
{
	$no=mysqli_num_rows($exe);
	return $no;
}
function fetcharray($res)
{
	$fetch=mysqli_fetch_array($res);
	return $fetch;
}
function input($string)
{
	$string=addslashes(trim(strip_tags($string)));
	return $string;
}

function output($string)
{
	$string=stripslashes(trim(strip_tags($string)));
	return $string;
}

function getUser($conn,$id,$field)
{
	$sql="SELECT * FROM `or_admin` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getSettingsJoining($conn,$pack,$field)
{
	$sql="SELECT * FROM `or_settings_joining` WHERE id='$pack' ORDER BY `id` LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}



function getSettingsLevel($conn,$level,$field)
{
	$sql="SELECT * FROM `gm_settings_level` WHERE `level`='".$level."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}


function getTotalMember($conn)
{
	$sql="SELECT `id` FROM `or_member`";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getActiveMember($conn)
{
	$sql="SELECT `id` FROM `or_member` WHERE `paystatus`='A'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}


function  checkActiveMemberByUserid($conn,$userid)
{
	$sql="SELECT `id` FROM `or_member` WHERE `paystatus`='A' and userid='$userid'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}


function getCheckLevelExist($conn,$userid,$level_userid,$level)
{
	$sql="SELECT * FROM `tbl_leveincome` WHERE `userid`='".$userid."' and level_userid='$level_userid' and level='$level'   ORDER BY `id` DESC";
	$res=query($conn,$sql);
	return $num=numrows($res);

}



function getInactiveMember($conn)
{
	$sql="SELECT `id` FROM `or_member` WHERE `paystatus`='I'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}


function getMember($conn,$id,$field)
{
	$sql="SELECT * FROM `or_member` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch[$field];
	}
}

function getState($conn,$id,$field)
{
	$sql="SELECT * FROM `or_state` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getService($conn,$id,$field)
{
	$sql="SELECT * FROM `or_recharge_service` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getOperator($conn,$id,$field)
{
	$sql="SELECT * FROM `or_operator` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getUserID($conn,$id,$field)
{
	$sql="SELECT * FROM `or_member` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getMemberUserid($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member` WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch[$field];
	}
}

function getPendingWithdrawalAdmin($conn)
{
	$sql="SELECT SUM(`request`) AS total FROM `or_withdrawal` WHERE `status`='P'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

function getApprovedWithdrawalAdmin($conn)
{
	$sql="SELECT SUM(`request`) AS total FROM `or_withdrawal` WHERE `status`='C'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getTotalSupport($conn)
{
	$sql="SELECT `id` FROM `or_support`";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getNoOfFeedback($conn)
{
	$sql="SELECT `id` FROM `or_feedback`";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getEpinMember($conn,$userid)
{
	$sql="SELECT SUM(`total`) AS total FROM `or_member_epin` WHERE `userid`='".$userid."' ORDER BY `id` DESC";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=0;
		}
	}else{
		$total=0;
	}
	return $total;
}

function getTotalReferral($conn)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_referral` ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

function getMemberEPin($conn,$userid)
{
	$sql="SELECT SUM(`total`) AS total FROM `or_member_epin` WHERE `userid`='".$userid."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getAvailableWallet($conn,$userid)
{
	$total=(getBinaryBonus($conn,$userid)+getDirectBonus($conn,$userid)+getLevelBonus($conn,$userid)+getRechargeBonus($conn,$userid)+getMinerincome($conn,$userid, 'minerincome')+getDepositMember($conn,$userid))-(getMemberWithdrawal($conn,$userid)+getDeductMember($conn,$userid)+getRechargeAmount($conn,$userid));

	return $total;
}

function getTotalIncomeMember($conn,$userid)
{
	$total=(getBinaryBonus($conn,$userid)+getDirectBonus($conn,$userid)+getLevelBonus($conn,$userid)+getRechargeBonus($conn,$userid)+getMinerincome($conn,$userid, 'minerincome'));

	return $total;
}


function getBinaryBonus($conn,$userid)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_binary` WHERE `userid`='".$userid."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{ 
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getMinerincome($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member` WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		$total=$fetch[$field];
	}else{
		$total=0;
	}
	return $total;
}

function getDirectBonus($conn,$userid)
{
	$sql="SELECT SUM(`amount`) AS total FROM `direct_income` WHERE `userid`='".$userid."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}



function getLevelBonus($conn,$userid)
{
	$sql="SELECT SUM(`amount`) AS total FROM `tbl_leveincome` WHERE `userid`='".$userid."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}











function getRechargeBonus($conn,$userid)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_recharge` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

function getTotalBinaryBonus($conn)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_binary` ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getTotalDirectBonus($conn)
{
	$sql="SELECT SUM(`amount`) AS total FROM `direct_income` ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getTotallevelBonus($conn)
{
	$sql="SELECT SUM(`amount`) AS total FROM `tbl_leveincome` ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}






function getTotalRechargeBonus($conn)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_recharge` ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getEpinAdmin($conn)
{
	$sql="SELECT * FROM `or_epin` WHERE `status`='A'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getUsedEpinAdmin($conn)
{
	$sql="SELECT * FROM `or_epin` WHERE `status`='U'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getPendingWithdrawalMember($conn,$userid)
{
	$sql="SELECT SUM(`request`) AS total FROM `or_withdrawal` WHERE `userid`='".$userid."' AND `status`='P'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getApprovedWithdrawalMember($conn,$userid)
{
	$sql="SELECT SUM(`request`) AS total FROM `or_withdrawal` WHERE `userid`='".$userid."' AND `status`='C'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getMemberWithdrawal($conn,$userid)
{
	$sql="SELECT SUM(`request`) AS total FROM `or_withdrawal` WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

function getRechargeAmount($conn,$userid)
{
	$sql="SELECT SUM(`total`) AS total FROM `or_member_recharge` WHERE `userid`='".$userid."' AND (`status`='SUCCESS' OR `status`='PENDING')";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

function getDepositMember($conn,$userid)
{
	$sql="SELECT SUM(`amount`) AS total FROM `or_deposit` WHERE `userid`='".$userid."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getDeductMember($conn,$userid)
{
	$sql="SELECT SUM(`amount`) AS total FROM `or_deduct` WHERE `userid`='".$userid."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

function getSettingsWithdrawal($conn,$field)
{
	$sql="SELECT * FROM `or_settings_withdrawal` ORDER BY `id` DESC LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getSettingsRecharge($conn,$field)
{
	$sql="SELECT * FROM `or_settings_recharge` ORDER BY `id` DESC LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getSettingsPin($conn)
{
	$sql="SELECT * FROM `or_settings_pin` ORDER BY `id` DESC LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch['charge'];
	}
}

function getDownlineByPosition($conn,$sponsor,$position)
{
	$sql="SELECT * FROM `or_genealogy` WHERE `placement`='".$sponsor."' AND `position`='".$position."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch['userid'];
	}
}

function getSales($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member_sales` WHERE `userid`='".$userid."'  ORDER BY `id` DESC";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		$total=$fetch[$field];
	}else{
		$total=0;
	}
	return $total;
}

function getSales1($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member_sales1` WHERE `userid`='".$userid."'  ORDER BY `id` DESC"; 
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		$total=$fetch[$field];
	}else{
		$total=0;
	}
	return $total;
}


function getDownlineCount($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member_count` WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		$total=$fetch[$field];
	}else{
		$total=0;
	}
	return $total;
}


function getCountPair($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member_count_pair` WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		$total=$fetch[$field];
	}else{
		$total=0;
	}
	return $total;
}

function getDownlinePosition($conn,$userid,$placement)
{
	$sql1="SELECT * FROM `or_genealogy` WHERE `userid`='".$userid."' AND `placement`='".$placement."'";
	$res1=query($conn,$sql1);
	$num1=numrows($res1);
	if($num1>0)
	{
		$fetch1=fetcharray($res1);

		return $fetch1['position'];
	}
}

function getUplineID($conn,$userid)
{
	$sql="SELECT * FROM `or_genealogy` WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch['placement'];
	}
}

function getCountMatrix($conn,$userid,$table,$level)
{
	$sql="SELECT * FROM ".$table."  WHERE `placement`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	$i=0;
	$arr=array();
	if($num>0)
	{
		while($fetch=fetcharray($res))
		{
			$arr[$i]=$fetch['userid'];

			$i++;
		}

		$count=count($arr);
		if($count>0)
		{
			$arr1=array();
			$j=0;
			for($k=0;$k<$count;$k++)
			{
				$sql1="SELECT * FROM ".$table." WHERE `placement`='".$arr[$k]."'";
				$res1=query($conn,$sql1);
				$num1=numrows($res1);
				if($num1>0)
				{
					while($fetch1=fetcharray($res1))
					{
						$arr1[$j]=$fetch1['userid'];
						$j++;
					}
				}
			}
		}

		$count1=count($arr1);

		if($count1>0)
		{
			$arr2=array();
			$m=0;
			for($l=0;$l<$count1;$l++)
			{
				$sql2="SELECT * FROM ".$table." WHERE `placement`='".$arr1[$l]."'";
				$res2=query($conn,$sql2);
				$num2=numrows($res2);
				if($num2>0)
				{
					while($fetch2=fetcharray($res2))
					{
						$arr2[$m]=$fetch2['userid'];
						$m++;
					}
				}
			}
		}
		$count2=count($arr2);

		if($count2>0)
		{
			$arr3=array();
			$m3=0;
			for($l3=0;$l3<$count2;$l3++)
			{
				$sql3="SELECT * FROM ".$table." WHERE `placement`='".$arr2[$l3]."'";
				$res3=query($conn,$sql3);
				$num3=numrows($res3);
				if($num3>0)
				{
					while($fetch3=fetcharray($res3))
					{
						$arr3[$m3]=$fetch3['userid'];
						$m3++;
					}
				}
			}
		}
		$count3=count($arr3);


		if($count3>0)
		{
			$arr4=array();
			$m4=0;
			for($l4=0;$l4<$count3;$l4++)
			{
				$sql4="SELECT * FROM ".$table." WHERE `placement`='".$arr3[$l4]."'";
				$res4=query($conn,$sql4);
				$num4=numrows($res4);
				if($num4>0)
				{
					while($fetch4=fetcharray($res4))
					{
						$arr4[$m4]=$fetch4['userid'];
						$m4++;
					}
				}
			}
		}
		$count4=count($arr4);
	}

	if($level=='Level 1'){return $count;}
	if($level=='Level 2'){return $count1;}
	if($level=='Level 3'){return $count2;}
	if($level=='Level 4'){return $count3;}
}


function getMatrixUpline($conn,$userid)
{
	$sql="SELECT * FROM  `or_genealogy` WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch['placement'];
	}
}

function getMatrixPlacement($conn,$table)
{
	$sql="SELECT * FROM ".$table." ORDER BY `id` LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch['userid'];
	}
}

function getMatrixNextUserID($conn,$matrixid,$table)
{
	$sql="SELECT * FROM ".$table." WHERE `placement`='".$matrixid."' ORDER BY `id` LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch['userid'];
	}
}

function getGenealogyID($conn,$table,$userid,$field)
{
	$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch[$field];
	}
}

function getGenealogyNextUserID($conn,$table,$id,$field)
{
	$sql="SELECT * FROM ".$table." WHERE `id`>'".$id."' ORDER BY `id` LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch[$field];
	}
}

function dateDiffInDays($conn,$date1,$date2)  
{ 
// Calulating the difference in timestamps 
	$diff = strtotime($date2) - strtotime($date1); 

// 1 day = 24 hours 
// 24 * 60 * 60 = 86400 seconds 
	return abs(round($diff / 86400)); 
} 


function getSponsorByPosition($conn,$userid,$position)
{
	$sql="SELECT `id` FROM `or_member` WHERE `sponsor`='".$userid."' AND `position`='".$position."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getPlacementByPosition($conn,$userid,$position)
{
	$sql="SELECT `id` FROM `or_member` WHERE `placement`='".$userid."' AND `position`='".$position."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getFirstDayWithMonth($conn,$mon,$year)
{
	$currentMonth = $mon;
	$currentYear = $year;
	if($currentMonth == 1) {
		$lastMonth = 12;
		$lastYear = $currentYear - 1;
	}
	else {
		$lastMonth = $currentMonth -1;
		$lastYear = $currentYear;
	}
	if($lastMonth < 10) {
		$lastMonth = '0' . $lastMonth;
	}
	$lastDayOfMonth = date('d', $lastMonth);
	$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
	return $lastDateOfPreviousMonth;
}

function getLastDayWithMonth($conn,$mon,$year)
{
	$currentMonth = $mon;
	$currentYear = $year;
	if($currentMonth == 1) {
		$lastMonth = 12;
		$lastYear = $currentYear - 1;
	}
	else {
		$lastMonth = $currentMonth -1;
		$lastYear = $currentYear;
	}
	if($lastMonth < 10) {
		$lastMonth = '0' . $lastMonth;
	}
	$lastDayOfMonth = date('t', $lastMonth);
	$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
	return $lastDateOfPreviousMonth;
}

function getTotalSponsor($conn,$userid)
{
	$sql="SELECT `id` FROM `or_member` WHERE `sponsor`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}


function getEpinID($conn,$id,$field)
{
	$sql="SELECT * FROM `or_epin` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}


function getEpinpakageBYuserid($conn,$userid)
{
	$sql="SELECT * FROM `or_epin` WHERE `usedby`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res); 
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch['packid'];
	}
}




function getSettingsRewardID($conn,$id,$field)
{
	$sql="SELECT * FROM `or_settings_reward` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

//----------------------------05/13/2022----------------------//
function getActiveSponsor($conn,$userid)
{
	$sql="SELECT `id` FROM `or_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	return $num;
}

function getPendingTotalWithdrawal($conn,$column)
{
	$sql="SELECT SUM(`".$column."`) AS total FROM `or_withdrawal` WHERE`status`='P' ";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

function getApprovedTotalWithdrawal($conn,$column)
{
	$sql="SELECT SUM(`".$column."`) AS total FROM `or_withdrawal` WHERE `status`='C' AND `paid`='P'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getPaidTotalWithdrawal($conn,$column)
{
	$sql="SELECT SUM(`".$column."`) AS total FROM `or_withdrawal` WHERE `status`='C' AND `paid`='C'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


//--------------------05/15/2022--------------------//

function getBlankPosition($conn,$table,$userid)
{
	$sql="SELECT * FROM ".$table." WHERE `placement`='".$userid."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	$i=0;
	$arr=array();
	if($num>=2)
	{
		while($fetch=fetcharray($res))
		{
			$arr[$i]=$fetch['userid'];
			$i++;
		}

		$count=count($arr);
		if($count>=2)
		{
			$arr1=array();
			$j=0;
			for($k=0;$k<$count;$k++)
			{
				$sql1="SELECT * FROM ".$table." WHERE `placement`='".$arr[$k]."'";
				$res1=query($conn,$sql1);
				$num1=numrows($res1);
				if($num1>=2)
				{
					while($fetch1=fetcharray($res1))
					{
						$arr1[$j]=$fetch1['userid'];
						$j++;
					}
				}else{
					$return=$arr[$k];
					break;
				}
			}
		}

		$count1=count($arr1);

		if($count1>=4)
		{
			$arr2=array();
			$m=0;
			for($l=0;$l<$count1;$l++)
			{
				$sql2="SELECT * FROM ".$table." WHERE `placement`='".$arr1[$l]."'";
				$res2=query($conn,$sql2);
				$num2=numrows($res2);
				if($num2>=2)
				{
					while($fetch2=fetcharray($res2))
					{
						$arr2[$m]=$fetch2['userid'];
						$m++;
					}
				}else{
					$return=$arr1[$l];
					break;
				}
			}
		}


		$count2=count($arr2);

		if($count2>=8)
		{
			$arr3=array();
			$m3=0;
			for($l3=0;$l3<$count2;$l3++)
			{
				$sql3="SELECT * FROM ".$table." WHERE `placement`='".$arr2[$l3]."'";
				$res3=query($conn,$sql3);
				$num3=numrows($res3);
				if($num3>=2)
				{
					while($fetch3=fetcharray($res3))
					{
						$arr3[$m3]=$fetch3['userid'];
						$m3++;
					}
				}else{
					$return=$arr2[$l3];
					break;
				}
			}
		}

		$count3=count($arr3);

		if($count3>=16)
		{
			$arr4=array();
			$m4=0;
			for($l4=0;$l4<$count3;$l4++)
			{
				$sql4="SELECT * FROM ".$table." WHERE `placement`='".$arr3[$l4]."'";
				$res4=query($conn,$sql4);
				$num4=numrows($res4);
				if($num4>=2)
				{
					while($fetch4=fetcharray($res4))
					{
						$arr4[$m4]=$fetch4['userid'];
						$m4++;
					}
				}else{
					$return=$arr3[$l4];
					break;
				}
			}
		}


		$count4=count($arr4);

		if($count4>=32)
		{
			$arr5=array();
			$m5=0;
			for($l5=0;$l5<$count4;$l5++)
			{
				$sql5="SELECT * FROM ".$table." WHERE `placement`='".$arr4[$l5]."'";
				$res5=query($conn,$sql5);
				$num5=numrows($res5);
				if($num5>=2)
				{
					while($fetch5=fetcharray($res5))
					{
						$arr5[$m5]=$fetch5['userid'];
						$m5++;
					}
				}else{
					$return=$arr4[$l5];
					break;
				}
			}
		}


		$count5=count($arr5);

		if($count5>=64)
		{
			$arr6=array();
			$m6=0;
			for($l6=0;$l6<$count5;$l6++)
			{
				$sql6="SELECT * FROM ".$table." WHERE `placement`='".$arr5[$l6]."'";
				$res6=query($conn,$sql6);
				$num6=numrows($res6);
				if($num6>=2)
				{
					while($fetch6=fetcharray($res6))
					{
						$arr6[$m6]=$fetch6['userid'];
						$m6++;
					}
				}else{
					$return=$arr5[$l6];
					break;
				}
			}
		}


	}else{
		$return=$userid;
	}

	return $return;
}

//--------------8-4-2020-------------//
function getPackage($conn,$id,$field)
{
	$sql="SELECT * FROM `or_settings_package` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getSettingsMatching($conn,$field)
{
	$sql="SELECT * FROM `or_settings_binary` ORDER BY `id` DESC LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getSettingsPackage($conn,$id,$field)
{
	$sql="SELECT * FROM `or_settings_package` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch[$field];
	}
}

function getLatestPackage($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch[$field];
	}
}

function getLatestPackageUpgrade($conn,$userid,$field)
{
	$sql="SELECT * FROM `or_member_package` WHERE `userid`='".$userid."' AND `remarks`='Upgrade' ORDER BY `id` DESC LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		return $fetch[$field];
	}
}

function getSettingsTransfer($conn,$field)
{
	$sql="SELECT * FROM `or_settings_transfer` ORDER BY `id` LIMIT 1";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}
}

function getTotalPairToday($conn,$userid,$date)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_binary` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}


function getTotalMatchingincomeToday($conn,$userid,$date)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_binary_matching` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}



function getTotalMatchingincomeToday1($conn,$userid,$date)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_binary` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}





function getBinaryBonusDate($conn,$userid,$date)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_binary` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}



function getBinaryBonusDate1($conn,$userid,$date)
{
	$sql="SELECT SUM(`bonus`) AS total FROM `or_commission_binary_matching` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);

		if($fetch['total']>0)
		{
			$total=$fetch['total'];
		}else{
			$total=number_format(0,2);
		}
	}else{
		$total=number_format(0,2);
	}
	return $total;
}

