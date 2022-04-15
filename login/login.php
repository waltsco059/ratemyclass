<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Sign In</title>
    <link href="../style.css" rel="stylesheet">
    <script src="../scripts/login.js"></script>
    <script src="../scripts/register.js"></script>
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

        <form method="POST">
            <div class="login-section">

                <h1>Login here</h1>
                
                <div class="section">
                    <h2>Enter your login and password:</h2>
                    <table>

                        <tr>
                            <td>Username:</td>
                            <td><input id="log_user" name="log_user" type="text" size="30"></td>
                        </tr>
                        
                        <tr>
                            <td>Password:</td>
                            <td><input id="log_pass" name="log_pass" type="text" size="30"></td>
                        </tr>
                        
                    </table>
                </div>
                
                <div class="section">
                    <input type="button" value="Login" onclick="login()">
                    <input type="reset" value="Clear">
                </div>

                <div class="section"><h3>Don't have an account? <a href="register.php">Register here</a></h3></div>

            </div>
        </form>
        
    </div>
</body>
</html>
