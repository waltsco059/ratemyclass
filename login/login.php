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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # clear cookie
        if (isset($_COOKIE["logged_in"])) {
            setcookie("logged_in", "", time()-3600, "/");
            $cookie_cleared = true;
        }
        # loggin validation
        else {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            # check file for valid username and password
            if (file_exists("passwd.txt")) {
                $file = fopen("passwd.txt", "r");
                while (!feof($file)) {
                    $line = explode(":", trim(fgets($file)));
                    $file_user = $line[0];
                    if ($file_user == "") {
                        break;
                    }
                    $file_pass = $line[1];
                    if ($user == $file_user && $pass == $file_pass) {
                        setcookie("logged_in", "$user:$pass", time()+3600, "/");
                        $valid = true;
                        break;
                    }
                }
            }
            if (!$valid) {
                print "<script>alert(\"Username or password invalid.\")</script>\n\n";
            }
        }
    }
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
