<?php include "config.php";

if(isset($_POST['login'])){
    include "config.php";
        if(empty($_POST['username']) || empty($_POST['password'])){
            echo '<div class="alert alert-danger">All Field Must be Entered.....!</div>';
            die();
        }
        else{
            $username = mysqli_real_escape_string($conn,$_POST['username']);
            $password = md5($_POST['password']);

            $sql = "SELECT `user_id`,`username`,`role` FROM `user` WHERE `username`='$username' AND `password`='$password'";
            $result = mysqli_query($conn,$sql) or die("Query Failed");

            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_assoc($result)){                                      
                    session_start();
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["user_id"] = $row['user_id'];
                    $_SESSION["user_role"] = $row['role'];
                    header("Location: $hostname/admin/post.php");
                }
            }
        
    else{
        echo '<div class="alert alert-danger">Username And Password Not Matched.....!</div>';
    }
}
}

?>