<?php
    include('includes/connection.php');
    if(isset($_POST['userRegistration'])){
        $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile], null)";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('User registered successfully');
            window.location.href = 'index.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Pls Try again');
            window.location.href = 'register.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TMS:Registration Page</title>
    <!-- jQuery file -->
    <script src="includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
</head>

<body id="bg">
<div class="loginbox">
    <img src="user/avatar.jpg" class="avatar">
    <h1>Registration</h1>
    <form action="" method="post">
        <p>Name</p>
        <input type="text" name="name" placeholder="Name" required>
        <p>Email</p>
        <input type="email" name="email" placeholder="Email" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Password" required>
        <p>Mobile Number</p>
        <input type="tel" name="mobile" placeholder="Mobile Number" required>
        <input type="submit" name="userRegistration" value="Register">
        <a href="index.php">Go to Home</a><br>
        <a href="user/user_login.php">Go to Login</a>
    </form>
</div>
</div>
</body>
</html>