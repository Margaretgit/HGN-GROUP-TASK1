<?php include('phpcore/userconnect.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
        <title>Eagle Form</title>
        
        <link rel="stylesheet" href="assets/css/style.css" >

    </head>
    <body>
            
        <div class="flex">
            <div class="col1">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <fieldset>
                        <img src="assets/images/eagle-logo.png" alt="eagle">
                        <div id="report"><?= $login_rep ?></div>
                        <input type="email"  name="email" placeholder="Enter your email" value="<?= $last_email ?>" required>                               
                        <input type="password" name="password" placeholder="Enter your password" required>                                                                    
                        <button type="submit" name="login">Login</button>
                        <div class="flex2">
                            <p> <a href="register.php">Register</a> </p>
                            <p> <a href="#">Forgot Password</a> </p>
                        </div> 
                    </fieldset> 
                </form>
            </div>
            <div class="col2">
                <div class="welcome">
                    <span>Welcome!</span>
                    <p>We are glad to have you today.</p>
                </div>      
            </div>                                       
        </div>    
    </body>
</html>
