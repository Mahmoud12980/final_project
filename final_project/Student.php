<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] == 'dr') {
    $_SESSION['msg'] = "You must log in first";
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
    <title>Student Profile</title>
    <link rel="shortcut icon" href="/images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/users.css" />
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
                        <a class="logo" href="Student.php"><strong>Student</strong> Profile</a>
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
                        <li>
                            <span class="opener"><i class="fa fa-book"></i> Course</span>
                            <ul>
                                <li>
                                    <a href="student_viframe.php">View Videos Iframe</a>
                                </li>

                                <li>
                                    <a href="student_file.php">Download Files</a>
                                </li>
                                <li>
                                    <a href="student_video.php">View Videos</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="student_assignments.php"> <i class="fa fa-tasks"></i> assignment </a>
                        </li>
                        <li>
                            <a href="student_grade.php"> <i class="fa fa-marker"></i> grade</a>
                        </li>
                        <li>
                            <a href="student_event.php"> <i class="fa fa-calendar"></i> events </a>
                        </li>

                        <li>
                            <a href="student_attendance.php"><i class="fa fa-user-check"></i> Attendance </a>
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

    <script>
    function openTab(tabName) {
        var i, x;
        x = document.getElementsByClassName('containerTab');
        for (i = 0; i < x.length; i++) {
            x[i].style.display = 'none';
        }
        document.getElementById(tabName).style.display = 'block';
    }
    </script>
    <script src="assets/js/Student.js"></script>
    <script src="assets/js/js1/jquery.min.js"></script>
    <script src="assets/js/js1/browser.min.js"></script>
    <script src="assets/js/js1/breakpoints.min.js"></script>
    <script src="assets/js/js1/util.js"></script>
    <script src="assets/js/js1/main.js"></script>
</body>

</html>