<?php 




class Getfast{


       private $get;

  public function __construct(){session_start();

     

    $this->get=new mysqli('localhost','root','','getfastplus');


  }

 
  public function signup($fname,$lname,$email,$category,$pwd){



    $sql="INSERT INTO businessowner SET bus_owner_fname='$fname', bus_owner_lname='$lname', bus_owner_email='$email', bus_owner_type='$category', bus_owner_pwd='$pwd'";

    $show=$this->get->query($sql);



    if($show){

           $now=$this->get->insert_id;

           
           
        $_SESSION['user']=$now;

         header('location:dashb.php');


          }

  
      
}

 public function login($email,$pwd){

       $encrp=md5($pwd);

      $sql="SELECT * FROM businessowner WHERE bus_owner_email='$email' AND bus_owner_pwd='$encrp'";

      $click =$this->get->query($sql);

      if($click->num_rows == 1){

        $rows=$click->fetch_assoc();

        $user_id=$rows['bus_owner_id'];

        return $user_id;

      }

  
    }


    public function logout(){

            unset($_SESSION['msg']);

            unset($_SESSION['class']);

            session_destroy();


    }

    public function dbdetails($userid){

      $sql="SELECT * FROM businessowner WHERE bus_owner_id='$userid'";

      $show=$this->get->query($sql);


      if($show->num_rows ==1){

           $details=$show->fetch_assoc();

           return $details;

      }



    }


    public function getstate(){

      $sql="SELECT * FROM state";

      $check=$this->get->query($sql);

      $state=[];

      while($result=$check->fetch_assoc()){

         $state[]=$result;


      }

       return $state;


      
    }

    public function request($loc,$time,$name,$reqname,$reqnum,$stateid,$localid,$cat){



    $sql="INSERT INTO requests SET req_loc='$loc', req_time='$time',cust_req_name='$name', req_serv_name='$reqname', cust_req_num='$reqnum', state_req_id='$stateid',local_req_id='$localid',req_serv_cat='$cat'";

    $check =$this->get->query($sql);


     if($check){

      $req_id=$this->get->insert_id;

      return $req_id;

    
    }


}

  public function update($user_id,$brandname,$number,$add,$cat,$wa,$ba,$oa,$des,$state,$local){

   $sql="UPDATE businessowner SET bus_owner_brandname='$brandname',bus_owner_phone='$number',bus_owner_add='$add', bus_owner_decrip='$des',bus_owner_state_id='$state',bus_owner_local_id='$local' WHERE bus_owner_id='$user_id'";

    $check=$this->get->query($sql);

    if($check){

     

     if(isset($cat[0])){

          $query="INSERT INTO services SET serv_name='$cat[0]',serv_amt='$wa',bus_owner_serv_id='$user_id'";

          $this->get->query($query);


     }
     if(isset($cat[1])){

          $query="INSERT INTO services SET serv_name='$cat[1]',serv_amt='$ba',bus_owner_serv_id='$user_id'";

          $this->get->query($query);


     }

     if(isset($cat[2])){

          $query="INSERT INTO services SET serv_name='$cat[2]',serv_amt='$oa',bus_owner_serv_id='$user_id'";

          $this->get->query($query);


     }

        $_SESSION['msg']='Profile updated succefully';

        $_SESSION['class']='alert alert-info';

        header("location:dashb.php");

    
    }else{

         $_SESSION['msg']='Something went wrong retry';

        $_SESSION['class']='alert alert-info';

        header("location:dashb.php");




    }





  }

  public function search($local,$bustype){

      $sql="SELECT * FROM businessowner WHERE bus_owner_local_id='$local' AND bus_owner_type='$bustype'";

      $real=$this->get->query($sql);
      
        $get=array();

      while($now=$real->fetch_assoc()){
            
            $get[]=$now;

          


      }

      return $get;
   

}

public function details(){

      $sql="SELECT * FROM businessowner";

      $show=$this->get->query($sql);

     $geto=array();

      while($now=$show->fetch_assoc()){
            
            $geto[]=$now;

          


      }

      return $geto;
      



    }

     public function cdetails($userid){

      $sql="SELECT * FROM businessowner WHERE bus_owner_id='$userid'";

      $show=$this->get->query($sql);


      if($show->num_rows >0){

           $detail=$show->fetch_assoc();

           return $detail;

      }




}

 public function gallery($userid){

      $sql="SELECT * FROM gallery WHERE bus_owner_gal_id='$userid'";

      $show=$this->get->query($sql);

      if($show->num_rows >0){

        while ($row = $show->fetch_assoc()){

        $gal_loc[]=$row["gal_loc"];
        
       
    }

         return $gal_loc;
      }




}


  public function updaterequest($req_id,$choice){

   $sql="UPDATE requests SET bus_owner_req_id='$choice' WHERE req_id='$req_id'";

    $check=$this->get->query($sql);
  

  

}

public function services($userid){

      $sql="SELECT * FROM services WHERE bus_owner_serv_id='$userid'";

      $show=$this->get->query($sql);

      if($show->num_rows >0){

        while ($row = $show->fetch_assoc()){

        $result[]=$row;
        
       
    }

         return $result;
      }




}

public function crequest($userid){

      $sql="SELECT * FROM requests WHERE bus_owner_req_id='$userid' ORDER BY req_id desc limit  3 ";

      $show=$this->get->query($sql);


      if($show->num_rows >0){

          while($detail=$show->fetch_assoc()){

           $get[]=$detail;

      }

       return $get;
  }

}


}

?>
