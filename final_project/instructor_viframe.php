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

if (isset($_POST['send_url'])) {
    $S_title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['S_title']));
    $first_title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['first_title']));
    $first_url = mysqli_real_escape_string($conn, htmlspecialchars($_POST['first_url']));
    $level = mysqli_real_escape_string($conn, htmlspecialchars($_POST['level']));
    $user = $_SESSION['username'];

    if (empty($S_title)) {array_push($errors, "Subject Title Is Required");}
    if (empty($first_title)) {array_push($errors, "Video Title Is Required");}
    if (empty($first_url)) {array_push($errors, "URL Is Required");}
    if (empty($level)) {array_push($errors, "Level Is Required");}

    $user_check_query = "SELECT * FROM FirstSubject WHERE first_url='$first_url' and level='$level' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $userr = mysqli_fetch_assoc($result);

    if ($userr) { // if user exists
        if ($userr['first_url'] === $first_url and $userr['level'] === $level) {
            array_push($errors, "Video Already Published");
        }
    }

    if (count($errors) == 0) {

        $query = "INSERT INTO FirstSubject (dr_name,level,first_url,first_title,S_title)
  			  VALUES('$user','$level','$first_url','$first_title','$S_title') ";
        mysqli_query($conn, $query);
        array_push($errors, "Video Are Published");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload Videos Iframe</title>
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
                <br> <br>
                <h3 class="form">Upload Videos Iframe</h3>
                <h5> <?php include 'errors.php';?> </h5>
                <form method="post">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <input type="text" name="S_title" id="demo-name" value="" placeholder="Subject Name" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="first_title" id="demo-name" value="" placeholder="Video Title" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="url" name="first_url" id="demo-email" value="" placeholder="video URL" />
                        </div>

                        <div class="col-12">
                            <select name="level" id="demo-category">
                                <option value="">- level -</option>
                                <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Third</option>
                                <option value="4">Fourth</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input name="send_url" type="submit" value="Submit" class="primary" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

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