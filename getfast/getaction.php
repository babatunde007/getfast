<?php 

require('getclass.php');


if($_POST){

$fname=$_POST['firstname'];

$lname=$_POST['lastname'];

$email=$_POST['email'];

$pwd=md5($_POST['pwd']);


if(isset($_POST['category'])){

	$cat=$_POST['category'];

}else{

	$cat='';

}


$plus=new Getfast;



$plus->signup($fname,$lname,$email,$cat,$pwd);

if($plus){
      
         $_SESSION['msg']='Sign up is complete you can now login';

        $_SESSION['class']='alert alert-danger';

        header("location:signup.php");


}



}

?>