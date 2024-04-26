<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles10.css">
    <!-- Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
    <?php
    session_start();
    include('../includes/connection.php');
    $user_id = $_SESSION['uid']; 

    if ($connection === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $select_tasks_query = "select * from tasks WHERE uid = $user_id";
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
                $status_color = 'completed';
                $completed_count++;
                break;
            case 'In-Progress':
                $status_color = 'in-progress';
                $in_progress_count++;
                break;
            case 'Not Started':
                $status_color = 'not-started';
                $not_started_count++;
                break;
            case 'Incomplete':
                $status_color = 'incomplete';
                $incomplete_count++;
                break;
            default:
                $status_color = 'not-started';
                break;
        }
        echo "<div class='sticky-note'>";
        echo "<div class='status-bar $status_color'></div>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
        echo "<p><strong>Start:</strong> " . $row['start_date'] . "</p>";
        echo "<p><strong>Finish by:</strong> " . $row['end_date'] . "</p>";
        echo "</div>";
    }
    mysqli_close($connection);
    ?>

    

</body>
</html>
