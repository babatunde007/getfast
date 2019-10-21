<?php
 require("getclass.php");

$obj=new Getfast;

$show=$obj->getstate();

if(!isset($_SESSION['user'])){


  header('location:index.php');

}

$data=$obj->dbdetails($_SESSION['user']);

$userPicture=!empty($data['bus_owner_pic'])?$data['bus_owner_pic']:"image/user.jpg";



if(isset($_POST['btn'])){


$db=new mysqli('localhost','root','','getfastplus');

$maxsize=8242880;

$user_id=$_SESSION['user'];

$pic=$_FILES['picture']['name'];

$size=$_FILES['picture']['size'];

$tmp_name=$_FILES['picture']['tmp_name'];


$files=array_filter($pic);


 
 for($i=0;$i<=3;$i++){

   $pictype=$_FILES['picture']['type'][$i];

   $picturetype=array("image/jpg","image/png","image/jpeg","image/gif");


if(in_array($pictype,$picturetype)){

   if($size[$i]>$maxsize || $size[$i]==0 ){

  
        $_SESSION['msg']="file to large.file must be less than 8MP";

        $_SESSION['class']='alert alert-info';



}else{

        
      $new=$pic[$i].$data['bus_owner_email'].time();

      $target_picture="pictures/".$new;

if(isset($tmp_name[$i]) && isset($pic[$i])){
            
            move_uploaded_file($tmp_name[$i],$target_picture);


      $query="INSERT INTO gallery SET gal_name='$pic[$i]',gal_loc='$target_picture',bus_owner_gal_id='$user_id'";

      $db->query($query);

                  $_SESSION['msg']="Upload successfully";

                  $_SESSION['class']='alert alert-info';

                  

}else{

                  $_SESSION['msg']="Unable to Upload photos";

                  $_SESSION['class']='alert alert-info';



}


}

}

}

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


 
	
	<div class="row" style="">

        <div class="col-md-3 col-sm-4 col-xs-12"><img src="image/logo.jpg" height="60" style="margin:20px 20px"></div>

        <div class="col-md-6 col-sm-5 col-xs-12"></div>

          <div class="col-md-1 col-sm-1 col-xs-12" style="margin-top:30px; font-size:25px"><a href=""><b>Store</b></a></div>

        <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top:12px">

        <div  class="pro" style="margin:30px"><img src="<?php echo $userPicture?>"  height='80px' ></div>

        </div>
      
  </div>

<div class="row" style="margin-bottom:20px" >



   <div class="col-md-4 col-sm-4 col-xs-12" style=" padding:20px">

    <div  class="pro" style="margin:30px" align="center"><img src="<?php echo$userPicture?>"  height='100px' ></div>

    <div style="margin:30px" align="center"><b><?php echo $data['bus_owner_brandname']?></b></div>
    
      <form id="pictype" action="" method="post" enctype="multipart/form-data">


                  <input type="file" name="profile" id="profo"><button class="btn btn-info" id="press">upload</button>
                    
                     

  </form>




    <span style="font-size:25px" align="center"><b>Category:<?php echo"<b style='font-size:15px;color:gold;'>".$data['bus_owner_type']."</b>"?></b></span>
    <br>
    <p style="color:gold; font-size:20px" align="center"><button class="btn btn-outline-info" id="edit">Edit Profile</button></p>

   <br>

    <div><button type="button" name="req" id="req" class="btn btn-info btn-block" style="font-size:20px ;color:gold;">View Request</button></div>

    <br>

    <div><button type="button" class="btn btn-info btn-block" id="tap" style="font-size:20px ;color:gold;">Upload Work Sample</button></div>

    <br>
    <p style="color:gold; font-size:20px" align="center"><a href="getout.php">Log Out</a></p>

   </div>
  

   <div class="col-md-7 col-sm-8 col-xs-12" style="background-color:white; border:3px solid rgb(31,185,197); height:600px" id="empty">

    <div class="row">
     
       <div  class="col-md-12" id="empty" >
         
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



       </div>

      


   </div>

</div>



</div>
<div class="row"  id="profile">

      <div  style="margin-top:10px; margin-left:20px;  margin-right:20px;">

    <form action="actionupdate.php" method="post" id="signupform">

               <div class="form-group row">

             <div class="col-md-6 col-sm-6 col-xs-12">
               <label><b>Brandname</b></label>
              <input type="text" class="form-control" placeholder="Brandname" name="brandname"  required="required">
             </div>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <label><b>Number</b></label>
              <input type="text" class="form-control" placeholder="Number" name="number"  required="required">

               </div>
             </div>

             <div class="form-group row">


                  <div class="col-md-6 col-sm-6 col-xs-12">

                      
                       <label><b>City</b></label>

                     <select class="form-control" id="mycity" name="state" onchange="getlocation();">
                      
                      <option>select</option>

                      <?php

                       
                          foreach($show as $r){

                          
                      ?>

                      <option value="<?php echo $r['state_id'];?>" ><?php echo $r["state_name"];?></option>

                      
                      <?php

                        }

                      ?>

                    </select>

                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12" >

                       <label style="margin-right:200px;"><b>Location</b></label>

                    <div  id="loc">
                      <select class="form-control">
                        
                      <option>Area</option>

                      <option></option>

                      </select>
                  </div>
                      

                  </div>
                </div>


               <div class="form-group row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label><b>Address</b></label>

                  <input type="text" class="form-control" placeholder="Address" name="address" required="required">
                 

               </div>

             </div>

             <div><h4>choose category and state price</h4></div>
               <div class="form-group">

                  <input type="checkbox" name="category[]" value="Wedding">
                  <b>Wedding</b>
                  <input type="text"style="margin-left:20px" placeholder="Amount" name="wedding_amount">

               </div>
               <div class="form-group">

                  <input type="checkbox"  name="category[]" value="Birthday">
                  <b>Birthday</b>
                  <input type="text"style="margin-left:20px" placeholder="Amount" name="birthday_amount">

              </div>
              <div class="form-group">

                  <input type="checkbox"  name="category[]" value="Others">
                  <b>Others</b>
                  <input type="text"style="margin-left:33px" placeholder="Amount" name="others_amount">

               </div>
                 <div class="form-group">

                  <input type="hidden"  name="userid" value="<?php echo$_SESSION['user'];?>">
                  

               </div>

              <div class="form-group row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                  <label><b>Description</b></label>

                  <textarea class="form-control" name="description"  required="required" rows="2"></textarea>
                 

               </div>

             </div>
             
               
               <div class="form-group row">
    
                   <div class="col-md-12">

                  <button type="submit" class="btn btn-info btn-block"   id="now"><b>Update</b></button>

                </div>
                 

               </div>
           
           

         </form>

       </div>

       <div class="col-md-3 col-sm-3 col-xs-12"></div>
  

  

        

  </div>
 <div class="row"  id="upload">

      <div   class="col-md-9 col-sm-9 col-xs-12" style="margin-top:30px; margin-left:20px;  margin-right:20px;">

    <form action=""  method="post" enctype="multipart/form-data">

             <h3>Upload work sample photos not more than 8MB.</h3>
             <br>

               <div class="form-group row" style="margin-left:7px">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label><b>First Upload</b></label>

                  <div><span style="color:black" ><input type="file" name="picture[]">
                  

               </div>

             
               </div>
             </div>

               <div class="form-group row" style="margin-left:4px ;margin-top:30px">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label><b>Second Upload</b></label>

                  <div><span style="color:black" ><input type="file" name="picture[]">
s                  

               </div>

             
               </div>
             </div>


               <div class="form-group row" style="margin-left:1px ;margin-top:30px">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label><b>Third Upload</b></label>

                  <div><span style="color:black" ><input type="file" name="picture[]">
                  
            

               </div>
               

               <div class="form-group row" style="margin-top:30px">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label><b>Forth Upload</b></label>

                  <div><span style="color:black" ><input  type="file" name="picture[]">
                  

               </div>

             
               </div>
               
                 

               </div>


              <div class="form-group row" style="margin-left:1px ;margin-top:30px">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  
               <div><button name="btn" class="btn btn-info ">upload</button></div>
             
               </div>
             </div>
               
        

         </form>

       

       </div> 

       <div class="col-md-3 col-sm-3 col-xs-12"></div>
  

</div>

 <div class="row"  id="crequest">

      <div   class="col-md-9 col-sm-9 col-xs-4" style="margin-top:30px; margin-left:20px;  margin-right:20px;">

        <h4>If the below table is <b style="color:red">empty</b> that mean no request yet</h4>

        <table class='table table-responsive'>
      
      <tr>
        
        <th>S/N</th>
         <th>Request date</th>
          <th>Request time</th>
           <th>Service kind</th>
           <th>Request location</th>
           <th>Customer name</th>
           <th>Customer number</th>

      </tr>

       
       <?php

       if(isset($_POST)){



      
     $req=$obj->crequest($_SESSION['user']);



     if(!$req==''){


           $serial=0;
     
     foreach($req as $request){

      $sn=++$serial;

      $custname=$request['cust_req_name'];

      $custnum=$request['cust_req_num'];

      $serv=$request['req_serv_name'];

      $location=$request['req_loc'];

      $time=$request['req_time'];

      $date=date("F j, Y, g:i a",strtotime($request['req_date']));

      echo"<tr>
              <td>Latest request$sn</td>
              <td>$date</td>
              <td>$time</td>
              <td>$serv</td>
              <td>$location</td>
              <td>$custname</td>
              <td>$custnum</td>

          </tr>";

         }


     }
        
        

    

     }

      
      ?>

    </table>

       </div> 

       <div class="col-md-3 col-sm-3 col-xs-12"></div>
  

</div>
<script>

function getlocation(){

var data2send="city="+$('#mycity').val();


   $.get("getlocalg.php",data2send,function(Msg){


         $('#loc').html(Msg);


        });

}

  $(document).ready(function(){

  $('#crequest').hide();
   

  $('#profile').hide();

   $('#upload').hide();

  $('#edit').click(function(){

  var t=$('#profile').html();


  $('#empty').html(t);


  });

  $('#tap').click(function(){

  var t=$('#upload').html();


  $('#empty').html(t);

  


  });

  $('#press').click(function(){

  $('#pictype').on('submit',function(e){

     e.preventDefault();

    $.ajax({

      url:'actionpictures.php',
      type:'POST',
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      
      error:function(err){
               
               console.log(err);

              },

      success:function(data){

        $('.pro').html(data);

        $('#pictype')[0].reset();
      }

    });



  });

   });

   $('#req').click(function(){

  var tt=$('#crequest').html();


  $('#empty').html(tt);

  


  });

  

    });

  </script>


    
</body>
</html>