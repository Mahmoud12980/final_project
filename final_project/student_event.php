<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in as dr  first";
    header('location: signin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: signin.php");
}
$conn = mysqli_connect('localhost', 'root', '', 'mydata');
$level = $_SESSION['level'];
$query = $conn->query("select * from events where level='$level' or level='50'");
if (!$query) {
    die("error");
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Events</title>
    <link rel="shortcut icon" href="/images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/users.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
    <style>
    #table {
        text-align: center;
        background-color: white;
    }

    .tab {
        margin-bottom: 20px;
    }

    .box {
        background-color: white;
    }

    body {
        background-color: #ececec;
    }

    .next {
        border-bottom: solid 5px #f56a6a;
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
                </header><br> <br>
                <div>
                    <?php while ($event = $query->fetch_assoc()) {?>
                    <div class="table-wrapper">
                        <center>
                            <h3 class="tab"> Event Content </h3>
                        </center>
                        <table class="alt" id="table">
                            <tbody>
                                <tr>
                                    <td>Dr. Publisher</td>
                                    <td><?=$event['dr_name']?></td>

                                </tr>
                                <tr>
                                    <td>For Level</td>
                                    <td> <?php if ($event['level'] == 50) {echo "All";} else {echo $event['level'];}?>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="box">
                            <p> <?=$event['content']?> </p>
                        </div>
                    </div> <br>

                    <div class="next"> </div> <br> <br>


                    <?php }?>
                </div>


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