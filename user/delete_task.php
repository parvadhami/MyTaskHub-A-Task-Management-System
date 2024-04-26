
<?php
session_start();                     
include("../includes/connection.php");

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    $delete_subtasks_query = "DELETE FROM subtasks WHERE tid = $id";
    $delete_subtasks_result = mysqli_query($connection, $delete_subtasks_query);
    
    if(!$delete_subtasks_result) {
        echo "<script type='text/javascript'>
            alert('Error deleting subtasks: " . mysqli_error($connection) . "');
            window.location.href = 'manage_task.php';
            </script>";
        exit; 
    }
    
    $delete_task_query = "DELETE FROM tasks WHERE tid = $id";
    $delete_task_result = mysqli_query($connection, $delete_task_query);
    
    if($delete_task_result) {
        echo "<script type='text/javascript'>
            alert('Task deleted successfully...');
            window.location.href = 'manage_task.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Error deleting task: " . mysqli_error($connection) . "');
            window.location.href = 'manage_task.php';
            </script>";
    }
} else {
    echo "<script type='text/javascript'>
            alert('Task ID is not provided.');
            window.location.href = 'manage_task.php';
            </script>";
}
?>
