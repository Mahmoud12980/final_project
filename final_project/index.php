<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'mydata');

if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) and !empty($_POST['message'])) {
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
        $message = mysqli_real_escape_string($conn, htmlspecialchars($_POST['message']));
        $query = $conn->query("insert into contact(email,message)values('$email','$message')");
        if ($query) {
            echo "";
        }
    } else {
        echo "";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Smart University</title>
    <link rel="shortcut icon" href="/images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
    <style>
    .title {
        text-align: left;
    }
    </style>
    </ </head>

<body class="is-preload landing">
    <div id="page-wrapper">
        <!-- Header -->
        <header id="header">
            <h1 id="logo"><a href="index.php"><i class="fas fa-house-laptop"></i>VS University</a></h1>
            <nav id="nav">
                <ul>
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#four"><i class="fa fa-envelope"></i> Contact Us</a></li>
                    <li><a href="signup.php" class="button primary"><i class="fa fa-user-plus"></i> Sign Up</a></li>
                </ul>
            </nav>
        </header>
        <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header>
                    <h2>The future has landed</h2>
                    <p class="title">eLearning has drastically changed <br> the landscape of education</p>
                </header><span class="image"><img src="images/icon1.jpg" alt="" /></span><a href="signin.php"
                    class="button primary fit" id="signbtn"><i class="fas fa-sign-in-alt"></i> Sign In</a>
            </div><a href="#one" class="goto-next scrolly">Next</a>
        </section>
        <!-- One -->
        <section id="one" class="spotlight style1 bottom"><span class="image fit main"><img src="images/pic02.jpg"
                    alt="" /></span>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-4 col-12-medium">
                            <header>
                                <h2>The Major Goals Of this eLearning website</h2>
                                <p>There are certain goals when it comes to eLearning and some of these are
                                    to: </p>
                            </header>
                        </div>
                        <div class="col-4 col-12-medium">
                            <p>Enhance the quality of learning and teaching,
                                Meet the learning style or needs of students,
                                Improve the efficiency and effectiveness,
                                Improve user-accessibility and time flexibility to engage learners in the
                                learning process. </p>
                        </div>
                        <div class="col-4 col-12-medium">
                            <p>eLearning is vast and an expanding platform with huge prospective in higher
                                education. Since there are many challenges in making eLearning effective,
                                it is important to know how to manage it and access to the resources. </p>
                        </div>
                    </div>
                </div>
            </div><a href="#two" class="goto-next scrolly">Next</a>
        </section>
        <!-- Two -->
        <section id="two" class="spotlight style2 right"><span class="image fit main"><img src="images/pic03.jpg"
                    alt="" /></span>
            <div class="content">
                <header>
                    <h2>The Most Important Benefits Of eLearning For Students</h2>
                    <p>Today's learners want relevant, mobile, self-paced, and personalized content</p>
                </header>
                <p>Online Learning Accommodates Everyones Needs,
                    Lectures Can Be Taken Any Number Of Times,
                    Offers Access To Updated Content,
                    Quick Delivery Of Lessons,
                    Scalability,
                    Reduced Costs and Less Impact On Environment </p>
            </div><a href="#three" class="goto-next scrolly">Next</a>
        </section>
        <!-- Three -->
        <section id="three" class="spotlight style3 left"><span class="image fit main bottom"><img
                    src="images/pic04.jpg" alt="" /></span>
            <div class="content">
                <header>
                    <h2>Benefits of E-Learning in Education</h2>
                    <p>The following are the advantages of e-learning which you must not miss</p>
                </header>
                <p>Online Learning can accommodate everyones needs Classes can be taken from any
                    place and at the time which students or tutors prefer. It offers access to
                    exclusive,
                    prolific,
                    and updated content and accessibility is open,
                    secure,
                    and uninterrupted. E-Learning lets you be in sync with modern learners and
                    updated with the current trends. </p>
            </div><a href="#four" class="goto-next scrolly">Next</a>
        </section>
        <!-- Four -->
        <section id="four" class="wrapper style2 special fade">
            <div class="container">
                <header>
                    <h2>Contact to Us </h2>
                </header>
                <form method="post" class="cta">
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-8 col-12-xsmall"><input type="email" name="email" id="email"
                                placeholder="Your Email Address" /></div>
                        <div class="col-4 col-12-xsmall"><input name="submit" type="submit" value="Send"
                                class="fit primary" /></div>
                        <div class="col-12"><textarea name="message" id="message" placeholder="Enter your message"
                                rows="6"></textarea></div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
                <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
            </ul>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>