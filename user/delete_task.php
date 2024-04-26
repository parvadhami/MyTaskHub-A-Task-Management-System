<?php
    include('../includes/connection.php');
    $query = "delete from tasks where tid = $_GET[id]";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        echo "<script type='text/javascript'>
            alert('Task deleted successfully...');
            window.location.href = 'manage_task.php';
            </script>
            ";
    }
    else{
        echo "<script type='text/javascript'>
            alert('Error! Pls Try again...');
            window.location.href = 'manage_task.php';
            </script>
            ";
    }
?>