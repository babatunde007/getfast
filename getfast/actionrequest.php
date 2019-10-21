<?php

header("cache-control:no cache");
session_cache_limiter("private_no_expire");

require('getclass.php');

if($_POST){

$obj=new Getfast;





$cho=$_POST['choice'];

	
$choice=$obj->cdetails($cho);


	
$real=$obj->gallery($cho);





 $reqloc=$_SESSION['where'];

 $reqtime=$_SESSION['time'];

 $custname=$_SESSION['custname'];

 $custnum=$_SESSION['custnum'];

 $reqname=$_SESSION['occasion'];

 $sta=$_SESSION['state'];

 $loc=$_SESSION['loc'];

 $cat=$_SESSION['cate'];


//$loc,$time,$name,$reqname,$reqnum,$stateid,$localid,$busownerid,$cat
$me=$obj->request($reqloc,$reqtime,$custname,$reqname,$custnum,$sta,$loc,$cat);

if($me){

  $_SESSION['choice']=$me;

}



 $cho=$_POST['choice'];

  $req=$_SESSION['choice'];

  $obj->updaterequest($req,$cho);




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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/jquery.js"></script>
	<title>sign in</title>

  <style type="text/css">

  	body{

  		font-family: 'Alegreya', serif;
  		color:black;
      background-color:rgb(248,248,248);
      border:10px solid rgb(31,185,197);
      
      
  

  	}


  	a{
  		 color:black;

  }
    

  	
   a:hover{
   	     color:rgb(31,185,197);
         text-decoration:none;


   }

   
   }


   }

   
 
  </style>
</head>
<body class="container-fluid">


 
	
	<div class="row">

        <div class="col-md-3 col-sm-4 col-xs-12"><img src="image/logo.jpg" height="60" style="margin:20px 20px"></div>

        <div class="col-md-6 col-sm-5 col-xs-12"></div>

          <div class="col-md-1 col-sm-1 col-xs-12" style="margin-top:30px; font-size:25px"><a href=""><b>Store</b></a></div>

        <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top:12px">

        <div  class="pro" style="margin:30px"><img src="<?php echo $choice['bus_owner_pic']?>"  height='80px' ></div>

        </div>
      
  </div>

<div class="row" style="margin-bottom:20px" >



   <div class="col-md-4 col-sm-4 col-xs-12" style=" padding:20px">

    <div  class="pro" style="margin:30px" align="center"><img src="<?php echo$choice['bus_owner_pic']?>"  height='100px' ></div>

    <div style="margin:30px ;font-size:30px" align="center"><b><?php echo $choice['bus_owner_brandname']?></b></div>
    
    <br>

     <div style="border:3px solid rgb(31,185,197); padding:10px; border-radius:15%;background-color:grey;">

     <div style="border:3px solid rgb(31,185,197); padding:15px; border-radius:15%;background-color:white;">

    <div style="border-bottom:2px solid rgb(31,185,197);border-top:2px solid rgb(31,185,197);margin-top:5px"><span style="font-size:20px;margin-left:10px"><b>Address:</b></span><b style="font-size:20px ; margin-left:10px"><?php echo $choice['bus_owner_add']?></b></div>

    <div class="view" style="border-bottom:2px solid rgb(31,185,197)"><span style="font-size:20px;margin-left:10px"><b>Number:</b></span><b style="font-size:20px ; margin-left:10px;color:gold">press request button to view number</b></div>
    <h5 style="margin-left:10px;margin-top:5px"><b>Description</b></h5>
    <div style="border:2px solid rgb(31,185,197)"><span style="font-size:20px;margin-left:10px"><b style="font-size:20px"><?php echo $choice['bus_owner_decrip']?></b></span></div>


   </div>

   </div>
  
   </div>
   <div class="col-md-7 col-sm-7 col-xs-12" style="background-color:white; border:3px solid rgb(31,185,197); height:600px" id="empty">

    <div class="row">
     
      
         
        <p align="center"><?php

          

          if(isset($_SESSION['msg'])){

            $class=$_SESSION['class'];

           echo"<h3 class='$class' align='center'>";

            echo $_SESSION['msg'];

           echo "</h3>";

           unset($_SESSION['msg']);

           unset($_SESSION['class']);


            
            }

          ?>
            
          </p>


    <div class="col-md-12 col-sm-12 col-xm-12">


    <table class="table table-responsive" align="center" style="font-size:20px">

    	<tr>
    		
    		<th><b>Explore our price list</b></th>

    	</tr>
      
      <tr>
        

          <th><b>Services</b></th>
           <th><b>Our Price</b></th>
      </tr>
      <?php

       $serv=$obj->services($cho);


      foreach($serv as $now){


      $services=$now['serv_name'];

      $price=$now['serv_amt'];


      echo"<tr>
        
              <td><b>$services</b></td>
              <td><b>#$price</b></td>
    

          </tr>";



        }

        ?>
      <tr>
        




      </tr>
      




    </table>

    <h5><b> View our work sample</b></h5>

     <div class='row' id="change">

         	<?php

       if($real!=''){

               $check=count($real);
        


    for($i=0;$i<$check;$i++){



   	      echo "<div class='col-md-3 col-sm-3 col-xs-12'>";

   	      echo"<div class='card-deck' style='margin-top:10px'>";

   	      echo"<div class='card'>";

         echo"<div class='card-body'>";

         echo"<img src='$real[$i]'width='150px'>";

         echo"</div>";

         echo"</div>";

         echo"</div>";

          echo"</div>";

     }

    }
?>

   </div>


      <div class="view" style="margin-top:10px"><button id="req" class="btn btn-info btn-block" name="reqo" style="font-size:20px ; color:gold;">Request</button></div>
    
   </div>
  </div>



       </div>

     <div>

     	


     </div>

      


   </div>

   <div id="num" name="num" style="border-bottom:2px solid rgb(31,185,197);border-top:2px solid rgb(31,185,197);margin-top:5px"><span style="font-size:20px;margin-left:10px"><b>Phone number:</b></span><b style="font-size:20px ; margin-left:10px ;color:red"><?php echo $choice['bus_owner_phone']?></b><span style="margin-left:40px"><a href="getout.php" type="button" class="btn btn-info">Go main page</a></span></div>
<script>
	
$('document').ready(function(){


$('#num').hide();

$('#req').click(function(){


 var view=$('#num').html();

 $('.view').html(view);


});










});


</script>




</body>
</html>