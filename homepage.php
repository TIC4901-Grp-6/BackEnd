<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
        <title>TIC4902</title>
        <link rel="stylesheet" href="homepage.css">
    </head>
    <body>

        <?php
            echo "<h1>TIC4902</h1>";
            echo "testing<hr>";
        ?> 

        <div id="wrapper">
            <div id="banner"> 
                <div class="middle">
                <hr>
                <p id="demo" style="font-size:30px"></p>
                </div>           
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="../homepage.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
                    <li><a href="../aboutuswithlogin.php"><i class="fa fa-fw fa-id-card-o"></i>About Us</a></li>
                    <li><a onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fa fa-fw fa-id-card-o"></i> Login</a></li>
                </ul>
                <div id="id01" class="modal">

                <form class="modal-content animate" action="../login_handler.php" method="POST">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  
  
                <div class="container_login">
                <label for="username"><b>Username</b></label>
                <input type="text" name="username" placeholder="Enter Username"  required>

                <label for="password"><b>Password</b></label>
                <input type="password" name="password" placeholder="Enter Password"  required>

                <strong>User Type:</strong><br>
				<input type='radio' name='user_type' value='Customer' checked/>Customer <br>
                <input type='radio' name='user_type' value='Agent'/>Property Agent <br>

                </div>
 
            <br>
            <input type="submit" name = "Login"  value = "Login">
            <div class="container_login" style="background-color:#f1f1f1">
            <a href="../new_user.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New User Account?</b></a>
            <br><br><br><br>
            <button_login type="button_login" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button_login>
            </div>
            </form>
        </div>

            </nav>
            
            <div id="sidebar">
                <iframe width="900" height="506" src="https://www.youtube.com/embed/0Rb8NUE_hnE" title="360 Video VR SHARK ROLLER COASTER" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
            <footer>
                <p>Copyright TIC4902S 2022</p>
            </footer>

            <script src="../homepage.js"></script>
        </div>


    </body>
</html>