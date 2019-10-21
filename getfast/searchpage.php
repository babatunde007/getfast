<?php

header("cache-control:no cache");
session_cache_limiter("private_no_expire");

require('getclass.php');




$obj=new Getfast;


$local=$_SESSION['loc'];

$category=$_SESSION['cate'];

$data=$obj->search($local,$category);





$_SESSION['state']=$_POST['state'];


$_SESSION['custname']=$_POST['custname'];

$_SESSION['custnum']=$_POST['custnum'];

$_SESSION['occasion']=$_POST['occasion'];

$_SESSION['time']=$_POST['time'];

$_SESSION['where']=$_POST['where'];
















?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='css/bootstrap.css' rel='stylesheet'>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Alegreya&display=swap" rel="stylesheet">
    <script src="js/jquery.js"></script>
	<title>searchpage</title>

</head>
<body class="container-fluid">
	
               
  
          <div class='row' align="center">

   	      <div class='col-md-12 col-sm-12 col-xs-12'><a href=""><img src='image/adsss.png'></a></div>

   	      </div>




         <div class='row' id="change">

         	<?php


               $check=count($data);
        


    for($i=0;$i<$check;$i++){



   	      echo "<div class='col-md-4 col-sm-4 col-xs-12'>";

   	      echo"<div class='card-deck' style='margin-top:10px'>";

   	      echo"<div class='card'>";

    echo"<p align='center' style='margin-top:40px'>";echo"<img src=".$data[$i]['bus_owner_pic']." width='150px'></p>";
    echo"<div class='card-body'>";
      echo"<h5 class='card-title'>".$data[$i]['bus_owner_brandname']."</h5>";
      echo"<p class='card-text'>".$data[$i]['bus_owner_add']."</p>";

      echo "<form action='actionrequest.php' method='post'>";


   	  echo "<input type='hidden' name='choice' value='".$data[$i]['bus_owner_id']."'>";

      echo"<button class='btn btn-info btn-block' >Request</button>";

   	  echo "</form>";

    echo"</div>";
    echo"<div class='card-footer'>";
      echo"<small class='text-muted'>Last updated 3 mins ago</small>";
    echo"</div>";

         echo"</div>";

         echo"</div>";

         echo"</div>";

     }

 
?>

   </div>
		



</body>
</html>