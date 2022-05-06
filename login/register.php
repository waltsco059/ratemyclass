<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Sign In</title>
    <link href="../style.css" rel="stylesheet">
    <script src="../scripts/register.js"></script>
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
                echo "<a href='../index.php'> Sign Out </a>";
            }
            else {
                echo "<a href='../login/login.php'> Sign In </a>";
            }
            ?>
            </div>
        </div>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    $user = "";
    $pass = "";
    $pass2 = "";
    $register = true;
    # process registration
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $pass2 = $_POST["pass2"];
        $register = true;
        $valid = false;

        // verify the username
        // length between 6 and 10
        if ((strlen($user) < 6) || (strlen($user) > 10)) {
            print "\t<script>alert(\"The username must be between 6 and 10 characters long, inclusive.\")</script>\n\n";
        }
        // letters and digits only
        elseif (preg_match("/^\w*$/", $user) == 0) {
            print "\t<script>alert(\"The username must contain only letters and digits.\")</script>\n\n";
        }
        // cannot begin with a digit
        elseif (preg_match("/^\d/", $user) == 1) {
            print "\t<script>alert(\"The username cannot begin with a digit.\")</script>\n\n";
        }
        
        // verify the password
        // password and repeated password must match
        elseif (!($pass == $pass2)) {
            print "\t<script>alert(\"The password and the repeat password must match.\")</script>\n\n";
        }
        // length between 6 and 10
        elseif ((strlen($pass) < 6) || (strlen($pass) > 10)) {
            print "\t<script>alert(\"The password must be between 6 and 10 characters long, inclusive.\")</script>\n\n";
        }
        // letters and digits only
        elseif (preg_match("/^\w*$/", $pass) == 0) {
            print "\t<script>alert(\"The password must contain only letters and digits.\")</script>\n\n";
        }
        // contains at least one lower case letter
        elseif (preg_match("/[a-z]/", $pass) == 0) {
            print "\t<script>alert(\"The password must have at least one lower case letter.\")</script>\n\n";
        }
        // contains at least one upper case letter
        elseif (preg_match("/[A-Z]/", $pass) == 0) {
            print "\t<script>alert(\"The password must have at least one upper case letter.\")</script>\n\n";
        }
        // contains at least one digit
        elseif (preg_match("/\d/", $pass) == 0) {
            print "\t<script>alert(\"The password must have at least one digit.\")</script>\n\n";
        }
        else {
            $valid = true;
        }

        if ($valid) {
            #validate registration --------------------------------------------------------------------
            # Search for username:password pair in database
            include ('../scripts/db_connect.php');

            $command = "SELECT * FROM users WHERE username = '$user'";
            $result = $mysqli->query($command);

            # If the result is not empty, then registration invalid
            if(($row = $result->fetch_array()))
            {
                $valid = false;
                print "\t<script>alert(\"Username is already in use. Please try another username.\")</script>\n\n";
            }
            # if username is valid, add it to file
            if ($valid) {
                $command = "INSERT INTO users (username, password) VALUES ('$user', '$pass');";
                $result = $mysqli->query($command);
		$mysqli->close();
                $register = false;
            }
        }
    }
    # print registation form
    if ($register) {
print <<<REGISTER
        <form method="POST">
            <div class="login-section">

                <h1>Register here</h1>
                        
                <div class="section">
                    <h2>Enter a login and password:</h2>
                    <table>
                            
                        <tr>
                            <td>Username:</td>
                            <td><input  onmouseover = "popwin('userPopup')" onmouseout = "closewin('userPopup')" name="user" type="text" size="30" value="$user" required></td>
                        </tr>
                                
                        <tr>
                            <td>Password:</td>
                            <td><input onmouseover = "popwin('passwordPopup')" onmouseout = "closewin('passwordPopup')" name="pass" type="password" size="30" value="$pass" required></td>
                        </tr>
                                
                        <tr>
                            <td>Repeat password:</td>
                            <td><input name="pass2" type="password" size="30" value="$pass2" required></td>
                        </tr>
                                
                    </table>
                </div>
                <!-- hidden login requirement popup -->
                <div id="userPopup" class="centered" style="display: none"> 
                    <h2>Requirements for a Username:</h2>
                    <ul>
                        <li>The username must be between 6 and 10 characters long, inclusive.</li>
                        <li>The username must contain only letters and digits.</li>
                        <li>The username cannot begin with a digit.</li>
                    </ul> 
                </div>
                <div id="passwordPopup" class="centered" style="display: none"> 
                    <h2>Requirements for a Password:</h2>
                    <ul>
                        <li>The password and the repeat password must match.</li>
                        <li>The password must be between 6 and 10 characters long, inclusive.</li>
                        <li>The password must contain only letters and digits.</li>
                        <li>The password must have at least one lower case letter.</li>
                        <li>The password must have at least one upper case letter.</li>
                        <li>The password must have at least one digit.</li>
                    </ul> 
                </div>
                        
                <div class="section">
                    <input type="submit" value="Register">
                </div>

            </div>
        </form>

REGISTER;
    }
    else {
	setcookie("logged_in", "$user", time()+3600, "/");
        print <<<SUCCESS
    <div class="login-section">
        <h3>Your registration was successful!</h3>
        <a href="../index.php">Back to homepage</a>
    </div>

SUCCESS;
    header('Location: ../index.php');
    }
?>
        
    </div>
</body>
</html>
