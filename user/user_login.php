<?php
    session_start();
    include('../includes/connection.php');
    if(isset($_POST['userLogin'])){
        $query = "select email,password,name from users where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection, $query);
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
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
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3 style="background-color: #5a8f7b">User Login</h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <center><input type="submit" name="userLogin" value="Login" class="btn- btn-warning"></center>
                </div>
            </form>
            <center><a href="../index.php" class="btn btn-danger">Go To home</a></center>
        </div>
</div>
</body>
</html>