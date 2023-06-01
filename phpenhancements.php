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
                Sam designed the first enhancement of our website, which involves creating a more compact way to access
                the main header links, through the use of whats traditionally known as a hamburger menu.
                This hamburger menu will be displayed only when the screen width of the device becomes smaller than a
                set width. (In our case 900px).
                It makes use of a media query, and a checkbox with some icons and it uses the state of this checkbox to
                toggle the display of a drop down menu and a combination of family and sibling selectors.
            </p>

            <p class="enh-code-desc">
                html code description
            </p>

            <p>
                The HTML component of this enhancement only consists of two sections.
                The first section simply contains a unordered list of links to each page and the contents for the
                hamburger menu, which includes a checkbox, and two icons.
                The current page is tagged with 'main-color' and the elements that are going to be hidden are tagged
                with 'original-menu'
                The second sectioned named 'drop-down' is a list of unordered elements that will sit vertically under
                the original menu.
            </p>

            <figure>
                <img src="images/img" alt="img">
            </figure>

            <p>
                The first section of the header makes use of the combination of position:sticky, z-index 1, and top:0.
                This ensures that the header is kept at the very top of the page and sits on top of any elements that
                may make use of any alternative positioning.
            </p>

            <figure>
                <img src="images/img1.png" alt="img">
            </figure>

            <p>
                When hovering over the original menu items, there is a small animation that enlarges the font and
                changes their color to the main color of the website, this makes use of the var() selector that allows
                variable to be set up in :root so long as they begin with '--'.
            </p>

            <figure>
                <img src="images/img2.png" alt="img">
            </figure>

            <figure>
                <img src="images/img2.2.png" alt="img">
            </figure>

            <p>
                The following styles are for setting up the drop down menus styles, centering the content, definning
                padding and most importantly, setting the defult display to none.
                This way the drop down menu isnt shown untill its display is changed.
            </p>

            <figure>
                <img src="images/img3.png" alt="img">
            </figure>

            <p>
                The following styles hide the checkbox and the close icon and stack the icons in the exact center ontop
                of one another.
            </p>

            <figure>
                <img src="images/img4.png" alt="img">
            </figure>

            <p>
                There are two keyframes for the animation on the dropdown menu, this is to ensure that the background
                takes up the full height of the page, and that the elements within the drop down menu expand but dont
                extend past the total height of the screen.
            </p>

            <figure>
                <img src="images/img5.png" alt="img">
            </figure>

            <p>
                Finally there is the two media querys that control what elements should be hidden or displayed at any
                given time.
                The first media query contains the logic for when a devices maximum width is less than 900px. In this
                case we hide the original menu, and if the state of the checkbox is ever 'checked' we hide the menu icon
                and display the close icon, both of which are sibling elements to the checkbox element.
                Lastly we use the has: - better known as the family selector. to select the dropdown and set it to
                animate into existance.
                The second media query resets the hamburger menu incase the device is ever scaled back up.
            </p>

            <figure>
                <img src="images/img6.png" alt="img">
            </figure>

            <p>
                It is important to note that the :has() selector isnt currently avalible on firefox, however
                firefox is the rare exception, and the firefox team have stated that the :has() selector is due to be
                fully operational on firefox later this year.
            </p>

            <p><strong>
                    References to third party sources for this enhancement</strong>
            </p>
            <p>
                <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/:has">Has Selector, Mozilla</a><br>
                <a href="https://www.w3schools.com/howto/howto_js_mobile_navbar.asp">Hamburger Menu Example,
                    W3schools</a><br>
            </p>

            <p>
	      Link: To view this enhancement, shrink the browser width until the hamburger menu shows.
            </p>
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
