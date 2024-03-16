<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TMS: User Dashboard</title>
    <!-- jQuery file -->
    <script src="includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("task.php");
            });
        });

    </script>
</head>

<body>
    <!--Header-->
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block">
                <h3> Task Management System</h3>
            </div>
            <div class="col-md-6" style="display: inline-block; text-align: right;">
                <b>Email:</b> <?php echo $_SESSION['email'] ?>
                <span style="margin-Left: 25px"><b>Name:</b><?php echo $_SESSION['name'] ?></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2" id="left_sidebar" >
            <table class="table">
                <tr>
                    <td style="text-align: center">
                        <a href="user_dashboard.php" type="button" id="same">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <a type="button" class="update" id="manage_task">Update Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <a href="admin/manage_task.php" type="button" class="update">Status</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <a href="logout.php" type="button" id = "same">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10" id="right_sidebar">
            <h4>Instruction for Users</h4>
            <ul style="Line-height: 3em; font-size: 1.2em; List-style-type:none">
                <li>1. All Tasks given as below:</li>
                <li>2. All Tasks given as below:</li>

            </ul>
        </div>
    </div>
</body>
</html>