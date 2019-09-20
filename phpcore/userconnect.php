<?php 
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "hngtask1db";

$con = new mysqli($hostname, $username, $password, $database);

// Check the connection for errors
if ($con->connect_errno) {
    echo "Failed to connect to MySQL:" . $con->connect_errno;
} 
error_reporting(1);

$errors = array();
$_SESSION['success'] = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function display_errors($errors){
    foreach ($errors as $error) {
        return $error;
    }
}

//USER SIGN UP
$password1 = $password2 = $signup_report = $last_name = $last_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {

    $fullname = $con->real_escape_string(test_input($_POST['name'])); 
    if (!preg_match("/^[a-z]{3,} [a-z]{3,}$/i", $fullname)) {
        array_push($errors, "Sorry!! Name should be formated as described");
    }

    $email = $con->real_escape_string(test_input($_POST['email']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    }

    $password1 = $con->real_escape_string(test_input($_POST['password']));
    $password2 = $con->real_escape_string(test_input($_POST['password_repeat']));
    if ($password1 !== $password2){
        array_push($errors, "Password mismatch, please try again.");
    }

    // Ensure a user does not register twice
    $email_exist = "SELECT * FROM `users` WHERE `email` = '$email'";
    if (mysqli_num_rows($con->query($email_exist)) != 0) {
        array_push($errors, "This email is associated with an existing user!!<br> <a href='#'>Forgot Your Password?</a>");
    }

    if (count($errors) > 0){
        $signup_report = display_errors($errors);
        $last_name = $fullname;
        $last_email = $email;
    }
    else{
        $password = md5($password1);
        // $signup_report = $password;
        $names = explode(" ", $fullname);
        $display_name = $names[0];
        $sql = "INSERT INTO users (fullname, display_name, email, userpass, reg_date) VALUE ('$fullname', '$display_name', '$email', '$password', NOW())";
        if ($con->query($sql) === TRUE){
            $signup_report = 'Your Sign up was Successful. Please <a href="index.php">login</a>';
        }
    }
}

// USER LOGIN
$password = $last_email = $login_rep = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){

    $email = $con->real_escape_string(test_input($_POST['email']));
    $password1 = $con->real_escape_string(test_input($_POST['password']));

    $password = md5($password1);
    // $login_rep = $password;
    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `userpass` = '$password'";
    $query = $con->query($sql);
    $result = mysqli_num_rows($query);
    $row = $query->fetch_assoc();

    if ($result == 1){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['display_name'];
        $_SESSION['email'] = $row['email'];
        header("location: dashboard.php");
    }
    else{
        $login_rep = 'Wrong username/password combination';
        $last_email = $email;
    }
}

function userAuth(){
    if (!isset($_SESSION['user_id'])){
        header("location: index.php");
    }
    
}

function logOut() {
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: index.php");
    }
}

?>