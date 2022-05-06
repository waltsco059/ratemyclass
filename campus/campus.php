<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Campus</title>
    <link href="../style.css" rel="stylesheet">

    <link href="https://js.arcgis.com/4.23/esri/themes/light/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.arcgis.com/4.23/"></script>

    <script src="../scripts/campus_map.js"></script>
</head>
<body>
    <!-- Container/Background -->
    <div id="container">

        <!-- Navigation Bar -->
        <div id="navbar">

            <!-- Navbar Logo -->
            <div class="nav-logo">
                <a href="../index.php"><h1>Rate My Class</h1></a>
                <a href="../index.php"><img src="../img/logo.svg" alt="bepo"></a>
            </div>
            
            <!-- Navbar Links -->
            <div class="nav-link">
            <?php
            if($_COOKIE['logged_in'] == TRUE) {
                echo "<a href='../account/account.php'> Account </a>";
            }
            ?>
                <a href="../campus/campus.php"> Campus </a>
                <a href="../contact/contact.php"> Contact </a>
            <?php
            if($_COOKIE['logged_in'] == TRUE) {
                echo "<a href='../scripts/delete_cookie.php'> Sign Out </a>";
            }
            else {
                echo "<a href='../login/login.php'> Sign In </a>";
            }
            ?>
            </div>
        </div>

        <div id="map-container">
            <div id="loader"><img src="../img/load.gif"></div>
            <div id="map"></div>
        </div>

        <div id="campus_links">
            <a href="https://my.utexas.edu" target="_blank"><img id="myut" src="../img/myut.png" alt="myut"></a>
            <div class="logo_text">
                <p class="campus_subtitle">MyUT</p>
                <p class="campus_filler">Check your financials, academics, and registration.</p>
            </div>
            <br>
            <a href="https://canvas.utexas.edu/" target="_blank"><img id="canvas" src="../img/canvas.jpeg" alt="canvas" width="100px" height="100px"></a>
            <div class="logo_text">
                <p class="campus_subtitle">Canvas</p>
                <p class="campus_filler" id="sub_canvas">Check your grades and assignments.</p>
            </div>
            <br>
            <a href="https://www.healthyhorns.utexas.edu/" target="_blank"><img id="healthy_horns" src="../img/healthy_horns.png" alt="healthy_horns" widht="100px" height="100px"></a>
            <div class="logo_text">
                <p class="campus_subtitle" id="health">Healthy Horns</p>
                <p class="campus_filler" id="sub_health">Learn what UT is doing about COVID-19.</p>
            </div>
            
        </div>

        <div id="campus_news">
            <video id="ut_video" controls>
                <source src="../img/UT_720.mp4" type="video/mp4">
            </video>
        </div>
        
    </div>
</body>
</html>
