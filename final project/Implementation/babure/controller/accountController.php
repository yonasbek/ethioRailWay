<?php
require_once "connection.php";
class accountcontrol
{
     public $con;
     public function setter()
     {
      $this->con=new connection();
       $this->con->connect();
       session_start();   
     }
     public function account($fullname,$email,$phoneno,$priv,$username,$password,$status)
     {
           $this->setter();
       $query="insert into staff (full_name,email,username,phone_number,password,privilege,status) values('$fullname','$email','$username','$phoneno','$password','$priv','$status')";
       //echo "query is".$query;
       $result=$this->con->conn->query($query);
       $current=date('Y-m-d');
        $query1="insert into staff_report (username,description,date) values('$username','account created','$current')";
        $result1=$this->con->conn->query($query1);
       if($result1)
       {
          return 1;
       }
       else
       {
         return 0;
       }     
     }
}
?>
