<?php include '../php/dbase_config.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/portal.css">
        <link rel="icon" href="../images/smateo-shs.png">
        <title>San Mateo SHS Portal</title>
    </head>

<body>

<style type="text/css">

  
</style>

    <!-- Header -->
    <header>
		<h1 class="logo">
            <a href="index.html"><img src="../images/navlogo2.png" id="smateo-shs"></a>
        </h1>
        <ul class="main-nav">
            <li><a class="nav-tab" href="../index.html">Home</a></li>
            <li><a class="nav-tab" href="#" style="white-space: nowrap;">About Us</a></li>
            <li><a class="nav-tab" href="#">Contact</a></li>

            <li class="dropdown">
                <a href="javascript:void(0)">San Mateo Portal</a>
                <div class="dropdown-content">
                  <a href="../login.php">Student Portal</a>
                  <a href="../emp_login.php">Employee Portal</a>
                </div>
            </li>
        </ul>
	</header> 

    <br>
    <!-- Header -->


    <!-- Content -->

    <main>

    </main>

    <!-- Content -->

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-sanmateo">
                <img src="../images/smateo-shs.png" id="footer-smateo">
                <div id="address">
                    Sta. Cecilia Subdivision Guitnangbayan I, San Mateo, Philippines
                </div>
            </div>
            <div class="footer-links">
                <ul>
                    <li>San Mateo SHS</li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="https://www.facebook.com/sanmateoshs">Facebook</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul>
                    <li>Developers</li>
                    <li><a href="#">Sudayon, Fernando (Dev)</a></li>
                    <li><a href="#">Rufino, Albert (Dev)</a></li>
                    <li><a href="#">Enriquez, Mark Aaron (Tech Support)</a></li>
                    <li><a href="#">Vergara, Ivan (Tech Writer)</a></li>
                    <li><a href="#">Onahon,Bryan Kyle (Tech Writer)</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="footer-rights">
            © 2022 Diamond Dogs
        </div>
    </footer>
    <!-- Footer -->
        
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            } 
        });
        }
    
    </script>
  
</body>
</html>