<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in as dr  first";
    header('location: signin.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'mydata');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $assignment = $_POST['assignment_name'];
    $questions = $_POST['questions'];
    $answers = $_POST['answers'];
    $corrects = $_POST['correct'];
    $level = $_POST['level'];
    $grade = $_POST['grade'];
    $query1 = "INSERT INTO
              assignments
              (assignment,level)
              VALUES('$assignment','$level')";

    mysqli_query($conn, $query1);
    $assignment_result = "SELECT id FROM assignments WHERE assignment='$assignment' LIMIT 1";
    $result = mysqli_query($conn, $assignment_result);
    $assignment_id = mysqli_fetch_assoc($result)['id'];
    $question_check = "SELECT id FROM questions order by id desc LIMIT 1";
    $result2 = mysqli_query($conn, $question_check);
    $question_id = mysqli_fetch_assoc($result2);
    if ($question_id == null) {
        $question_counter = 0;
    } else {
        $question_counter = $question_id['id'];
    }
    for ($i = 0; $i < sizeof($questions); $i++) {
        $query2 = "INSERT INTO questions (assignment_id, question, correct_answer,grade)
      VALUES('$assignment_id', '$questions[$i]', '$corrects[$i]' , '$grade[$i]')";
        mysqli_query($conn, $query2);
        $question_counter += 1;
        for ($j = 0; $j < 4; $j++) {
            $answer = $answers[$i][$j];
            $query3 = "INSERT INTO answers (question_id, answer)
        VALUES('$question_counter', '$answer')";
            mysqli_query($conn, $query3);
        }
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
    <link rel="stylesheet" href="assets/css/users.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                        <a class="logo" href="instructor.php"><strong>Instructor</strong> Profile</a>
                    </center>
                </header> <br> <br>
                <!-- Add Assignment -->
                <center><button class="button primary" id="add_assignment">Add assignment</button></center>
                <div id="assignment"
                    style="display:none;margin-top:15px !important;box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;padding:1rem !important;border-radius:0.25rem !important">
                    <form action="instructor_assignment.php" method="POST">
                        <label for="assignment_name">Assignment</label>
                        <input class="form-control" name="assignment_name" id="assignment_name"> <br>
                        <select name="level" required>
                            <option value="1">- Level -</option>
                            <option value="1">Level 1</option>
                            <option value="2">Level 2</option>
                            <option value="3">Level 3</option>
                            <option value="4">Level 4</option>
                        </select>
                        <div id="q1">
                            <h3 id="q1-title">Question 1</h3>
                            <div class="form-group">
                                <label for="question1">Question</label>
                                <textarea name="questions[]" id="question1" cols="10" rows="5"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Answer 1</label>
                                        <input type="text" name="answers[0][0]" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Answer 2</label>
                                        <input type="text" name="answers[0][1]" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Answer 3</label>
                                        <input type="text" name="answers[0][2]" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Answer 4</label>
                                        <input type="text" name="answers[0][3]" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Correct answer</label>
                                        <input type="text" name="correct[]" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <input type="text" name="grade[]" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="newRow"></div>
                        <button class="button primary" type="button" id='add'>Add Question</button>
                        <br>
                        <button class="button primary" style="margin-top:15px !important;"
                            type="submit btn btn-block">Save Assignment</button>
                    </form>
                </div>
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