<?php

# get incoming info
$cname = $_GET["cname"];
$professor = $_GET["professor"];
$semester = $_GET["semester"];
$college = $_GET["college"];
$crating = $_GET["crating"];
$prating = $_GET["prating"];
$difficulty = $_GET["difficulty"];

# write dynamic rating page

echo <<<RATING
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Rate a Class!</title>
    <link href="../style.css" rel="stylesheet"> 
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
                <a href="../login/login.html"> Sign In </a> 
            </div>
        </div>

        <div id="rate-background">
            <!-- Class bio -->
            <div class="bio">
                <table>
                    <tr>
                        <td>Class:</td>
                        <td>${cname}</td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>${professor}</td>
                    </tr>
                    <tr>
                        <td>Semester:</td>
                        <td>${semester}</td>
                    </tr>
                    <tr>
                        <td>College:</td>
                        <td>${college}</td>
                    </tr>                        
                </table>
            </div>
            
            <!-- Class Rating -->
            <div class="class-rating">
                <table>
                    <tr>
                        <td>Class Rating:</td>
                        <td>${crating}</td>
                    </tr>
                </table>
            </div>
        
            <!-- Professor Rating -->
            <div class="professor-rating">
                <table>
                    <tr>
                        <td>Professor Rating:</td>
                        <td>${prating}</td>
                </table>
            </div>

            <hr>

            <div class="rating-form">
                <form method='POST'>
                    <table>
                        <tr>
                            <td><label for="user-crating">How would you rate ${cname}?</label></td>
                            <td><select id="user-crating" name="user-crating" required>
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select></td>
                        </tr>

                        <tr>
                            <td><br><label for="user-prating">How would you rate ${professor}?</label></td>
                            <td><br><select id="user-prating" name="user-prating" required>
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select></td>
                        </tr>
			
			<tr>
                            <td><br><label for="user-difficulty">What was the difficulty level of this class?</label></td>
                            <td><br><select id="user-difficulty" name="user-difficulty" required>
                                <option value="">Select</option>
                                <option value="1">Easy</option>
                                <option value="2">Medium</option>
                                <option value="3">Hard</option>
                            </select></td>
                        </tr>

                        <tr>
                            <td><br><input type="reset"></td>
                            <td><br><input type="submit" value="Rate"></td>
                        </tr>
                    </table>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>

RATING;
?>
