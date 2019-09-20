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
                <fieldset>
                    <img src="assets/images/eagle-logo.png" alt="eagle">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <div id="report"><?= $signup_report; ?></div>                                                                
                        <input type="text" name="name" placeholder="Full Name" value="<?= $last_name ?>" required>                              

                        <input type="email"  name="email" placeholder="Email Address" value="<?= $last_email ?>" required>                               

                        <input type="password" name="password" placeholder="Password" required>                
                                
                        <input type="password" name="password_repeat" placeholder="Confirm Password" required>                
                                                                            
                        <button type="submit" name="signup">Register</button>

                        <p> Already have an account? <a href="index.php">Login</a> </p> 
                    </form> 
                </fieldset> 
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
