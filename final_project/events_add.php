<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'mydata');

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'dr') {
    $_SESSION['msg'] = "You must log in as dr first";
    header('location: signin.php');
}

if (isset($_POST['event_submit'])) {
    if (!empty($_POST['content']) and !empty($_POST['level'])) {
        $content = mysqli_real_escape_string($conn, htmlspecialchars($_POST['content']));
        $level = mysqli_real_escape_string($conn, htmlspecialchars($_POST['level']));
        $user = $_SESSION['username'];
        $query = $conn->query("insert into events(dr_name,level,content)values('$user','$level','$content')");
        if ($query) {
            echo "Inserted Successfully";
        }
    } else {
        echo "<h1>Please Enter All Fields </h1>";
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Course1</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/images/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="add_course/assets/css/main.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .form {
        margin-top: 100px;
        margin-bottom: 20px;
    }

    body {
        background-color: #ececec;
    }
    </style>
</head>

<body class="is-preload">

    <div class="container">
        <header class="form">
            <h2> Post event </h2>
        </header>
        <form method="post" class="cta">
            <div class="row gtr-uniform">
                <div class="col-8 col-12-xsmall">
                    <select name="level" id="demo-category">
                        <option value="">- level -</option>
                        <option value="1">First</option>
                        <option value="2">Second</option>
                        <option value="3">Third</option>
                        <option value="4">Fourth</option>
                        <option value="50">All</option>
                    </select>
                </div>

                <div class="col-4 col-12-xsmall">
                    <input name="event_submit" type="submit" value="Post" class="fit primary" />
                </div>
                <div class="col-12">
                    <textarea name="content" id="message" placeholder="Enter your post" rows="6"></textarea>
                </div>
            </div>
        </form>
    </div>


    <!-- Scripts -->
    <script src="add_course/assets/js/jquery.min.js"></script>
    <script src="add_course/assets/js/browser.min.js"></script>
    <script src="add_course/assets/js/breakpoints.min.js"></script>
    <script src="add_course/assets/js/util.js"></script>
    <script src="add_course/assets/js/main.js"></script>

</body>

</html>
<!--
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label>Content</label>
        <textarea required name="content"></textarea><br />
        <label>level</label>
        <select name="level" id="gender" required>
            <option value="1">First</option>
            <option value="2">Second</option>
            <option value="3">Third</option>
            <option value="4">Fourth</option>
            <option value="50">ALL</option>
        </select>
        <input name="event_submit" type="submit">
    </form>
</body>

</html>