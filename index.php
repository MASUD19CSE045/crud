<!-- php start here -->
<?php 
                      if(isset($_POST['submit'])){
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            if($username && $email && $password )
                      {


                      $connection = mysqli_connect('localhost','root','','users');

                      if(!$connection){
                          die("Not connected.".mysqli_error());
                      }


                      $query = "INSERT INTO user_info(username, email, password)";
                      $query .= "VALUES('$username','$email','$password')";
                      $result = mysqli_query($connection,$query);

                      if(!$result){
                        die("Not inserted.".mysqli_error());
                      }

                    
                    }
                  }


                ?>

<!-- php end here -->


<!-- html start here -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud</title>
  <link rel="stylesheet" href="satyle.css">
</head>
<body>
  

<!--form start -->
<div class="nav">
      <h2 >Crud Operation</h2>
</div>
                  
                  <div class="container">
                  

                        <div class="form">
                        <h2>Submisson form :</h2>
                        <form action="index.php" method="post">
                          
                          <table>
                          
                          <tr><td class="abc" >User Name:</td><td><input type="text" name="username" ></td></tr>
                          <tr><td class="abc" >Email:</td><td><input type="email" name="email" ></td></tr>
                          <tr><td class="abc" >Password:</td><td><input type="password" name="password" ></td></tr>
                          <tr><td></td><td><input type="submit" name="submit" ></td></tr>
                          </table>

                        </form>
                        </div>
                  </div>
<!-- form end -->


</body>
</html>


<!-- html end here -->




<!-- read php start here -->
 


<!-- php start here -->
 
<?php 
   $connection = mysqli_connect('localhost','root','','users');
   if(!$connection){
      die("Not connected.".mysqli_error($connection));
   }


   $query = "SELECT*FROM user_info";

   $adanprodan = mysqli_query($connection,$query);
   $count = mysqli_num_rows($adanprodan);
   if($count > 0){

    /*if(isset($_REQUEST['deleted'])){
      echo "<font color ='green'>Data deleted</font>";
    }*/

    ?>

    <div class="container">
      
      <table>
      <h2>User Information :</h2>
        <thead>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
          <th>ACTION</th>
        </thead>
      

    <?php
    while ($row = mysqli_fetch_assoc($adanprodan)){
          
          $id = $row['id'];
          $username = $row['username'];
          $email = $row['email'];
          $password = $row['password'];

          ?>
            <tbody>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $password; ?></td>
                <td><button><a href="singledataupdate.php?edit_id=<?php echo $id;?>">Edit</a></button><button><a href="delete.php?id=<?php echo $id?>">Delete</a></button></td>
              </tr>
            </tbody>
          <?php

        }
        ?>
        </table>
        </div>
        <?php
    
  }else{
    echo"you dont have any data in your database.";
  }


  


?> 


<!-- read php end here -->