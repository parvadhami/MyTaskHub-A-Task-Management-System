<?php
    session_start(); 
    include('../includes/connection.php');  
    $query = "delete from subtasks where sid = $_GET[id]";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        echo "<script type='text/javascript'>
            alert('Sub-Task deleted successfully...');
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