<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Rate My Class</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/class_form.js" defer></script>
    <script src="scripts/class_load.js" defer></script>
    <script src="scripts/search_filter.js"></script>

</head>
<body id="homepage">
    <!-- Container/Background -->
    <div id="container">

        <!-- Navigation Bar -->
        <div id="navbar">

            <!-- Navbar Logo -->
            <div class="nav-logo">
                <a href="index.php"><h1>Rate My Class</h1></a>
                <a href="index.php"><img src="img/logo.svg" alt="bepo"></a>
            </div>
            
            <!-- Navbar Search -->
            <div class="nav-search">
            	<input id ="filter" type="search" placeholder="Search Courses" name="home-search">
            </div>

            <!-- Navbar Links -->
            <div class="nav-link">
                <a href="account/account.html"> Account </a>
                <a href="campus/campus.html"> Campus </a>
                <a href="contact/contact.html"> Contact </a>
                <a href="login/login.php"> Sign In </a> 
            </div>
        </div>

        <!-- Filter -->
        <div id="filter-section">
            <h1>Class Filter</h1>
            <form id="filter-classes">
                <table>
                    <tr>
                        <td><label for="filter-college">College</label></td>
                        <td><select id="filter-college" name="filter-college">
                            <option value="">Any</option>
                            <option value="ns">Natural Sciences</option>
                            <option value="la">Liberal Arts</option>
                            <option value="en">Engineering</option>
                            <option value="bu">Business</option>
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
                        <td></td>
			<td><input type="submit" value = "Filter"></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Main Content -->
        <div id="content">
            <!-- Main Content Header -->
            <div class="content-header">
                <p>
                Welcome to Rate My Class, a site that focuses on rating individual classes at UT Austin. If you cannot find a class by using the navigation bar
                above or the filter to the left, then feel free to add a class by clicking the button below. To rate a class, you will be required to login.
                </p>
            </div>
            
            <!-- Add Class -->
            <div id="class-add-icon">
                <button>Add Class</button>
            </div>

            <!--Contact Form-->
            <div id="class-add-popup">
                <form class="class-add-form" action="scripts/class_todb.php" id="class-add-form" method="POST">
                    <h1>Add a Class</h1>
                    <div>
                        <div>
                            <label>Class Name: </label><span id="class-info" class="info"></span>
                        </div>
                        <div>
                            <input type="text" id="add-class" name="add-class" class="inputBox" placeholder="Elements of Web Development">
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Professor Name: </label><span id="professor-info" class="info"></span>
                        </div>
                        <div>
                            <input type="text" id="add-professor" name="add-professor" class="inputBox" placeholder="William Bulko">
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>College: </label><span id="college-info" class="info"></span>
                        </div>
                        <div>
                            <select id="add-college" name="add-college" class="inputBox">
                            <option value="None">Select</option>
                            <option value="ns">Natural Sciences</option>
                            <option value="la">Liberal Arts</option>
                            <option value="en">Engineering</option>
                            <option value="bu">Business</option>
                        </select>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Semester: </label><span id="semester-info" class="info"></span>
                        </div>
                        <div>
                            <select id="add-semester" name="add-semester" class="inputBox">
                                <option value="None">Select</option>
                                <option value="s22">Spring 2022</option>
                                <option value="f21">Fall 2021</option>
                                <option value="s21">Spring 2021</option>
                                <option value="f20">Fall 2020</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <input type="submit" id="send" name="send" value="Add Class">
                        <input type="reset" id="cancel" name="cancel" value="Cancel">
		    </div>
		<br>
                </form>
            </div>

            <!-- Main Content Additions -->
	    <div id="content-pieces"></div>

        </div>

        <!-- News -->
        <div id="news-section">
            <h1> Top Stories </h1>

            <!-- News Piece -->
            <div class="news-piece">
                <a href="https://news.utexas.edu/2022/03/21/high-gas-prices-might-be-here-for-a-while-but-we-have-a-way-out/">
                    <figure>
                        <img src="img/gas.jpg" alt="gas" style="width:100%">
                        <figcaption>High Gas Prices May Stay for a While</figcaption>
                    </figure>
                </a>
            </div>

            <div class="news-piece">
                <a href="https://diversity.utexas.edu/2022/02/01/preserving-austins-black-history/">
                    <figure>
                        <img src="img/steph.png" alt="steph" style="width:100%">
                        <figcaption>Q&A with Stephanie Lang</figcaption>
                    </figure>
                </a>
            </div>

            <div class="news-piece">
                <a href="https://news.utexas.edu/2021/12/02/first-digital-platform-to-track-and-prevent-drug-overdoses-in-texas-launches/">
                    <figure>
                        <img src="img/texas.png" alt="texas" style="width:100%">
                        <figcaption>Tracking & Preventing Overdoses in Texas</figcaption>
                    </figure>
                </a>
            </div>
        </div>
    </div>

    <footer>
        Page Last Updated: 04/15/2022
    </footer>

</body>
</html>
