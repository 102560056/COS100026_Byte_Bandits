<?php
    function ColorHeader($pageName){
        $color = 'class = "main-color"';

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
                    </li>

                    <li>
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
    };
?>