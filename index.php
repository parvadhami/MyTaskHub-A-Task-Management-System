<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TMS</title>
    <!-- jQuery file -->
    <script src="includes/jquery_latest.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?
    family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class = "container">
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="register.php">Registration</a></li>
                    <li><a href="user/user_login.php">Login</a></li>
                    <li><a href="">About</a></li>

                </ul>
            </nav>
            <img src="" class="menu-icon">
        </div>

        <div class="row">
            <div class="col">
                <h1>MyTaskHub</h1>
                <p>A tool to make your task managment easy and efficient</p>
                <button onclick="location.href='explore.html'">Explore</button>
            </div>
            
            <div class="col">
                <div class="card card1">
                    <h5 id="a">Tasks</h5>
                    <p id="a">Schedule tasks easily</p>
                </div>
                <div class="card card2">
                    <h5 id="b">Projects</h5>
                    <p id="b">Make timely submissions</p>
                </div>

                <div class="card card3">
                    <h5 class="c">Priorities</h5>
                    <p id="c">Time-sensitive prioritisation</p>
                </div>
                <div class="card card4">
                    <h5 id="d">Efficiency</h5>
                    <p id="d">Optimize productivity</p>
                </div>
            </div>

        </div>
    </div>
</body>

<!--<body background="bg_1.png">   
    <div class="row">
        <div class="col-md-4 m-auto" id="home_page">
            <center><h3> Choose Login</h3></center><br>
            <a href="register.php" class="btn btn-success" style="margin-right: 75px; margin-left: 75px">Registration</a>
            <a href="user/user_login.php" class="btn btn-success">Login</a>
        </div>
    </div>
</body>
</html>-->