<?php
    include('includes/connection.php');
    if(isset($_POST['userRegistration'])){
        $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="register_home_page">
            <center><h3 style="background-color: #5a8f7b">User Registration</h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile no." required>
                </div>
                <div class="form-group">
                    <center><input type="submit" name="userRegistration" value="Register" class="btn- btn-warning"></center>
                </div>
            </form>
            <center><a href="index.php" class="btn btn-danger">Go To home</a></center>
        </div>
</div>
</body>
</html>