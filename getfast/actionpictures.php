

<?php session_start();


$db=new mysqli('localhost','root','','getfastplus');


$user_id=$_SESSION['user'];

$picname=$_FILES['profile']['name'];

$size=$_FILES['profile']['size'];

$tmpname=$_FILES['profile']['tmp_name'];

$imagetype=$_FILES['profile']['type'];

$fileallowed=array('image/jpg','image/png','image/gif','image/jpeg');


$destination="pictures/".$picname;


if(in_array($imagetype,$fileallowed)){

   if($size>(1024*1000*5) || $size==0 ){

                  $_SESSION['msg']="the size is to much";

                  $_SESSION['class']='alert alert-info';



}else{

        

if(isset($tmpname) && isset($picname)){
            
            move_uploaded_file($tmpname,$destination);

      $sql="UPDATE businessowner SET bus_owner_pic='$destination' WHERE bus_owner_id='$user_id'";

       $db->query($sql);
           
             echo "<img src='$destination'/ height='100px'>";


                  

}
}

}








?>