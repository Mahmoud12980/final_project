<?php
session_start();

// initializing variables
$fname = "";
$lname = "";
$sign_as = "";
$gender = "";
$email = "";
$username = "";
$phone = "";
$password = "";
$conpassword = "";
$level = "";
$errors = array();

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'mydata');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['fname']));
    $lname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['lname']));
    $sign_as = mysqli_real_escape_string($conn, htmlspecialchars($_POST['sign_as']));
    $gender = mysqli_real_escape_string($conn, htmlspecialchars($_POST['gender']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $phone = mysqli_real_escape_string($conn, htmlspecialchars($_POST['phone']));
    $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
    $password = md5($_POST['password']);
    $conpassword = md5($_POST['conpassword']);
    $level = mysqli_real_escape_string($conn, htmlspecialchars($_POST['level']));
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {array_push($errors, "Username is required");}
    if (empty($email)) {array_push($errors, "Email is required");}
    if (empty($password)) {array_push($errors, "Password is required");}
    if (!empty($phone) && !is_numeric($phone)) {array_push($errors, "Phone Must Be Number");}
    if ($password != $conpassword) {
        array_push($errors, "The passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM register WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {

        $query = "INSERT INTO register (fname, lname, sign_as,gender ,email , phone , username ,password ,conpassword ,level)
  			  VALUES('$fname', '$lname', '$sign_as' , '$gender', '$email', '$phone', '$username', '$password', '$conpassword','$level')";
        mysqli_query($conn, $query);
        //$_SESSION['username'] = $username;
        //$_SESSION['level'] = $level;
        //$_SESSION['success'] = "You are now logged in";
        header('location: signin.php');
    }
}

// ...
// LOGIN USER

if (isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    $sign_as = mysqli_real_escape_string($conn, $_POST['sign_as']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($sign_as)) {
        array_push($errors, "You must select instructor or student");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM register WHERE  username='$username' AND password='$password' and sign_as='$sign_as' LIMIT 1  ";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is instructor or student
            $data = $results->fetch_assoc(); //getting all user data
            if ($sign_as == 'Instructor') {
                $_SESSION['username'] = $username;
                $_SESSION['fname'] = $data['fname'];
                $_SESSION['role'] = 'dr';
                $_SESSION['success'] = "You are logged in";
                header('location: instructor.php');
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are logged in";
                $_SESSION['level'] = $data['level'];
                $_SESSION['role'] = 'student';
                header('location: Student.php');
            }
        }
    }

}

//logout

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: signin.php");
}