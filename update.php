<?php 
   $connection = mysqli_connect('localhost','root','','users');
        if(!$connection){
            die("Not connected.".mysqli_error($connection));
          }


   if(isset($_REQUEST['submit'])){
        $user = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        $hidden_id = $_REQUEST['updating_hidden_id'];

        $update_query = "UPDATE user_info SET username = '$user', email ='$email', password = '$pass'WHERE id =$hidden_id";

        $final_update_query = mysqli_query($connection,$update_query);
        if($final_update_query){
                header("location: read.php?updated");
            }
   }
?>