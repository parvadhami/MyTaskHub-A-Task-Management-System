<?php
    session_start();
    include('../includes/connection.php');
    if(isset($_POST['create_task'])){
        $query = "insert into tasks values(null,$_POST[id],'$_POST[title]', '$_POST[description]', '$_POST[priority]' , '$_POST[start_date]',  '$_POST[end_date]', '$_POST[status]')";
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
<!-- generate_subtasks.php -->
<?php
    include('../includes/connection.php');
    if(isset($_POST['sub_task'])){
        $query = "insert into subtasks values(null,$_POST[id],'$_POST[title]', '$_POST[description]','$_POST[priority]' , '$_POST[start_date]',  '$_POST[end_date]', '$_POST[status]')";
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
    <title>MyTaskHub</title>
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles3.css">
    <!-- Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
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

        $(document).ready(function(){
            $("#sub_task").click(function(){
                $("#right_sidebar").load("sub_task.php");
            });
        });

        $(document).ready(function(){
            $("#view_task").click(function(){
                $("#right_sidebar").load("view_task.php");
            });
        });

        $(document).ready(function(){
            $("#notes").click(function(){
                $("#right_sidebar").load("notes.html");
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

    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href = "user_dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Get Started!</span>
                </a>
            </li>
            <li>
                <a type="button" class="update" id="view_task">
                    <i class="fa-regular fa-note-sticky"></i>
                    <span>View Tasks</span>
                </a>
            </li>
            <li>
                <a type="button" class="update" id="create_task">
                <i class="fa-solid fa-cubes-stacked"></i>
                <span>Create Tasks</span>
                </a>
            </li>
            <li>
                <a type="button" class="update" id="sub_task">
                <i class="fa fa-code-fork" aria-hidden="true"></i>
                <span>Create Sub-Tasks</span>
                </a>
            </li>
            <li>
                <a href = "manage_task.php" type="button" style="text-decoration:none" class="update" id= "manage_task">
                <i class="fa-solid fa-list-check"></i>
                <span>Manage Tasks</span>
                </a>
            </li>
            
            <li>
                <a href = "event/calendar.html" type="button" style="text-decoration:none" class="update" id= "manage_task">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Calendar View</span>
                </a>
            </li>
            <li>
                <a type="button" class="update" id="notes">
                    <i class="fa-solid fa-pen"></i>
                    <span>Notes to Self</span>
                </a>
            </li>
            <li>
                <a href = "profile.php">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href = "../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <h1>MyTaskHub</h1>
                <span>Email: <?php echo $_SESSION['email']; ?> | Name: <?php echo $_SESSION['name']; ?></span>
                </div>
            <div class="user--info">
            <?php


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['uid']; 
$sql = "SELECT image FROM users WHERE uid = $user_id";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $profile_image = $row['image'];
    echo '<a href="profile.php"><img src="'.$profile_image.'" alt="Profile Image"></a>';
} else {
    echo "Profile image not found";
}


?>
</div>
          

        </div>

    <div id="right_sidebar">
    <style>
        
        #right_sidebar {
            max-width: 1300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
            background-image: linear-gradient(rgba(236, 225, 225, 0.7),rgba(249, 244, 244, 0.7)),url("../bg_1.png");
            background-position: bottom;

        }
        h2 {
            text-align: center;
            color: #254cc1;
        }
        h3 {
            color: #666;
            margin-top: 30px;
        }
        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .section {
            margin-top: 30px;
        }
        .section h3 {
            color: #444;
            margin-top: 20px;
        }
        .section p {
            margin-bottom: 10px;
        }
        .note {
            background-color: #f0f0f0;
            padding: 10px;
            border-left: 4px solid #4b0aef;
            margin-top: 20px;
        }
        .note p {
            margin: 0;
        }
    </style>
        <h2>MyTaskHub User Manual</h2>
        
        <div class="section">
            <h3>Getting Started</h3>
            <p>Welcome to MyTaskHub! This user manual will guide you through the various features and functionalities of our application.</p>
        </div>

        <div class="section">
            <h3>Create Tasks and Sub-tasks</h3>
            <p>To create a new task or a sub-task, simply click on the "Create Task" or the "Create Sub-Task" button located in the navigation menu. You can then enter the details of the task such as title, description, due date, etc.</p>
            <div class="note">
                <p>Note: Fields marked with an asterisk (*) are mandatory.</p>
            </div>
        </div>

        <div class="section">
            <h3>Manage Tasks</h3>
            <p>To update or delete a task, navigate to the "Manage Task" section and click on the task you wish to modify. You will then see options to edit or delete the task.</p>
            <p>To sort tasks based on priority or dates click on the respective column-head.</p>

        </div>

        <div class="section">
            <h3>Viewing Task Status and Progress</h3>
            <p>You can view your tasks alongwith their status in the "View Task" section.</p>
            <p>For the status and progress of your tasks, move to the "Manage Task" section. A pie-chart indicating how many of the tasks have been completed.</p>
        </div>

        <div class="section">
            <h3>Calendar View</h3>
            <p>To get a better view of the tasks and its details you can navigate to the "Calendar View" section where the tasks are shown with respect to the present calendar.</p>
        </div>

        <div class="section">
            <h3>Adding Notes to Tasks</h3>
            <p>Need to jot down some additional information related to a task? You can add notes to tasks by clicking on the "Notes to Self" button and notes for your reference.</p>
        </div>

        <div class="section">
            <h3>Profile</h3>
            <p>Update your profile and upload your profile picture on the "Profile" section.</p>
        </div>

    </div>
    </div>

    
</body>
</html>