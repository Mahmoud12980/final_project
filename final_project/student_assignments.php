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
$level = $_SESSION['level'];
$conn = mysqli_connect('localhost', 'root', '', 'mydata');
$courses = $conn->query("select first_title,first_url from flcourse where level='$level'");
$username = $_SESSION['username'];
$student_assignments_query = "SELECT assignment_id FROM student_assignment where student_username = '$username'";
$result = mysqli_query($conn, $student_assignments_query);
$student_assignments = $result->fetch_all();
$ids = [];
foreach ($student_assignments as $assignment) {
    $ids[] = $assignment[0];
}
$id_array = implode("', '", $ids);
$user_check_query = "SELECT * FROM register WHERE username='$username' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);
$assignments_query = "SELECT * from assignments where level = '$level' and id not in('$id_array')";
$result2 = mysqli_query($conn, $assignments_query);
$assignments = $result2->fetch_all();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Assigments</title>
    <link rel="shortcut icon" href="/images/icon.png" />
    <meta charset="utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/student_assignments.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    body {
        background-color: #ececec;
    }

    #table {
        text-align: center;
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
                        <a class="logo" href="Student.php"><strong>Student</strong> Profile</a>
                    </center>
                </header><br> <br>
                <h3>Assigments</h3>
                <div>
                    <form action="student_assignment.php" method="POST">

                        <?php
if (sizeof($assignments) == 0) {
    echo "<p>There is no assignments</p>";
} else {
    for ($i = 0; $i < sizeof($assignments); $i++) {
        echo "
             <div class='table-wrapper'>
                    <table id='table'>
                        <tbody>
                            <tr>
                                <th style='text-align:center;'>Level</th>
                                <th style='text-align:center;'> Quiz Name </th>
                                <th style='text-align:center;'>Actoin</th>
                            </tr>
                            <tr>
                                <td> " . $assignments[$i][2] . " </td>
                                <td> " . $assignments[$i][1] . " </td>
                                <td> <a href='student_assignment.php?id=" . $assignments[$i][0] . "'
                                class='button primary'>Solve Quiz</a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>";
    }
}
?>

                    </form>
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