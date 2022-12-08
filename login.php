<?php
/** if SessionId == TRUE 
    header("portal")
*/
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>San Mateo SHS</title>
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
                            <div class="logo"><a href="index.html">San Mateo <span>SHS</span></a></div>
                            <img src="./images/smateo-shs.jpg" class="center" style="height: 150px; width: 150px; padding: 0px;">
                            <div class="welcome">
                                <p>Learn, learn, learn!</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-form">
                        <div class="y-style">
                            <form method="POST" action="php/login.php">
                                <p>
                                    <label>Student No.</label>
                                    <input type="text" placeholder="Enter User">
                                </p>
                                <p>
                                    <label>Password</label>
                                    <input type="password" placeholder="Enter Password">
                                </p>
                                <p class="check">
                                    <label for="remember">Remember me</label>
                                    <input type="checkbox" id="remember">
                                </p>
                                <p class="forgot"><a href="#">Forgot password</a></p>
                                <p><button type="submit" name="submit" value="submit">Login</button></p>
                            </form>
                            <div class="afterform">
                                <p>Don't have an account?</p>
                                <a href="#" class="t-signup">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- login form -->

                <!-- signup form -->
                <div class="signup">
                    <div class="content-heading">
                        <div class="y-style">
                            <div class="logo"><a href="index.html">San Mateo <span>SHS</span></a></div>
                            <div class="welcome">
                                <h2>Sign Up<br>Now!</h2>
                                <p>Learn easy<br>and in Accessible way!</p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="content-form">
                        <div class="y-style">
                            <form action="php/signup.php">
                                <p>
                                    <label>Code</label>
                                    <input type="text" placeholder="Enter your code give by registrar">
                                </p>
                                <p>
                                    <label>Last name</label>
                                    <input type="text" placeholder="Enter your lastname">
                                    <label>First name</label>
                                    <input type="text" placeholder="Enter your firstname">
                                    <label>Middle name</label>
                                    <input type="text" placeholder="Enter your name">
                                </p>
                                <p>
                                    <label>LRN</label>
                                    <input type="text" placeholder="Enter your LRN">
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="password" placeholder="Enter your email">
                                </p>
                                <p>
                                    <label>Password</label>
                                    <input type="password" placeholder="Enter password">
                                </p>
                                <p class="check">
                                    <input type="checkbox" id="terms">
                                    <label for="terms">I agree to the terms and condition.</label>
                                </p>
                                <p><button type="submit">Sign Up</button></p>
                            </form>
                            <div class="afterform">
                                <p>Already have an account?</p>
                                <a href="#" class="t-login">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- signup form -->
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>