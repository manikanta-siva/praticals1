<DOCTYPE html>
<html>
    <head>
    </head>
    <body>

    <?php 
     $connection=mysqli_connect("localhost","root","","data");
     if($connection)
      echo "Database connected";
     else
     echo "Connection Failed";
     
     ?>
     </body>
     </html>