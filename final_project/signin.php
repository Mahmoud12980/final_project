<?php
include 'server.php';
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'dr') {
        header('location: instructor.php');
    } else {
        header('Location: Student.php');
    }

}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Smart University</title>
    <link rel="shortcut icon" href="/images/icon.png" />>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'>
    <link rel="stylesheet">
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <h1 id="logo"><a href="index.php"> <i class="fas fa-house-laptop"></i> VS University</a></h1>
            <nav id="nav">
                <ul>
                    <li><a href="index.php"> <i class="fa fa-home"></i> Home</a></li>
                    <li><a href="index.php#four"> <i class="fa fa-envelope"></i> Contact Us</a></li>
                    <li><a href="signup.php" class="button primary"> <i class="fa fa-user-plus"></i> Sign Up</a></li>
                </ul>
            </nav>
        </header>



        <!-- Form -->
        <div class="container ">

            <section id="bg">
                <center>
                    <h3 id="h3">Sign In</h3>
                </center>
                <form method="post" action="signin.php" class="form">
                    <?php include 'errors.php';?>
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-6">
                            <input type="text" name="username" id="name" value="" placeholder="User Name" />
                        </div>

                        <div class="col-6 " id="show_hide_password">
                            <div>
                                <input type="password" name="password" id="myInput" value="" placeholder="Password" />
                            </div>
                            <a href="" id="spass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-12">
                            <select name="sign_as" id="category">
                                <option value="">- Sign As -</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox"> Remember me </label>
                        </div>
                        <div class="col-12" id="actions">
                            <center>
                                <div class="actions">
                                    <input type="submit" name="login_user" value="Sign In" class="button primary" />
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </section>

        </div>


        <!-- Scripts -->


        <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
        <script src='https://use.fontawesome.com/b9bdbd120a.js'></script>
        <script src="assets/js/script.js"></script>
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