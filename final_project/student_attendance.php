<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: signin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: signin.php");
}

$conn = mysqli_connect('localhost', 'root', '', 'mydata');
$errors = array();

if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['first_name']));
    $level = mysqli_real_escape_string($conn, htmlspecialchars($_POST['level']));

    if (empty($first_name)) {array_push($errors, "Name Is Required");}
    if (empty($level)) {array_push($errors, "Level Is Required");}

    $user_check_query = "SELECT * FROM attendance WHERE first_name='$first_name' and level='$level' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $userr = mysqli_fetch_assoc($result);

    if ($userr) { // if user exists
        if ($userr['first_name'] === $first_name and $userr['level'] === $level) {
            array_push($errors, "Attendance Already Taken");
        }
    }

    if (count($errors) == 0) {

        $query = "INSERT INTO attendance (first_name,level)
  			  VALUES('$first_name','$level') ";
        mysqli_query($conn, $query);
        array_push($errors, "Attendance Taken");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Attendance</title>
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
                </header> <br> <br>
                <h3> Attendance </h3>
                <form action="student_attendance.php" method="post">
                    <h5> <?php include 'errors.php';?> </h5>
                    <div class="col-8"> <input type="text" name="first_name" id="firstName"
                            placeholder="Enter Your Name"> </div><br>
                    <div class="col-4">
                        <select name="level" id="demo-category">
                            <option value="">- Level -</option>
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                        </select>
                    </div><br>
                    <input name="submit" class="button primary" type="submit" value="Submit">
                </form>

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