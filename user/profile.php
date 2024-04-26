<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="../css/styles11.css">
    <!-- Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>Profile</title>
</head>
<body>
    <?php
    session_start();
    include('../includes/connection.php');
    // Check connection
    if ($connection === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Fetch user data from the database
    $user_id = $_SESSION['uid']; // Assuming user ID is stored in session
    $select_user_query = "SELECT * FROM users WHERE uid = $user_id";
    $result = mysqli_query($connection, $select_user_query);

    if (mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
    ?>
    <div class="loginbox">
    <h1>Profile</h1>
    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user_data['name']; ?>">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $user_data['password']; ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user_data['email']; ?>">

        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo $user_data['mobile']; ?>">

        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" name="profile_image">

        <input type="submit" value="Update Profile">
        <a href="user_dashboard.php">Back to Dashboard</a>
    </form>
    </div>
    <?php
    } else {
        echo "User not found.";
    }

    // Close connection
    mysqli_close($connection);
    ?>
</body>
</html>
