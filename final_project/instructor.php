<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'dr') {
    $_SESSION['msg'] = "You must log in as dr  first";
    header('location: signin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: signin.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title> Instructor Profile </title>
    <link rel="shortcut icon" href="/images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/users.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />

    <style>
    body {
        background-color: #ececec;
    }
    </style>
</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Main -->
        <div id="main">
            <div class="inner">
                <!-- Header -->
                <header id="header">
                    <center>
                        <a class="logo" href="instructor.php"><strong>Instructor</strong> Profile</a>
                    </center>
                </header>
                <center>
                    <div class="loginw">
                        <?php if (isset($_SESSION['success'])): ?>
                        <div class="error success">
                            <h3>
                                <?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
                            </h3>
                        </div>
                        <?php endif?>

                        <?php if (isset($_SESSION['username'])): ?>
                        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                        <?php endif?>
                    </div>
                </center>

                <!-- Content -->
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">
                <!-- Menu -->
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <!--Add course 1-->
                        <li>
                            <span class="opener"><i class="fa fa-book"></i> Add course</span>
                            <ul>
                                <a href="instructor_viframe.php">Upload Videos Iframe</a>
                        </li>
                        <li>
                            <a href="/instructor_file.php">Upload Files</a>
                        </li>
                        <li>
                            <a href="instructor_video.php">Upload videos</a>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <div id="assiBtn">
                            <a href="instructor_assignment.php"> <i class="fa fa-tasks"></i> assignment </a>
                        </div>
                    </li>
                    <li>
                        <a href="instructor_grade.php"> <i class="fa fa-marker"></i> grade</a>
                    </li>
                    <li>
                        <a href="instructor_event.php"> <i class="fa fa-calendar"></i> events </a>
                    </li>
                    <li>
                        <span class="opener"><i class="fa fa-user-check"></i> Attendance</span>
                        <ul>
                            <li>

                                <!--  ismaeil-->

                                <div class=" col-12">
                                    <a href="/instructor_first_atten.php">First</a>
                                    <a href="/instructor_second_atten.php">Second</a>
                                    <a href="/instructor_thread_atten.php">Thread</a>
                                    <a href="/instructor_fourth_atten.php">Fourth</a>
                                </div>

                                <!--  -->
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="signin.php?logout='1'"> <i class="fas fa-sign-out-alt"></i> Logout </a>
                    </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/instructor.js"></script>
    <script src="assets/js/js1/jquery.min.js"></script>
    <script src="assets/js/js1/browser.min.js"></script>
    <script src="assets/js/js1/breakpoints.min.js"></script>
    <script src="assets/js/js1/util.js"></script>
    <script src="assets/js/js1/main.js"></script>
</body>

</html>