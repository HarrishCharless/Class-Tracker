<?php
    include("connectDB.php");

    if(isset($_POST['save'])){
        $username = (isset($_POST['username'])) ? $_POST['username'] : $_SESSION['username'];
        $email = (isset($_POST['email'])) ? $_POST['email'] : $_SESSION['email'];
        $password = (strlen($_POST['password'])!=40) ? sha1($_POST['password']) : $_POST['password'];
        $emailid = $_POST['emailid'];

        echo $username;
        echo $email;
        echo $password;
        echo $emailid;

        $query = "update engineers set userName='$username', email='$email', password='$password' where email='$emailid'";

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script>alert('error to update user details'); window.history.back(); </script>";
            echo mysqli_error();
        }
        else{
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo "<script>alert('user profile updated successfully :)'); window.location = '../FrontEnd/adminpanel.php';</script>";
        }
    }
?>