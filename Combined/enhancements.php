<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancements</title>
    <link rel="stylesheet" href="styles/style.css">
</head>


<body>
    <?php
        include_once("header.inc");
    ?>

    <main class="enh-main">
        <section id="enh-title">
            <h2>Enhancements</h2>
            <p class="about-arrow">▼</p>
            <p>We have extended this website using various html and css techniques learned beyond the lectures and
                tutorials in COS10026. Here are some of the features we've added:</p>
        </section>

      <!-- Each "enh-enhance-sect" section is a part of the page describing one of the enhancements -->

        <section class="enh-enhance-sect">
            <h3>Enhancement1 - Hamburger Menu</h3>
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
                <img src="images/sam-enhancement-html.png" alt="a screenshot of HTML markup">
            </figure>

            <p>
                The first section of the header makes use of the combination of position:sticky, z-index 1, and top:0.
                This ensures that the header is kept at the very top of the page and sits on top of any elements that
                may make use of any alternative positioning.
            </p>

            <figure>
                <img src="images/sam-enhancement-css1.png" alt="a screenshot of CSS code">
            </figure>

            <p>
                When hovering over the original menu items, there is a small animation that enlarges the font and
                changes their color to the main color of the website, this makes use of the var() selector that allows
                variable to be set up in :root so long as they begin with '--'.
            </p>

            <figure>
                <img src="images/sam-enhancement-css2.png" alt="a screenshot of CSS code">
            </figure>

            <figure>
                <img src="images/sam-enhancement-css2.2.png" alt="a screenshot of CSS code">
            </figure>

            <p>
                The following styles are for setting up the drop down menus styles, centering the content, definning
                padding and most importantly, setting the defult display to none.
                This way the drop down menu isnt shown untill its display is changed.
            </p>

            <figure>
                <img src="images/sam-enhancement-css3.png" alt="a screenshot of CSS code">
            </figure>

            <p>
                The following styles hide the checkbox and the close icon and stack the icons in the exact center ontop
                of one another.
            </p>

            <figure>
                <img src="images/sam-enhancement-css4.png" alt="a screenshot of CSS code">
            </figure>

            <p>
                There are two keyframes for the animation on the dropdown menu, this is to ensure that the background
                takes up the full height of the page, and that the elements within the drop down menu expand but dont
                extend past the total height of the screen.
            </p>

            <figure>
                <img src="images/sam-enhancement-css5.png" alt="a screenshot of CSS code">
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
                <img src="images/sam-enhancement-css6.png" alt="a screenshot of CSS code">
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
            <h3>Enhancement2-flip animation & toggle display</h3>
            <hr>
            <p>
                Lexi designed the second enhancement to our website, which includes two features on the About page: the
                flip card animation in the "Key Values" part and the toggle display of group members' personal
                information in the "Meet Our Members" area. These features significantly enhance the layout and
                interactivity of the About page, providing users with an engaging and dynamic element. <br>

                This enhancement goes well beyond the original assignment requirements, as it utilises a range of
                advanced CSS techniques that were not covered in our classes. These techniques include the use of
                transition and transform properties, the general sibling combinator, and the:checked pseudo-class.
            </p>
            <p><strong> 1. the flip card animation</strong></p>
            <p>This effect is achieved by using transition and transform properties. Firstly, I created a flipper
                section in html file that contains two sections that belong to front and back classes respectively,
                which include the content I want to display on the flip card. Secondly, in css file, I adds a transition
                effect to the flipper class using transition: transform 0.6s, transform style is set to preserve-3d to
                bring a 3d effect. Thirdly, I set the front and back sections to be absolute position so they are at the
                same position of the page, also hides the backface of the elements during the 3D transform. Then, I
                rotated the back section 180 degrees along the y-axis so the front face of the back section faces back
                now. Finally, hovering over the flipper part rotates it in 3D, revealing the back section's content.</p>
            <p class="enh-code-desc"><strong>
                    Screenshot</strong>
            </p>

            <figure>
                <img src="images/lexifeature1.png" alt="a screenshot of the flip card feature">
            </figure>

            <p class="enh-code-desc"><strong>
                    html code</strong>
            </p>

            <figure>
                <img src="images/htmlcode1.png" alt="a screenshot of HTML markup">
            </figure>

            <p class="enh-code-desc"><strong>
                    css code</strong>
            </p>

            <figure>
                <img src="images/csscode1.png" alt="a screenshot of CSS code">
            </figure>


            <p><strong> 2.For the toggle display</strong></p>
            <p>Radio button group in html, ~ general sibling combinator, :checked pseudo-class, and # id selector in css
                helped me to achieve this feature. Firstly, I set the label of each radio input to my team members'
                names and the name attribute to the same. Thus just one label/input can be selected. The section
                including one person's details is given a #id of their name. Secondly, display: none hides the radio
                input button but leaves the label visible. Thirdly, I set the default display styles for all sections
                containing personal details to none, hiding them if the correlated radio input is not selected. Lastly,
                I use #lexi_l:checked~#lexi to set when the lexi label is selected, the style of the element that has an
                id #lexi will be updated to the following style to reveal the personal details of Lexi (display change
                from none to flex). Same code applies to every group members. </p>
            <p class="enh-code-desc"><strong>
                    Screenshot</strong>
            </p>

            <figure>
                <img src="images/lexifeature2.png" alt="a screenshot of the toggle display feature">
            </figure>

            <p class="enh-code-desc"><strong>
                    html code</strong>
            </p>

            <figure>
                <figcaption>*only the personal detail section of Lexi is displayed here as all other members' sections
                    are following the same pattern</figcaption>
                <img src="images/htmlcode2.png" alt="a screenshot of HTML markup">

            </figure>

            <p class="enh-code-desc"><strong>
                    css code</strong>
            </p>

            <figure>
                <figcaption>*only the style details for Lexi and Sam's personal information section are displayed here
                    as all other members' sections are following the same pattern</figcaption>
                <img src="images/csscode2.png" alt="a screenshot of CSS code">

            </figure>

            <p><strong>
                    References to third party sources for this enhancement</strong>
            </p>
            <p>
                <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/transition">Transition, MDN
                    https://developer.mozilla.org/en-US/docs/Web/CSS/transition</a><br>
                <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/transform">Transform, MDN
                    https://developer.mozilla.org/en-US/docs/Web/CSS/transform</a><br>
                <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/backface-visibility">Backface-visibility, MDN
                    https://developer.mozilla.org/en-US/docs/Web/CSS/backface-visibility</a><br>
                <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors">CSS_Selector, MDN
                    https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors</a>
            </p>

            <p><a href="about.html#enhancement-lexi" class="enh-local-link">Link to the enhancement</a></p>

        </section>
    </main>

    <?php
        include_once("footer.inc");
    ?>
</body>

</html>
