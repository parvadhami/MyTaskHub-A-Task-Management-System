
<?php
session_start();                     
include("../includes/connection.php");

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    // Delete related records from subtasks table first
    $delete_subtasks_query = "DELETE FROM subtasks WHERE tid = $id";
    $delete_subtasks_result = mysqli_query($connection, $delete_subtasks_query);
    
    if(!$delete_subtasks_result) {
        echo "<script type='text/javascript'>
            alert('Error deleting subtasks: " . mysqli_error($connection) . "');
            window.location.href = 'manage_task.php';
            </script>";
        exit; // Exit the script if there's an error deleting subtasks
    }
    
    // Now delete the task from tasks table
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
