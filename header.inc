<?php
    include("settings.php");

    function ColorHeader($pageName){
        $color = 'class = "main-color"';

        $username_first_letter = @strtoupper(substr($_SESSION["username"],0,1));

        echo 
        '<header>
            <section class="static-menu">
                <ul>
                    <li>
                        <a href="index.php" class="icon">
                            <img src="images/byte-logo.svg" alt="Byte company logo">Byte&#8482;
                        </a>
                    </li>

                    <li class="original-menu">
                        <a href="index.php"',($pageName == 'index')?$color:'','>Home</a>
                    </li>

                    <li class="original-menu">
                        <a href="about.php"',($pageName == 'about')?$color:'','>About</a>
                    </li>

                    <li class="original-menu">
                        <a href="jobs.php"',($pageName == 'jobs')?$color:'','>Jobs</a>
                    </li>

                    <li class="original-menu">
                        <a href="apply.php"',($pageName == 'apply')?$color:'','>Apply</a>
                    </li>
                    
                    <li class="original-menu">
                            <a href="enhancements.php"',($pageName == 'enhancements')?$color:'','>Enhancements</a>
                    </li>';

                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        // Show Manage Page if Logged in
                        echo'<li class="original-menu">
                                <a href="manage.php"',($pageName == 'manage')?$color:'','>Manage</a>
                            </li>';
                    }

                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
                    {
                        // Show Username if logged in
                        echo'<li>
                            <label class="login-menu">
                                <input type="checkbox">
                                <div class="login-icons" id="logged-in-icon">'
                                    , $username_first_letter ,
                                '</div>
                            </label>
                        </li>';
                    }
                    else {
                        // Show Generic Icon if logged out
                        echo'<li>
                            <label class="login-menu">
                                <input type="checkbox">
                                <div class="login-icons" id="logged-out-icon">
                                    <img src="images/person.svg" alt="">
                                </div>
                            </label>
                        </li>';
                    };
                    
                    echo '<li>
                        <label class="hamburger-menu">
                            <input type="checkbox">
                            <img src="images/menu.svg" alt="" class="menu">
                            <img src="images/close.svg" alt="" class="close">
                        </label>
                    </li>
                </ul>
            </section>
            <section class="drop-down">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="jobs.php">Jobs</a>
                    </li>
                    <li>
                        <a href="apply.php">Apply</a>
                    </li>
                    <li>
                        <a href="enhancements.php">Enhancements</a>
                    </li>
                </ul>
            </section>
        </header>';
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        {
            //Show Logout if Logged in 
            echo'<section class="logout login-component">
                    <form method="post" action="">
                        <div class="profile-icon">'
                            ,$username_first_letter,
                        '</div>
                        <p>',$_SESSION["username"],'</p>
                        <button type="submit" name="logout" value="logout">Logout</button>
                    </form>
                </section>';
        }
        else {
            //Show Login if not Logged in 
            echo'<section class="login login-component">
                    <form method="post" action="">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" pattern="^([a-zA-Z]|[0-9])*$" required>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required>
                        <button type="submit">Login</button>
                    </form>
                </section>';
        };
    };

    if(isset($_POST["logout"]) && !empty($_POST["logout"]))
    {
        // Remove Session Storage
        session_unset($_SESSION["loggedin"]);
        session_unset($_SESSION["username"]);
        // Refresh Page After Post
        echo "<meta http-equiv='refresh' content='0'>";
    };

    if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]))
    {
        $conn = @mysqli_connect
        (
            $host, $user, $pwd, $sql_db
        );
        
        if(!$conn){
            echo "<p>Database Connection Failiure!</p>";
        }
        else
        {
            // Evie, pass1
            // Greg, pass2
            // Tim, pass3

            $sql_table = "Users";
        
            $query = "SELECT * FROM ".$sql_table." WHERE username = \"".$_POST["username"]."\" AND password = \"".$_POST["password"]."\"";
            $result = mysqli_fetch_array(mysqli_query($conn, $query));
            if($result){
                //Start session if one doesnt already exist.
                @session_start();
                //Set Loggedin & Username
                @$_SESSION["loggedin"] = true;
                @$_SESSION["username"] = $result[0];
            };
        };
    };
?>