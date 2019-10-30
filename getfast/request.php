<?php 
header("cache-control:no cache");
session_cache_limiter("private_no_expire");

include('mainheader.php');
require('getclass.php');

$obj=new Getfast;

if(!$_POST==''){

$_SESSION['loc']=$_POST['local'];

$_SESSION['cate']=$_POST['cat'];

}else{

header('location:index.php');

}




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
	<title>requestpage</title>

  <style type="text/css">

  	body{

  		font-family: 'Alegreya', serif;
      color:black;
      background-color:rgb(248,248,248);
  
    

  	}


  	a{
  		color:black;
  	}

  	
   .nav-link:hover{
   	     color:rgb(31,185,197);

  }

  








  </style>
</head>
<body class="container-fluid">

 
		

	


<div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12"></div>

         <div class="col-md-6 col-sm-6 col-xs-12" style="padding:40px 20px; background-color:white; border:5px solid rgb(31,185,197); height:800px; border-radius:5%">
          <p id="show" style="color:red; font-size:25px"></p>
          <?php

        
          

          if(isset($_SESSION['msg'])){

            $class=$_SESSION['class'];

           echo"<h3 class='$class'>";

            echo $_SESSION['msg'];

           echo "</h3>";

           unset($_SESSION['msg']);

           unset($_SESSION['class']);
            
            }

          ?>

          <h3 align="center">Let get some details to help you search properly</h3>
          <br>
         <form action="searchpage.php" method="post" id="requestform">

               <div class="form-group">
                  <label><b style="color:black">Name<b></label>

                  <input type="text" class="form-control" required="required" name="custname" id="name">
                 

               </div>
               <div class="form-group">
                  <label><b style="color:black">Number<b></label>

                  <input type="text" class="form-control" required="required" name="custnum" id="num">
                 

               </div>
               <div><h5 style="color:rgb(31,185,197)">Choose  the occasion type</h5></div>
               <div class="form-group">

                  <input type="radio" name="occasion" value="Wedding" class="occ">
                  <b>Your Wedding</b>

               </div>
               <div class="form-group">

                  <input type="radio"  name="occasion" value="Birthday" class="occ">
                  <b>Birthday</b>

              </div>
              <div class="form-group">

                  <input type="radio"  name="occasion" value="Others" class="occ">
                  <b>Other occasions</b>

               </div>
               <div class="form-group">

                <div><h5 style="color:rgb(31,185,197)">Choose Where</h5></div>
            

                  <input type="radio" name="where" value="studio/shalon" class="where">
                  <b>Studio/shaloon</b>

               </div>
               <div class="form-group">

                  <input type="radio"  name="where" value="my place" class="where">
                  <b>My place</b>

               </div>
                <div class="form-group">

                <div><h5 style="color:rgb(31,185,197)">Choose When</h5></div>
            

                  <input type="radio" name="time" value="today" class="time">
                  <b>Today</b>

               </div>
               <div class="form-group">

                  <input type="radio"  name="time" value="this week" class="time">
                  <b>This week</b>

               </div>
               <div class="form-group">

                  <input type="radio"  name="time" value="weekend" class="time">
                  <b>Weekend</b>

               </div>
               <div class="form-group">

                <input type="hidden"  name="state" value="<?php echo $_POST['state']?>" id="state">
                  

               </div>
               
               <div>
    

                  <button  class="btn btn-success btn-block" id="search">Search</button>
                 

               </div>
           
           

         </form>
         <p align="center" ><a href="" aria-disabled="true">Do you need makeup accessories? Check our Store</a></p>

       </div>

       <div class="col-md-3 col-sm-3 col-xs-12"></div>
  

  

				

	</div>
	

  <script>
  
  $(document).ready(function(){

$('#search').click(function(){

 var a=$('#name').val();
 var n=$('#num').val();
 var w=$('.where').val();
 var t=$('.time').val();
 var o=$('.occ').val();




  if(aa=='' || n=='' || w==''|| t==''||o==''){

  
   $('#show').html('<b>check the ommited field</b>');

 }
  else if(!a.trim() || !n.trim() || !w.trim() || !t.trim() || !o.trim()){

   $('#show').html('<b>Fill the field properly</b>');
 

 }else{

   $('#requestform').submit();
 }

 






});



});

  
   
  
  
  
  </script>         
                                
  

    
</body>
</html>