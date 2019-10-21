<?php


 $state=$_GET['city'];

  $db=new mysqli('localhost','root','','getfastplus');

if($state!=''){

  $sql="SELECT * FROM localg WHERE state_local_id='$state'";

   $pick=$db->query($sql);

   echo "<select id='loc' class='form-control' name='local'>";

   while($row=$pick->fetch_assoc()){

      
     echo "<option value='$row[local_id]'>";echo$row['local_name'];echo"</option>";
       

    }

  echo "</select>";

}

 
















?>