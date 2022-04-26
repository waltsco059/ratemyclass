<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Sign In</title>
    <link href="../style.css" rel="stylesheet">
</head>

<body>
    <!-- Container/Background -->
    <div id="container">

        <!-- Navigation Bar -->
        <div id="navbar">

            <!-- Navbar Logo -->
            <div class="nav-logo">
                <a href="../index.html"><h1>Rate My Class</h1></a>
                <a href="../index.html"><img src="../img/logo.svg" alt="bepo"></a>
            </div>
            
            <!-- Navbar Search -->
            <div class="nav-search">
                <form action="#">
                    <input type="search"
                        placeholder="Search Courses"
                        name="home-search">
                </form>
            </div>

            <!-- Navbar Links -->
            <div class="nav-link">
                <img src="../img/pfp.png" alt="pfp"> 
                <a href="../account/account.html"> Account </a>
                <a href="../campus/campus.html"> Campus </a>
                <a href="../contact/contact.html"> Contact </a>
                <a href="../login/login.php"> Sign In </a> 
            </div>
        </div>

<?php
    $user = "";
    $pass = "";
    $valid = false;
    $cookie_cleared = false;

    # Only users who are trying to login or logout post to this script
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        # Logged in users are given an option to sign out.
        # Clicking that option posts to this page, so we clear their cookie.
        if (isset($_COOKIE["logged_in"])) {
            setcookie("logged_in", "", time()-3600, "/");
            $cookie_cleared = true;
        }
        # Otherwise, we attempt login validation
        else {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            # check mysqli database for valid username and password -------------------------------
            $dbUser = "cs329e_bulko_kevingon";
            $database = "spring-2022.cs.utexas.edu";
            $dbPassword = "trout+Any+shout";
            $dbName = "cs329e_bulko_kevingon";

            $mysqli = new mysqli ($database, $dbUser, $dbPassword, $dbName);
            // check if user:pass pair is in the database
            $command = "SELECT * FROM users WHERE (username, password) = ('$user', '$pass');";
        
            // Issue the query
            $result = $mysqli->query($command);

            # If the result is not empty, then set cookie
            if(!($result->num_rows === 0))
            {
                setcookie("logged_in", "$user:$pass", time()+3600, "/");
                $valid = true;
            }

            #---------------------------------------------------------------------------
            if (!$valid) {
                print "<script>alert(\"Username or password invalid.\")</script>\n\n";
            }
        }
    }
    # Present login screen to invalid logins, new users, or those who have chosen to log out
    if ((!isset($_COOKIE["logged_in"]) && !$valid) || $cookie_cleared) { 
        print <<<LOGIN
        <form method="POST">
            <div class="login-section">

                <h1>Login here</h1>
                
                <div class="section">
                    <h2>Enter your login and password:</h2>
                    <table>

                        <tr>
                            <td>Username:</td>
                            <td><input name="user" type="text" size="30" value="$user" required></td>
                        </tr>
                        
                        <tr>
                            <td>Password:</td>
                            <td><input name="pass" type="text" size="30" value="$pass" required></td>
                        </tr>
                        
                    </table>
                </div>
                
                <div class="section">
                    <input type="submit" value="Login">
                </div>

                <div class="section"><h3>Don't have an account? <a href="register.php">Register here</a></h3></div>

            </div>
        </form>

LOGIN;
    }
    else {
        print <<<PAGE
        <form method="POST">
            <div class="login-section">
                <h3>You are currently signed in.</h3>
                <p>Would you like to sign out?</p>
                <input type="submit" value="Yes">
            </div>
        </form>

PAGE;
   }
?>
        
    </div>
</body>
</html>
