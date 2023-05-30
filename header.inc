<?php
    function ColorHeader($pageName){
        $color = 'class = "main-color"';

        // $_SESSION["loggedin"] = true;
        // $_SESSION["username"] = 'example'; 

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
                        echo'<li class="original-menu">
                                <a href="manage.php"',($pageName == 'manage')?$color:'','>Manage</a>
                            </li>';
                    }

                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
                    {
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
            echo'<section class="logout login-component">
                    <form method="post" action="">
                        <div class="profile-icon">'
                            ,$username_first_letter,
                        '</div>
                        <p>',$_SESSION["username"],'</p>
                        <button type="submit">Logout</button>
                    </form>
                </section>';
        }
        else {
            echo'<section class="login login-component">
                    <form method="post" action="">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" pattern="^([a-zA-Z]|[0-9])$" required>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required>
                        <button type="submit">Login</button>
                    </form>
                </section>';
        };
    };
?>