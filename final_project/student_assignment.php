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
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $id = $_GET['id'];
} else {
    $id = $_POST['id'];
}
$assignments_query = "SELECT Q.question, Q.id ,AN.answer
                              FROM assignments as ASS
                              join questions as Q on ASS.id = Q.assignment_id
                              join answers as AN on Q.id = AN.question_id where ASS.id = '$id'";

$result = mysqli_query($conn, $assignments_query);
$assignments = $result->fetch_all();
$correct_grade_query = "SELECT Q.id,Q.correct_answer,Q.grade from assignments as ASS join questions as Q on ASS.id = Q.assignment_id";
$result2 = mysqli_query($conn, $correct_grade_query);
$correct_grade = $result2->fetch_all();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $grade = 0;
    $answers = [];
    for ($i = 0; $i < sizeof($correct_grade); $i++) {
        $answers[] = $_POST[$correct_grade[$i][0]];
        if ($answers[$i] == $correct_grade[$i][1]) {
            $grade += $correct_grade[$i][2];
        }
    }
    $query = "INSERT INTO student_assignment (student_username,assignment_id,grade) value ('$username','$id','$grade')";
    $result3 = mysqli_query($conn, $query);
    header("location: student_assignments.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Smart University</title>
    <link rel="shortcut icon" href="/images/icon.png" />
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
                </header><br><br>
                <form action="student_assignment.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row">
                        <div class="form-group">
                            <div class="input-group">
                            </div>
                            <?php
$h = 1;
for ($i = 0; $i < sizeof($assignments); $i++) {
    for ($j = 2; $j < sizeof($assignments[$i]); $j++) {
        if (($i) % 4 == 0) {
            $k = 1;
            echo "<h1>Question " . $h++ . "</h1>";
            echo "<h5>" . $assignments[$i][0] . "</h5>";
        }
        echo "<div class='col-md-6'><input value='" . ($k++) . "' name='" . $assignments[$i][1] . "' type='radio'> " . $assignments[$i][$j] . "</div>";
    }
}
?>
                        </div>
                    </div>
                    <button type="submit">Submit</button>
            </div>
            </form>
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