<?php
    session_start();
    include('../includes/connection.php');
    if(isset($_POST['userLogin'])){
        $query = "select email,password,name,uid from users where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection, $query);
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['uid'] = $row['uid'];

            }
            echo "<script type='text/javascript'>
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Pls Enter Correct details');
            window.location.href = 'user_login.php';
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
    <title>TMS: User Login</title>
    <!-- jQuery file -->
    <script src="includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles1.css">
    <!--Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body id="bg">
    
<div class="loginbox">
    <img src="avatar.jpg" class="avatar">
    <h1>Login</h1>
    <form action="" method="post">
        <p>Email</p>
        <input type="email" name="email" placeholder="Email" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="userLogin" value="Login">
        <a href="#">Forgot password?</a><br>
        <a href="../register.php">Don't have an account yet?</a>
    </form>
</div>
</body>
</html>