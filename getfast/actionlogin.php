<?php 

require('getclass.php');


if($_POST){



$elogin=trim($_POST['elogin']);

$plogin=trim($_POST['plogin']);

$plus=new Getfast;

$confirm=$plus->login($elogin,$plogin);

if($confirm){

    $_SESSION['user']=$confirm;

    header("location:dashb.php");

}else{
        $_SESSION['msg']='Sign up to have full access to the site';

        $_SESSION['class']='alert alert-danger';

        header("location:signup.php");

      }


}

?>  