<DOCTYPE html>
<html>
    <head>
        <title>Contact Form</title>
        <style>
            .Form{
                align-items: center;
            }
        </style>
    </head>
    <body>

    <?php 
     $connection=mysqli_connect("localhost","root","","data");
     if($connection)
      echo "Database connected";
     else
     echo "Connection Failed";
     
     ?>

<?php 
     $connection=mysqli_connect("localhost","root","","data");
     if($connection)
      echo "Database connected";
     else
     echo "Connection Failed";
     
     ?>
        <?php if(isset($_GET['submit']))
        {
           $mail=$_POST['mail'];
           $password=$_POST['password'];

           $hashFunction = "$2y$10$";
           $salt = "usesomesillystringforsalt$";

           $hash_salt = '$2a$07$usesomesillystringforsalt$';
           $password=crypt($password,$hash_salt);
           


        //    echo "My mail: ".$mail."<br/>"."My Password: ".$password;
        $query="INSERT INTO registration(Mail,password) ";
        $query.="VALUES ('$mail','$password')";
        $result=mysqli_query($connection,$query);

        if($result)
            {
                echo "the data updated";
            }
        else{
            echo "Data not updated";
        }
        }
        ?>
        <form action="crud.php" method="post" class="Form">
            <legend><h2>Registration Form</h2></legend> <br>

            <label for="mail">Mail: </label>
            <input type="text" name="mail">
            <label for="password">Password:</label>
            <input type="text" name="password">
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
     if(isset($_POST['submit']))
     {
        $id=$_POST['id'];
        $mail=$_POST['mail'];
        $password=$_POST['password'];

        $query="UPDATE data SET ";
        $query.="EMAIL='$mail',";
        $query.="PASSWORD='$password' ";
        $query.="WHERE ID='$id' ";
 
        $result=mysqli_query($connection,$query);
        if(!$result)
        {
            die("Query failed".mysqli_error($connection));
        }
        else
        {
            echo "<br />Updated your record";
        }
     }

     ?>
    <h1>Update record</h1><br>
    <form action="CRUD.php" method="post">
        <input type="email" name="mail" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
         <select name="id"><?php
          $query='SELECT ID FROM data';
          $result=mysqli_query($connection,$query);
          if(!$result)
          {
            die("query failed".mysqli_error($connection));
          }
          else
          {
            echo "<br>result is working<br/>";
            while($row=mysqli_fetch_assoc($result))
            {
                $id=$row['id'];
                echo "<option value='$id'>$id</option>";
            }
        } 
        ?>
        </select>
        <input type="submit" value="Update" name="submit">
    </form>

     </body>
</html>