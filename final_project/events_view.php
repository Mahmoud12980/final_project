<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'mydata');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: signin.php');
}
$level = $_SESSION['level'];
$query = $conn->query("select * from events where level='$level' or level='50'");
if (!$query) {
    die("error");
}
?>


<!DOCTYPE HTML>
<html>

<head>
    <title>Events</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/images/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="add_course/assets/css/main.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .container {
        margin-top: 50px;
    }

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

    <?php while ($event = $query->fetch_assoc()) {?>
    <div class="container">

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
                        <td> <?php if ($event['level'] == 50) {echo "All";} else {echo $event['level'];}?></td>

                    </tr>
                </tbody>
            </table>
            <div class="box">
                <p> <?=$event['content']?> </p>
            </div>
        </div> <br>

        <div class="next"> </div>



    </div>
    <?php }?>

    <!-- Scripts -->
    <script src="add_course/assets/js/jquery.min.js"></script>
    <script src="add_course/assets/js/browser.min.js"></script>
    <script src="add_course/assets/js/breakpoints.min.js"></script>
    <script src="add_course/assets/js/util.js"></script>
    <script src="add_course/assets/js/main.js"></script>

</body>

</html>