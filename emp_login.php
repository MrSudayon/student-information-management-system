<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>San Mateo SHS</title>
        <link rel="icon" href="images/smateo-shs.png">
        <link rel="stylesheet" href="css/login.css">
    </head>

<body>
    <div id="page" class="site login-show">
        <div class="container">
            <div class="wrapper">
                <!-- login form -->
                <div class="login">
                    <div class="content-heading">
                        <div class="y-style">
                            <div class="logo"><a href="index.html">San Mateo <span>SHS</span></a>
                            <img src="./images/smateo-shs.png" style="height: 150px; width: 150px; padding: 0;"></div>
                            
                            <div class="welcome">
                                <p>We Lead as One.<br>We Teach as One.</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-form">
                        <div class="y-style">
                            <form method="POST" action="php/emp_login.php">
                                <div class="logo"><a href="emp_login.php">Teacher<span>Portal</span></a></div>
                                <p>
                                    <label>User</label>
                                    <input type="text" name="uemail" placeholder="Enter User">
                                </p>
                                <p>
                                    <label>Password</label>
                                    <input type="password" name="upass" placeholder="Enter Password">
                                </p>
                                <p class="check">
                                    <label for="remember">Remember me</label>
                                    <input type="checkbox" id="remember">
                                </p>
                                <p class="forgot"><a href="#">Forgot password</a></p>
                                <p><button type="submit" name="loginbut">Login</button></p>
                            </form>
                            <div class="afterform">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- login form -->
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>