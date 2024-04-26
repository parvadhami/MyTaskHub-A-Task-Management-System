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
    <link rel="stylesheet" type="text/css" href="../css/styles13.css">
    <!-- Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <!--jQuery -->
    <script type="text/javascript"></script>
    <script src="../js/search.js"></script>
</head>
<body>
    <script>
function checkDeadlineExceeded() {
    // request to check if any task deadlines have passed
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'check.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send();
}

// Call the function periodically 
setInterval(checkDeadlineExceeded, 60000); //ms to minute

    </script>

<?php
session_start();
include('../includes/connection.php');


// Get current date
$currentDate = date('Y-m-d');

// Update the status of tasks with exceeded deadlines
$update_query = "UPDATE tasks SET status = 'Incomplete' WHERE end_date < '$currentDate' AND status != 'Completed'";
$update_query2 = "UPDATE subtasks SET status = 'Incomplete' WHERE end_date < '$currentDate' AND status != 'Completed'";

if (mysqli_query($connection, $update_query) && mysqli_query($connection, $update_query2)) {
    header("Location: manage_task.php");
     exit();
} else {
    echo "Error updating task statuses: " . mysqli_error($connection);
}


?>

</body>