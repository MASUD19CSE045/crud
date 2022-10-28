<?php 
   $connection = mysqli_connect('localhost','root','','users');
   if(!$connection){
      die("Not connected.".mysqli_error($connection));
   }

   if(isset($_REQUEST['edit_id'])){
    $Rcv_id = $_REQUEST['edit_id'];
    $get_info = "SELECT* FROM user_info WHERE id = $Rcv_id";
    $select_info = mysqli_query($connection,$get_info);
    while ($row = mysqli_fetch_assoc($select_info)){
        
  ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title></title>
            <link rel="stylesheet" href="satyle.css">
        </head>
        <body>
        <div class="container">
            <form action="index.php" method="post">
                <table>
                <tr><td>User Name:</td><td><input type="text" name="username" value="<?php echo $row['username'];?>" ></td></tr><br>
                <tr><td>Email:</td><td><input type="email" name="email" value="<?php echo $row['email'];?>" ></td></tr><br>
                <tr><td>Password:</td><td><input type="password" name="password" value="<?php echo $row['password'];?>" ></td></tr><br>
                <tr><td></td><td><input type="submit" name="submit" value="update" ></td></tr><br>
                <tr><td></td><td><input type="hidden" name="updating_hidden_id" value="<?php echo $Rcv_id ; ?>" ></td></tr><br>
                
                </table>
            </form>
        </div>
        </body>
        </html>


<?php
    } 
   }



?>

