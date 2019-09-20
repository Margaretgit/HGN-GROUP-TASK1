<?php 
include('phpcore/userconnect.php');

userAuth();

logOut();

$dName = $_SESSION['name'];
$dEmail = $_SESSION['email'];
$dPic = strtoupper(substr($dName, 0, 1));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eagle| User Dashboard</title>
    <link rel="stylesheet" href="assets/css/dash.css" >
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand"><img src="assets/images/eagle-logo.png" alt="Eagle"></a>
        <form action="" method="post">
            <button id="logout-btn" type="submit" name="logout">Logout</button>
        </form>
    </nav>
    <div class="containr">
        <div class="leftcol">
            <div class="prof-pic"><p><?= $dPic ?></p></div>
            <p><?= $dEmail ?></p>
        </div>
        <div class="rightcol">
            <p>Welcome <span><?= $dName ?></span>, What would you like to do today.</p>
        </div>
    </div>
</body>
</html>