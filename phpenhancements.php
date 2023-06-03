<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Enhancements</title>
    <link rel="stylesheet" href="styles/style.css">
</head>


<body>
    <?php
        session_start();
        include_once "header.inc";
        ColorHeader('phpenhancements');
    ?>

    <main class="enh-main">
        <section id="enh-title">
            <h2>Assignment 2 Enhancements</h2>
            <p class="about-arrow">▼</p>
            <p>We have extended this website using some PHP and SQL techniques learned beyond the lectures and
                tutorials in COS10026. Here are some of the features we've added:</p>
        </section>

      <!-- Each "enh-enhance-sect" section is a part of the page describing one of the enhancements -->

        <section class="enh-enhance-sect">
            <h3>Enhancement1 - Login Page</h3>
            <hr>
            <p>
                Sam designed the first enhancement of our website, which is a login method to access the manage.php page.
            </p>
            
            <p>
                The login function is available from any page, and therefore is written in the 
                header.inc file, which is included in every page. This code adds a section in the header
                which will be either a login or logout form depending on whether the user is logged in or not.
                For logging in, this form will submit using the POST method to provide the entered username and password to 
                the page through the POST global variable.
            </p>
            
            <p class="enh-code-desc"><strong>Code in: header.inc</strong></p>

            <figure>
                <img src="images/sam-php-enh1.png" alt="an image of PHP code">
            </figure>

            <p>
                The page can check these values in $_POST when the login form is submitted, comparing them
                against values stored in a 'Users' table queried in the database. If they match, login variables
                are set in the SESSION global variable, to allow for the user to navigate pages without having to 
                log in whenever they navigate to a new page. These session variables are updated when the user submits
                the logout form as well.
            </p>

            <p class="enh-code-desc"><strong>Code in: header.inc</strong></p>

            <figure>
                <img src="images/sam-php-enh2.png" alt="an image of PHP code">
            </figure>

            <p>
                The list of each page in the header has an extra element for the Manage.php page if the user is logged in.
                The username is also shown using the same method.
            </p>

            <p class="enh-code-desc"><strong>Code in: header.inc</strong></p>

            <figure>
                <img src="images/sam-php-enh3.png" alt="an image of PHP code">
            </figure>

        </section>

        <section class="enh-enhance-sect">
            <h3>Enhancement 2 - Database Extension</h3>
            <hr>
            <p>
                Preston added some extra features relating to the MySQL database. <br>
            </p>
            <p><strong> 1. Extra Tables</strong></p>
            <p>There are two extra tables in the database: 'Skills' and 'Eoi_Skills'. The skills table holds each skill that can be 
                checked in apply.php. Eoi_Skills is a junction table between 'Eois' and 'Skills', holding a record for each skill 
                checked in each EOI. This allows for the database to achieve 1NF normalization, as the list of skills for an EOI
                is now stored as individual skill elements rather than one multi-value element.
            </p>

            <p class="enh-code-desc"><strong>image: tables in the database</strong></p>

            <figure>
                <img src="images/db-skills-table.png" alt="a screenshot the Skills table">
            </figure>

            <figure>
                <img src="images/db-junction.png" alt="a screenshot of the Eoi_Skills table">
            </figure>

            <p><strong> 2. Connection from junction table to Apply.php</strong></p>
            <p>The Skills table existing means that it is a list of the possible skills that an applicant could select.
                Rather than having to change this list in both the database and apply.php, the list of skills in apply.php
                is generated by querying the Skills table in the database. This means that any update to the skills table 
                will automatically add a new checkbox to apply.php for that skill.
            </p>

            <p class="enh-code-desc"><strong>Code in: apply.php</strong></p>
 
            <figure>
                <img src="images/apply-skills-gen.png" alt="a screenshot of php code">
            </figure>

        </section>

    </main>

    <?php
        include_once("footer.inc");
    ?>
</body>

</html>