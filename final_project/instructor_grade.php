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
$assignment_grade = "SELECT ASS.assignment,student_username, grade  FROM assignments as ASS join student_assignment on ASS.id = assignment_id";
$result = mysqli_query($conn, $assignment_grade);
$grade = $result->fetch_all();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Grade </title>
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

    #table {
        background-color: white;
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
                <table id="table">
                    <h3>Student Grade</h3>
                    <thead>
                        <tr>
                            <th style="text-align:center;" scope="col">#</th>
                            <th style="text-align:center;" scope="col">Student</th>
                            <th style="text-align:center;" scope="col">Assignment</th>
                            <th style="text-align:center;" scope="col">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
for ($i = 0; $i < sizeof($grade); $i++) {
    echo "<tbody>
            <tr>
              <td>" . ($i + 1) . "</td>
              <td>" . $grade[$i][1] . "</td>
              <td>" . $grade[$i][0] . "</td>
              <td>" . $grade[$i][2] . "</td>
            </tr>";
}
?>
                    </tbody>
                </table>

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
    <script src="assets/js/instructor_assignment.js"></script>
    <script src="assets/js/js1/browser.min.js"></script>
    <script src="assets/js/js1/breakpoints.min.js"></script>
    <script src="assets/js/js1/util.js"></script>
    <script src="assets/js/js1/main.js"></script>
</body>

</html>