<?php
    session_start();
    include('../includes/connection.php');
    if(isset($_POST['create_task'])){
        $query = "insert into tasks values(null,$_POST[id],'$_POST[description]', '$_POST[start_date]',  '$_POST[end_date]', 'Not Started')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task created successfully...);
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error...Pls Try Again');
            window.location.href = 'user_dashboard.php';
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
    <title>TMS: User Dashboard</title>
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <!--jQuery -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
            });
        });

        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
            });
        });

        $(document).ready(function(){
            $("#task").click(function(){
                $("#right_sidebar").load("../task.php");
            });
        });


    </script>
</head>

<body>
    <!--Header--
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block">
                <h3> Task Management System</h3>
            </div>
            <div class="col-md-6" style="display: inline-block; text-align: right;">
                <b><span style="margin-Left:50px">Email:</b> </span>
                <span style="margin-Left: 50px"><b>Name:</b></span>
            </div>
        </div>
    </div>-->
    <header id="header">  
    <h2>Task Management System</h2>  
    <p> Email: <?php echo $_SESSION['email']; ?> | Name: <?php echo $_SESSION['name']; ?></p>  
    </header> 

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
                        <a type="button" class="update" id="create_task">Create Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <a href="manage_task.php" type="button" style="text-decoration:none" class="update" id= "manage_task">Manage Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <a type="button" class="update" id="task">Update Status</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <a href="../logout.php" type="button" id = "same">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10" id="right_sidebar">
            <h4>Instruction for the users</h4>
            <ul style="Line-height: 3em; font-size: 1.2em; List-style-type:none">
                <li>1. Welcome! You can create tasks by clicking on "Create Task" as provided.</li>
                <li>2. You will be providing the name of the person to whom you are assigning the task, the description of that task, the start and the end</li>
                <li>3. Click 'Submit' for designating the task.</li>
                <li>4. For editing or deleting the task, click on 'Manage Task' button.</li>
                <li>5. To change the status of the given task, click on 'Update Task'.</li>
                <li>6. The 'Logout' button will redirect you to the Login page. </li>

            </ul>
        </div>
    </div>
</body>
</html>