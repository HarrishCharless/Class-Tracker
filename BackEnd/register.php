<?php
    session_start();

    include("connectDB.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $pwd = sha1($_POST['password']);
        $name = explode(".", $email);
        // echo $name[0];

        $query = "insert into engineers(userName, email, password) values ('$name[0]', '$email', '$pwd')";

        $result = mysqli_query($con, $query);
        if(!$result){
            header("Location: ../FrontEnd/signup.php");
            echo "<script type='text/javascript'> alert('Registration Unsuccessful try after some time')</script>";
        }
        else{
            // setcookie("user", $name[0], time()+3600, "/");
            header("Location: ../FrontEnd/login.php");
            exit();
        }
    }
?>