<?php           
    session_start();                     
 include("../includes/connection.php");
 if(isset($_POST['edit_task']))
    {
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $priority = mysqli_real_escape_string($connection, $_POST['priority']);
        $start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($connection, $_POST['end_date']);
        $status = mysqli_real_escape_string($connection, $_POST['status']);
        $get_id = mysqli_real_escape_string($connection, $_GET['id']);
        $query = "update tasks 
                  set 
                  uid = $_POST[id], 
                  title='$_POST[title]', 
                  description ='$_POST[description]' , 
                  priority = '$_POST[priority]',
                  start_date ='$_POST[start_date]', 
                  end_date ='$_POST[end_date]', 
                  status = '$_POST[status]' 
                  where tid= $_GET[id]";
            $query_run=mysqli_query($connection, $query);
            if($query_run){
            echo "<script type='text/javascript'>
            alert('Task updated successfully...');
            window.location.href = 'manage_task.php';
            </script>
            ";
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Error! Pls Try again...');
            window.location.href = 'manage_task.php';
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
    <title>MyTaskHub: Edit Task</title>
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles7.css">
    <!-- Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
    <!--Header code-->
    <div class="header--wrapper">
    <div class="header--title">
                <h2>Edit Tasks</h2>
                <span>Email: <?php echo $_SESSION['email']; ?> | Name: <?php echo $_SESSION['name']; ?></span>
    </div>
    <div class="header--title">
                <a href = "user_dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
    </div>
    </div>
    <div class="row">
        <div class = "col-md-4 m-auto" style="color:white;"><br>
        <?php 
            $query = "select * from tasks where tid = $_GET[id]";
            $query_run = mysqli_query($connection, $query);
            while($row= mysqli_fetch_assoc($query_run)){
                ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value= "<?php echo $row1['id'];?>" required>
                </div>
                <div class="form-group">
                    <label>Select user</label>

                        <select class="form-control" name="id" required>
                            <option>-Select-</option>
                            <?php
                                $query1 = "select uid,name from users";
                                $query_run1 = mysqli_query($connection,$query1);
                                if(mysqli_num_rows($query_run1)){
                                    while($row1 = mysqli_fetch_assoc($query_run1)){
                                        ?>
                                        <option value="<?php echo $row1['uid']; ?>"><?php echo $row1['name']?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <textarea class="form-control" rows="1" cols="50" name="title" required><?php echo $row['title']; ?>
                </textarea>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" cols="50" name="description" required><?php echo $row['description']; ?>
                </textarea>
                </div>
                <div class="form-group">
                    <label>Priority</label>
                    <select class="form-control" name="priority" value="<?php echo $row['priority']; ?>" required>
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </div>
                <div class="form-group">
                    <label> Start date:</label>
                    <input type="datetime-local" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>" min="<?php echo date('Y-m-d\TH:i'); ?>" required>
                </div>
                <div class="form-group">
                    <label> End date:</label>
                    <input type="datetime-local" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" min="<?php echo date('Y-m-d\TH:i', strtotime('+1 minute')); ?>" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" value="<?php echo $row['status']; ?>" required>
                        <option>Not Started</option>
                        <option>In-Progress</option>
                        <option>Completed</option>
                        <option>Incomplete</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-warning" name="edit_task" value="Update">
            </form>
            <?php
            }
          ?>
        </div>
    </div>
</body>
</html>