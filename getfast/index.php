<?php 

include('mainheader.php');

require('getclass.php');


$obj=new Getfast;

$show=$obj->getstate();


$data=$obj->details();





?>

<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12" id='new'>
			

        
            
        	<div style="background-color:rgba(0,0,0,0.5); height:300px; margin-top:97px; border-radius:90px;">
            <br>
        <div class="row" id="quicksearch">
           <div class="col-md-2 col-sm-2 col-xs-2"></div>
          <div class="col-sm-8 col-sm-8 col-xs-8" >
        		<div align="center" style="color:white;"><h2><b>Get the closest Makeup artist & Hair stylist at any location.</b></h2></div>
            <div align="center" style="color:white;"><h3><i>Save time and Get fast!!!</i></h3></div>
             
             <br>

        		<div align="center" >
        			
        			<form action="request.php" method="post">

                <div class="form-group row">


                  <div class="col-md-3 col-sm-3 col-xs-3">

                      
                       <label style="color:gold;  margin-right:200px; font-size:20px">City</label>

                     <select class="form-control" id="city" name="state">
                      
                      <option>select</option>

                      <?php

                       
                          foreach($show as $r){

                          
                      ?>

                      <option value="<?php echo $r['state_id']?>" ><?php echo $r["state_name"];?></option>

                      
                      <?php

                        }

                      ?>

                    </select>

                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3" >

                       <label style="color:gold; margin-right:200px; font-size:20px">Location</label>
                  <div id='loc'>
  

                      <select class="form-control">
                        
                      <option>Area</option>

                      <option></option>

                      </select>
                   </div>

                      

                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">

                      <label style="color:gold; margin-right:200px; font-size:20px">Category</label>

                    <select class="form-control" id="cat" name="cat">
                      
                      <option >looking for</option>

                      <option value="Makeup Artist">Makeup Artist</option>

                      <option value="Hair Stylist">Hair Stylist</option>

                    </select>

                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3" style="margin-top:38px"> <button class="btn btn-info btn-block" >Search</button></div>

                
                  



                </div>

              

              </form>


        		</div>

        		</div>

          </div>

        	</div>

        


		</div>
		
	</div>

	<div class="row" style="margin-top:50px; background-color:rgb(31,185,197);">
		
        <div class="col-md-12 col-sm-12 col-xs-12"><h2 align="center"><b>Why Choose Us</b></h2></div>

	</div>


	<div class="row" style="color:black; padding:20px" id="me">



          <div class="col-md-4 col-sm-4 col-xs-12"style=" padding:20px 20px" >

             <div align="center"><img src="image/newchain.png" height="100"></div>

           

           <div align="center"><h4 style="color:black; "><b>Reliable connection chain</b></h4></div>

          
          <div align="center"><h6  style="color:black;"><b>Our platform help to create reliable chain between business owners and customers</b></h6></div>
      
           </div>

		

          <div class="col-md-4 col-sm-4 col-xs-12" style=" padding:20px 20px" >

             <div align="center"><img src="image/bestprice.png" height="90"></div>

           

           <div align="center"><h4 style="color:black; "><b>Compare prices,save time</b></h4></div>

          
          <div align="center"><h6  style="color:black;"><b>Save money and time by comparing prices from different business owners</b></h6></div>
      
           </div>
  

		 

          <div class="col-md-4 col-sm-4 col-xs-12"style=" padding:20px 20px"  >

             <div align="center"><img src="image/newprivacy.png" height="85"></div>

           

           <div align="center"><h4 style="color:black; "><b>Getfastplus privacy</b></h4></div>

          
          <div align="center"><h6  style="color:black;"><b>All important information provide on the site by business owners or customers is protected</b></h6></div>
      
           </div>
           

       </div>
  <div class="row" style="margin-top:50px;  background-color:rgb(31,185,197);">
		
        <div class="col-md-12 col-sm-12 col-xs-12"><h2 align="center"><b>View Listing</b></h2></div>
  </div>
	   

  <div class="row">

    <?php



    

    for($i=0;$i<=2;$i++){

          echo "<div class='col-md-4 col-sm-4 col-xs-12'>";

          echo"<div class='card-deck' style='margin-top:10px'>";

          echo"<div class='card'>";

    
    echo"<p align='center' style='margin-top:40px'>";echo"<img src=".$data[$i]['bus_owner_pic']." width='150px'></p>";
    echo"<div class='card-body'>";
      echo"<h5 class='card-title'><b style='color:rgb(31,185,197);'>BRAND:</b>".$data[$i]['bus_owner_brandname']."</h5>";
      echo"<p class='card-text'><b style='color:rgb(31,185,197);'>LOCATION:</b>".$data[$i]['bus_owner_add']."</p>";
      echo"<a href='#quicksearch' class='btn btn-info btn-block'>View Details</a>";
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
<script>
  
$(document).ready(function(){


$('#city').change(function(){




  var data2send="city="+$('#city').val();

   $.get("getlocalg.php",data2send,function(Msg){


         $('#loc').html(Msg);


        });






});

$("#search").click(function(){

  var city=$('#city').val();

  var loc=$('#loc').val();

if(city=='' || loc==''){

  $('search').attr();

}else{

$("#city").submit();

$("#loc").submit();

}



});





});






</script>

<?php  include('footer.php');?>