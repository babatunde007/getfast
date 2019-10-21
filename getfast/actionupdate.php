<?php 

require('getclass.php');


if($_POST){

$user_id=$_POST['userid'];

$bname=$_POST['brandname'];

$add=$_POST['address'];

$num=$_POST['number'];

$des=$_POST['description'];

$cat=$_POST['category'];

$wa=$_POST['wedding_amount'];

$ba=$_POST['birthday_amount'];

$oa=$_POST['others_amount'];

$state=$_POST['state'];

$loc=$_POST['local'];





if(isset($_POST['category'])){

	$cat=$_POST['category'];

}else{

	$cat='';

}


$plus=new Getfast;

//$user_id,$brandname,$number,$add,$cat,$wa,$ba,$oa,$des,$state,$local

$plus->update($user_id,$bname,$num,$add,$cat,$wa,$ba,$oa,$des,$state,$loc);

 


}


?>