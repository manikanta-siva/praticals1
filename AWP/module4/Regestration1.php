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
     $connection=mysqli_connect("localhost","root","","siva");
     if($connection)
      echo "Database connected";
     else
     echo "Connection Failed";
     
     ?>
         <?php if(isset($_POST['submit']))
        {
            $Name=$_POST['Name'];
           $mail=$_POST['mail'];
           $password=$_POST['password'];
           $Gender=$_POST['Gender'];
           $phoneno=$_POST['phoneno'];


           
        $query="INSERT INTO student(Name,mail,password,Gender,phoneno) ";
        $query.="VALUES ('$Name', '$mail','$password','$Gender', '$phoneno)";
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
        <form action="Regestration1.php" method="post" class="Form">
            <legend><h2>Registration Form</h2></legend> <br>
               <label for="Name">Name:</label>
               <input type="text" name="Name"><br>
            <label for="mail">Mail: </label>
            <input type="text" name="mail"><br>
            <label for="password">password:</label>
            <input type="text" name="password"><br>
        
            <label for="Gender">Gender:</label>
            <input type="radio" name="Gender">Male
            <input type="radio" name="Gender">Female <br>
            
            <label for="phoneno">phoneno:</label>
            <input type="text" name="phoneno"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>