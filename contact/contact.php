<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Contact</title>
    <link href="../style.css" rel="stylesheet"> 
</head>
<body id="contact">
    <!-- Container/Background -->
    <div id="container">

        <!-- Navigation Bar -->
        <div id="navbar">

            <!-- Navbar Logo -->
            <div class="nav-logo">
                <a href="../index.php"><h1>Rate My Class</h1></a>
                <a href="../index.php"><img src="../img/logo.svg" alt="bepo"></a>
            </div>
            
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

        <!-- Contact -->
        <div class="contact">
            <!-- Contact Top -->
            <div class="contact-top">
                <!-- Contact Top Piece -->
                <div class="contact-piece">
                    <img src="../img/Cole.jpg" alt="cole">
                    <table>
                        <tr>
                            <td>Cole Walts</td>
                        </tr>
                        <tr>
                            <td>Geography</td>
                        </tr>
                        <tr>
                            <td>Class of 2022</td>
                        </tr>
                        <tr>
                            <td><a href="mailto:cdw3468@utexas.edu">Email</a></td>
                        </tr>
                        <tr>
                            <td><p>Hi there, my name is Cole! I am a GIS Solutions Engineer Intern at Esri. I am also new to web development, but so far I really enjoy it. I would like to use my knowledge from this class to create cool webmaps someday!</p></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!--TODO-->
            <div class="contact-top">
                <div class="contact-piece">
                    <img src="../img/kevin.jpg" alt="kevin">
                    <table>
                        <tr>
                            <td>Kevin Gonzalez</td>
                        </tr>
                        <tr>
                            <td>Electrical and Computer Engineering</td>
                        </tr>
                        <tr>
                            <td>Class of 2025</td>
                        </tr>
                        <tr>
                            <td><a href="mailto:kevingonz@utexas.edu">Email</a></td>
                        </tr>
                        <tr>
                            <td><p>I'm a BME turned ECE as of Fall 2021. I'm an intern at Schwietzer Engineering Laboratories, and I've been learning web development as of the start of the spring 2022 semester!
                                I'm planning to use the knowledge gained in CS329E to maybe pivot into working at a FAANG company if electrical engineering isn't so fun after graduation.
                            </p></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!--TODO-->
            <!-- Contact Bottom -->
            <div class="contact-bot">
                <div class="contact-piece">
                    <img src="../img/Azeem.jpg" alt="azeem">
                    <table>
                        <tr>
                            <td>Azeem</td>
                        </tr>
                        <tr>
                            <td>Economics</td>
                        </tr>
                        <tr>
                            <td>Class of 2022</td>
                        </tr>
                        <tr>
                            <td><a href="mailto:mominazeem1@gmail.com">Email</a></td>
                        </tr>
                        <tr>
                            <td><p>Hello, my name is Azeem. I am a senior Economics major and I am new to web development. I am excited to create websites that are aesthetically pleasing to look at.</p></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!--TODO-->
            <div class="contact-bot">
                <div class="contact-piece">
                    <img src="../img/Samuel.jpg" alt="samuel">
                    <table>
                        <tr>
                            <td>Samuel Crabb</td>
                        </tr>
                        <tr>
                            <td>Computer Engineering</td>
                        </tr>
                        <tr>
                            <td>Class of 2022</td>
                        </tr>
                        <tr>
                            <td><a href="mailto:alexcrabb@utexas.edu">Email</a></td>
                        </tr>
                        <tr>
                            <td><p>Hi, my name is Samuel. I'm a computer engineering major with a focus on software design. I'm new to web development, but I hope to learn a lot from this class.</p></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
