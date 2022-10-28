

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

    if(isset($_REQUEST['deleted'])){
      echo "<font color ='green'>Data deleted</font>";
    }

    ?>
      <table>
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
        
        <?php
    
  }else{
    echo"you dont have any data in your database.";
  }


  


?>
