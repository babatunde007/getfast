<?php require('getclass.php');

$obj=new Getfast;

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
	<title>sign in</title>

  <style type="text/css">

  	body{

  		font-family: 'Alegreya', serif;
      background-image:url('image/signup.jpg');
      background-style:cover;
      background-repeat:no-repeat;
      background-attachment:fixed;

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

  <script>
    
 $(document).ready(function(){

 $('#now').click(function(){

  var a=$('#pwd').val();
  var b=$('#confirm').val();
  var aa=a.toLowerCase();
  var bb=b.toLowerCase();

  var str=$('#first').val();
  var strr=$('#last').val();
  var strrr=$('#email').val();
  var strrrr=$('#pwd').val();
  var strrrrr=$('#confirm').val();


 

   if(aa!=bb){

   
    $('.show').html('<b>Password mismatch</b>');

  }
   else if(!str.trim() || !strr.trim() || !strrr.trim() || !strrrr.trim() || !strrrrr.trim()){

    $('#showw').html('<b>Fill the field properly</b>');
  
  }
   else if(aa=='' || bb==''){

    $('.show').html('<b>Password is required</b>');

  }else{

    $('#signupform').submit();
  }

  






 });
















 });


















  </script>
		

	
	<div class="row" style="background-color:rgb(248,248,248);">

        <div class="col-md-4 col-sm-4 col-xs-12"><img src="image/logo.jpg" height="60" style="margin:20px 20px"></div>


        <div class="col-md-1"></div>


		<div class="col-md-6 col-sm-6 col-xs-12">
			
 <nav class="navbar navbar-expand-lg navbar-primary">
     
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon" >*</span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav" >
     <ul class="navbar-nav">
         <li class="nav-item active"  style="padding-right:40px; padding-left: 20px;  font-size:25px; margin-top:8px">

                <a class="nav-link" href="getfast.php"><b>Home</b><span class="sr-only">(current)</span></a>

        </li>
        <li class="nav-item"  style="padding-right:40px; font-size:25px; margin-top:8px">

                <a class="nav-link" href="#"><b>About Us</b></a>

        </li>
        <li class="nav-item"  style="padding-right:40px; font-size:25px; margin-top:8px">

                <a class="nav-link" href="#"><b>Store</b></a>

        </li>
        

      
      </ul>
   </div>
</nav> 
  </div>
</div>

<div class="row" style="background-color:rgba(0,0,0,0.4)">

        <div class="col-md-3 col-sm-3 col-xs-12"></div>

         <div class="col-md-6 col-sm-6 col-xs-12" style="padding:60px 50px; color:white">
          <p id="showw" style="color:red; font-size:25px"></p>
          <?php

          //if(isset($_GET['status'])){

           //echo "div class=""".$_GET['status']."</div>";

          //}
          

          if(isset($_SESSION['msg'])){

            $class=$_SESSION['class'];

           echo"<h3 class='$class'>";

            echo $_SESSION['msg'];

           echo "</h3>";

           unset($_SESSION['msg']);

           unset($_SESSION['class']);
            
            }

          ?>

         <form action="getaction.php" method="post" id="signupform">

               <div class="form-group row">

             <div class="col-md-6 col-sm-6 col-xs-12">
               <label><b style="color:gold">Firstname</b></label>
              <input type="text" class="form-control" placeholder="Firstname" name="firstname" id ="first" required="required">
             </div>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <label><b style="color:gold">Lastname</b></label>
              <input type="text" class="form-control" placeholder="Lastname" name="lastname" id ="last" required="required">

               </div>
             </div>
               <div class="form-group row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label><b style="color:gold">Email<b></label>

                  <input type="email" class="form-control" name="email" id ="email" required="required">
                 

               </div>

             </div>

             <div class="form-group row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label><b style="color:gold">Business category<b></label>

                  <div><span style="color:white"><input type="radio" name="category"  value="makeup artist" required="required">    Makeup Artist</span>

                  <span style="color:white"><input type="radio"  name="category" value="hair stylist" required="required">    Hair Stylist</span></div>
                 

               </div>

             </div>

              <div class="form-group row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                <p class="show" style="color:red"></p>
                  <label><b style="color:gold">Password<b></label>

                  <input type="Password" class="form-control" name="pwd" id ="pwd" required="required">
                 

               </div>

             </div>

               <div class="form-group row">

                <div class="col-md-12">

                  <p class="show" style="color:red"></p>
                  <label><b style="color:gold">Confirm password<b></label>

                  <input type="Password" class="form-control" name="confirm" id ="confirm" required="required">
                 

               </div>

             </div>

               
               <div class="form-group row">
    
                   <div class="col-md-12">

                  <button type="submit" class="btn btn-info btn-block" name="signup"  id="now"><b>Sign Up</b></button>

                </div>
                 

               </div>
           
           

         </form>

       </div>

       <div class="col-md-3 col-sm-3 col-xs-12"></div>
  

  

				

	</div>
	

           

         

          
          
      
  
           

          

   
</div>

                                   
  

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>