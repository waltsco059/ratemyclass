<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Account</title>
    <link href="../style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../scripts/account_load.js" defer></script>
    <script src="../scripts/class_delete.js" defer></script>
    <script src="../scripts/search_filter.js" defer></script>
    <script src="../scripts/select_filter.js" defer></script>


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
            	<input id ="filter" type="search" placeholder="Search Courses" name="home-search">
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

        <!-- Filter -->
        <div id="filter-section">
            <h1>Class Filter</h1>
                <table>
                    <tr>
                        <td><label for="filter-college">College</label></td>
                        <td><select id="filter-college" name="filter-college">
                            <option value="">Any</option>
                            <option value="ns">Natural Sciences</option>
                            <option value="la">Liberal Arts</option>
                            <option value="en">Engineering</option>
                            <option value="bu">Business</option>
			                <option value="ed">Education</option>
                            <option value="co">Communication</option>
                            <option value="fa">Fine Arts</option>
                            <option value="lw">Law</option>
			                <option value="un">Undergraduate</option>
                        </select></td>
                    </tr>

                    <tr>
                        <td><label for="filter-semester">Semester</label></td>
                        <td><select id="filter-semester" name="filter-semester">
                            <option value="">Any</option>
                            <option value="s22">Spring 2022</option>
                            <option value="f21">Fall 2021</option>
                            <option value="s21">Spring 2021</option>
                            <option value="f20">Fall 2020</option>
                        </select></td>
                    </tr>

                    <tr>
                        <td><label for="filter-difficulty">Difficulty</label></td>
                        <td><select id="filter-difficulty" name="filter-difficulty">
                            <option value="">Any</option>
                            <option value="0">Easy</option>
                            <option value="1">Medium</option>
                            <option value="2">Hard</option>
                        </select></td>
                    </tr>

                    <tr>
                        <td><label for="filter-prating">Professor Rating</label></td>
                        <td><select id="filter-prating" name="filter-prating">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                    </tr>

                    <tr>
                        <td><label for="filter-crating">Class Rating</label></td>
                        <td><select id="filter-crating" name="filter-crating">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                    </tr>

                    <tr>
                        <td><input type="button" value="Reset" onclick="window.location.reload();"></td>
                    </tr>
                </table>
        </div>


	<!-- Main Content -->
        <div id="content">
            <!-- Main Content Header -->
            <div class="content-header">
                <p>
                <b>Hello, <?php echo $_COOKIE['logged_in'] ?>.</b> <br> Welcome to your Account Page! Here you can modify or delete your previous class ratings.
		Please note that the ratings shown on this page reflect your previous ratings, not the overall average.
                </p>
      		
            </div>
 
            <!-- Main Content Additions -->
	    <div id="content-pieces"></div>

        </div>

    </div>
</body>
</html>
