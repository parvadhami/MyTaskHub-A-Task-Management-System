<?php
session_start(); 
include('../includes/connection.php');


if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$user_id = $_SESSION['uid']; 
//$username = mysqli_real_escape_string($connection, $_POST['name']);
$password = $_POST['password']; 
$email = $_POST['email'];
$mobile = $_POST['mobile'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;
// Check if image is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script type='text/javascript'>
            alert('File Already Exists...);
            window.location.href = 'profile.php';
            </script>
            ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["profile_image"]["size"] > 500000) {
    echo "<script type='text/javascript'>
    alert('File seems too large...);
    window.location.href = 'profile.php';
    </script>
    ";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script type='text/javascript'>
    alert('ONLY JPG/PNG/GIF/JPEG formats allowed...);
    window.location.href = 'profile.php';
    </script>
    ";
    $uploadOk = 0;
}
// Check if it is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script type='text/javascript'>
    alert('Sorry file not uploaded...);
    window.location.href = 'profile.php';
    </script>
    ";// if everything is ok, upload file
} else {
    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$update_user_query = "UPDATE users SET password = '$password', email = '$email', mobile = '$mobile', image = '$target_file' WHERE uid = $user_id";
if (mysqli_query($connection, $update_user_query)) {
     $_SESSION['success_message'] = "Profile updated successfully.";
     header("Location: profile.php");
     exit();
} else {
    echo "Error updating profile: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
