<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles9.css">
    <!--External AJAX file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div style="display: flex;" class="row">
        <!-- Left Sidebar for Creating Subtasks -->
        <div style="flex: 1;">
        <div class="col-md-6">
        <h3>Create Subtasks</h3>

        <form action="" method="POST">
        <div class="form-group">
            <label>Select Task</label>
                <select class="form-control" name="id">
                    <option>-Select-</option>
                    <?php
                        session_start();
                        include("../includes/connection.php");
                        $user_id = $_SESSION['uid'];
                        $query = "select tid,title from tasks where uid = $user_id";
                        $query_run = mysqli_query($connection,$query);
                        if(mysqli_num_rows($query_run)){
                            while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <option value="<?php echo $row['tid']; ?>"><?php echo $row['title']?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
            
        </div>
        <label for="title">Title:</label><br>
        <input type="text" rows="1" cols="50" id="title" name="title"><br>

        <label for="description">Description:</label><br>
        <textarea id="description" rows="3" cols="50" name="description"></textarea><br>

        <label>Priority</label>
                    <select class="form-control" name="priority" value="<?php echo $row['priority']; ?>" required>
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>

        <label for="start_date">Start Date:</label><br>
        <input type="datetime-local" id="start_date" name="start_date" min="<?php echo date('Y-m-d\TH:i'); ?>" required><br>

        <label for="deadline">Deadline:</label><br>
        <input type="datetime-local" id="end_date" name="end_date" min="<?php echo date('Y-m-d\TH:i', strtotime('+1 minute')); ?>" required><br>
        
        <label>Status</label>
                    <select class="form-control" name="status" value="<?php echo $row['status']; ?>" required>
                        <option>Incomplete</option>
                        <option>Not Started</option>
                        <option>In-Progress</option>
                        <option>Completed</option>

                    </select>
        <!--<input type="submit" value="Create Subtask">
        <div class="form-group">
                <label for="num_subtasks">Number of Subtasks:</label><br>
                <input type="number" id="num_subtasks" name="num_subtasks" min="1" required><br><br>
        </div>-->
                <input type="submit" class="btn btn-warning" name="sub_task" value="Generate Subtasks">
        </form>
        </div>
        <!-- Right Sidebar for Displaying Generated Subtasks 
        <div id="generatedSubtasks" style="flex: 1;">
            Generated subtasks will be displayed here 
        </div>-->
                    </div>
    </div>

    <!--<script>
        $(document).ready(function() {
            // Form submission using AJAX
            $('#subtaskForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission
                var formData = $(this).serialize(); // Serialize form data

                // AJAX request to generate_subtasks.php
                $.ajax({
                    type: 'POST',
                    url: 'generate_subtasks.php',
                    data: formData,
                    success: function(response) {
                        $('#generatedSubtasks').html(response); // Display response in the right sidebar
                    }
                });
            });
        });
    </script>-->
</body>
</html>
