<?php
    session_start();
    include('../includes/connection.php');
    $user_id = $_SESSION['uid']; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles6.css">
    <!-- Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <!--jQuery -->
    <script type="text/javascript"></script>
    <script src="../js/search.js"></script>
</head>
<body>
<div class="header--wrapper">
            <div class="header--title">
                <h2>Assigned Tasks</h2>
                <span>Email: <?php echo $_SESSION['email']; ?> | Name: <?php echo $_SESSION['name']; ?></span>
            </div>
            <div class="search-container">
            <a href="manage_task.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                <input type="text" id="searchInput" placeholder="Search...">    
                <ul id="searchResults"></ul>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var searchInput = document.getElementById('searchInput');
            var dataTable = document.getElementById('dataTable');
            var rows = dataTable.getElementsByTagName('tr');

            searchInput.addEventListener('input', function() {
                var searchText = searchInput.value.trim().toLowerCase();

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var cells = row.getElementsByTagName('td');
                    var found = false;

                    for (var j = 0; j < cells.length; j++) {
                        var cell = cells[j];
                        var text = cell.textContent.toLowerCase();

                        // Check if it contains the search text
                        if (text.includes(searchText)) {
                            // Highlight that text
                            var newText = text.replace(new RegExp(searchText, 'gi'), function(match) {
                                return '<span class="highlight">' + match + '</span>';
                            });
                            cell.innerHTML = newText;
                            found = true;
                        }
                    }

                    // display the row based on whether the search text was found
                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
                </div>


            <div class="header--title" >
                <a href = "user_dashboard.php">
                    <h5><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></h5>
                </a>
            </div>
            <!--<div class="user--info">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search"/>
                </div>
                <img src="../login_icon.jpg" alt="" />
            </div>-->
            
</div>
<center><table class="table" id=dataTable style="width:85vw">
        <tr>
            <th>Sr. No.</th>
            <th>Task ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Start Date</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        <?php
            $sno = 1;
            $query = "select * from tasks WHERE uid = $user_id";
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $row['tid']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['priority']; ?></td>
                    <td><?php echo $row['start_date']; ?></td>
                    <td><?php echo $row['end_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><a href="edit_task.php?id=<?php echo $row['tid']; ?>">Update</a> | 
                    <a href="delete_task.php?id=<?php echo $row['tid']; ?>">Delete</a>
                </tr>    
                    <?php
                    //$sno1=1;
                    $i = ord('a');
                    $task_id = $row['tid'];
                    $query2 = "select * from subtasks WHERE tid = $task_id";
                    $query_run2 = mysqli_query($connection, $query2);
                    while ($row2 = mysqli_fetch_assoc($query_run2)){
                        ?>
                <tr>
                    <td><?php echo chr($i); ?></td>
                    <td><?php echo $row2['sid']; ?></td>
                    <td><?php echo $row2['title']; ?></td>
                    <td><?php echo $row2['description']; ?></td>
                    <td><?php echo $row2['priority']; ?></td>
                    <td><?php echo $row2['start_date']; ?></td>
                    <td><?php echo $row2['end_date']; ?></td>
                    <td><?php echo $row2['status']; ?></td>
                    <td><a href="edit_subtask.php?id=<?php echo $row2['sid']; ?>">Update</a> | 
                    <a href="delete_subtask.php?id=<?php echo $row2['sid']; ?>">Delete</a>
                </tr>  
                <?php
                $i++;
            }
                ?>
                
            <?php
                $sno = $sno + 1;
                }
        ?>
    </table></center>
    <center><div class="header--title">
                <a href="check.php" class="btn btn-warning" name="check"><h6>Status Checks</h6></a>
            </div></center>
    <center><div class="card-container">
    <h3 class="main--title"></h3>
    <div class="col-md-2" id="right_sidebar">
            <?php
    include('../includes/connection.php');
    if ($connection === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $select_tasks_query = "SELECT * FROM tasks where uid = $user_id";
    $result = mysqli_query($connection, $select_tasks_query);

    //initialize variables
    $completed_count = 0;
    $in_progress_count = 0;
    $not_started_count = 0;
    $incomplete_count=0;
    // Display tasks 
    while ($row = mysqli_fetch_assoc($result)) {

        $status_color = '';
        switch ($row['status']) {
            case 'Completed':
                $completed_count++;
                break;
            case 'In-Progress':
                $in_progress_count++;
                break;
            case 'Not Started':
                $not_started_count++;
                break;
            case 'Incomplete':
                $incomplete_count++;
                break;
            default:
                $status_color = 'not-started';
                break;
        }
       
    }
    mysqli_close($connection);
    ?>

    <center><div id="pie-chart-container">
        <canvas id="pie-chart" width="300" height="300"></canvas>
    </div></center>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- pie chart -->
    <script>
        var data = {
            labels: ['Completed', 'In progress', 'Not Started', 'Incomplete'],
            datasets: [{
                data: [<?php echo $completed_count; ?>, <?php echo $in_progress_count; ?>, <?php echo $not_started_count; ?>, <?php echo $incomplete_count; ?>],
                backgroundColor: [
                    'rgb(96, 230, 96)',
                    'rgb(242, 242, 76)',
                    'rgb(248, 95, 95)',
                    'rgb(231, 42, 200)',
                ]
            }]
        };

        

        var ctx = document.getElementById('pie-chart').getContext('2d');

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,

            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        padding: 10
                    },
                    title: {
                        display: true,
                        text: 'Your Task Status',
                        position: 'top',
                        font: {
                        size: 18, 
                        weight: 'bold', 
                        family: 'Lucida Sans Unicode', 
                        //style: 'italic', 
                        color: 'blue' 
            }
                    }
                }
            }
        });
    </script>
            
        </div>
        </div></center>
    
</body>
</html>
