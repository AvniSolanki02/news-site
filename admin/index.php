
<?php
    include "config.php";
session_start();
if(isset($_SESSION["username"])){
    header("Location: $hostname/admin/post.php");
}
?>


<!doctype html>

<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">

                            <?php 
                        include "config.php";
                          $sql1 = "SELECT * FROM settings";
                        $result1 = mysqli_query($conn,$sql1) or die("Query Failed.");
                                if(mysqli_num_rows($result1) > 0){
                                    
                                    while($row1 = mysqli_fetch_assoc($result1))  {
                                        if( $row1['logo'] == ""){
                                           echo '<a href="index.php"><h1>'. $row1['websitename'].' </h1></a>'; 
                                        }else{
                                            echo '<a href="index.php" id="logo"><img src="images/' . $row1['logo'] .'" ></a>';
                                        }
                                      
                                    }
                                }

                                ?>
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="login.php" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                                        
        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>