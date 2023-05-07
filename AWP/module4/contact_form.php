<!DOCTYPE html>
<html>
    <head>
        <title>Contact Form</title>
        <style>
            .Form{
                align-items="center";
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
        <form action="contact_form.php" method="post" class="Form">
            <legend><h2>Registration Form</h2></legend> <br>

            <label for="mail">Mail: </label>
            <input type="text" name="mail">
            <label for="password">Password:</label>
            <input type="text" name="password">
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>