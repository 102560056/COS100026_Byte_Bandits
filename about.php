<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="about-body">
    <?php
        session_start();
        include_once "header.inc";
        ColorHeader('about');
    ?>
    
    <main class="about-main">
        <h1>About Us</h1>
        <p class="about-arrow">▼</p>
        <figure>
            <img class="about-group-img" src="images/teamphoto.jpg" alt="Image of the Byte Bandits Team">
        </figure>
        <section class="about-group-details">
            <h2>Our story</h2>

            <dl>
                <dt><strong>Group Name:</strong></dt>
                <dd>ByteBandits</dd>

                <dt><strong>Group ID:</strong></dt>
                <dd>8413578</dd>

                <dt><strong>Tutor:</strong></dt>
                <dd>Grace Tao</dd>

                <dt><strong>Group Email:</strong></dt>
                <dd><a href="mailto:ByteBandits@swin.student.edu.au">ByteBandits@swin.student.edu.au</a>

                <dt><strong>Course:</strong></dt>
                <dd>COS10026 Computing Technology Inquiry Project</dd>
            </dl>

            <p>
                Welcome to ByteBandits, an edge-cutting tech company formed by a team of five young professionals
                from
                Swinburne University who are on a
                mission to create meaningful change in the world of dentistry. Our company specializes in
                creating
                smart dentures that go beyond traditional dentures to provide innovative features that improve
                the
                quality of life for our clients.
            </p>

        </section>



        <!-- key values flip card animation -->
        <section id="enhancement-lexi">
            <hr>
            <h1>Our Key Values</h1>
            <p class="about-arrow">▼</p>

            <section class="flip-container">
                <section class="flipper">
                    <section class="front">
                        <figure>
                            <img src="images/value.png" alt="values clipart">
                        </figure>
                    </section>
                    <section class="back">
                        <h2>Collaboration</h2>
                        <p> We recognizing that each member brings unique skills, perspectives, and expertise to the
                            table.</p>
                    </section>
                </section>

                <section class="flipper">
                    <section class="front">
                        <figure>
                            <img src="images/customer-service.png" alt="customer service clipart">
                        </figure>
                    </section>
                    <section class="back">
                        <h2>Custom Focus</h2>
                        <p>We places a strong emphasis on understanding and meeting the needs</p>
                    </section>
                </section>

                <section class="flipper">
                    <section class="front">
                        <figure>
                            <img src="images/project-management.png" alt="ideas clipart">
                        </figure>
                    </section>
                    <section class="back">
                        <h2>Innovation</h2>
                        <p>Our prioritize creative thinking, experimentation, and using cutting-edge tools and
                            methods</p>
                    </section>
                </section>

                <section class="flipper">
                    <section class="front">
                        <figure>
                            <img src="images/planet-earth.png" alt="sustainability clipart">
                        </figure>
                    </section>
                    <section class="back">
                        <h2>Sustainability</h2>
                        <p>We prioritize eco-friendly practices, such as using sustainable materials, reducing
                            waste.</p>
                    </section>
                </section>
            </section>

        </section>

        <hr>
        <!-- Detailes information about each member-toggle display -->
        <section>
            <h1>Meet Our Members</h1>
            <p class="about-arrow">▼</p>

            <p id="team-introduction">We are a team of 5 young professionals from Swinburne
                University of Technology,
                with a passion for
                innovation and improving people's lives. Each member of our team brings unique skills and expertise
                to the
                table, allowing us to collaborate and tackle challenges from multiple angles. We are proud to be at
                the forefront of technological advancements in the dental-tech industry and are excited to continue
                providing high-quality solutions for our clients.</p>

        </section>


        <section class="about-profile">
            <input type="radio" id="lexi_l" name="name" value="lexi" checked>
            <label for="lexi_l">Lexi</label>
            <input type="radio" id="sam_l" name="name" value="sam">
            <label for="sam_l">Sam</label>
            <input type="radio" id="preston_l" name="name" value="preston">
            <label for="preston_l">Preston</label>
            <input type="radio" id="saffan_l" name="name" value="saffan">
            <label for="saffan_l">Saffan</label>
            <input type="radio" id="randew_l" name="name" value="randew">
            <label for="randew_l">Randew</label>
            <section class="content" id="lexi">
                <figure> <img src="images/lexi.png" alt="image of Lexi">
                    <!-- <figcaption><a href="mailto:104147451@student.swin.edu.au">104147451@student.swin.edu.au</a></figcaption> -->
                </figure>
                <section class="about-profile-content">
                    <p><strong> Name:</strong><em> Lexi Peng </em><br>
                        <strong> Student ID:</strong><em> 104147451 </em><br>
                        <strong> Email: </strong><em><a
                                href="mailto:104147451@student.swin.edu.au">104147451@student.swin.edu.au</a></em><br>
                        <strong> Favourite programming language:</strong> <em> JavaScript</em><br>
                        <strong> Hobbies:</strong> <br>
                        <em> Drawing </em><br>
                        <em> Playing games </em><br>
                    </p>
                    <p>Introducing Lexi Peng, a graduate young professional from Swinburne University of Technology
                        who has a passion for programming and creating interactive web applications using
                        JavaScript. Lexi's expertise in this language has allowed her to develop and implement
                        unique solutions to solve complex problems. When she is not coding, Lexi enjoys expressing
                        her creativity through drawing and playing games. With her love for exploring new virtual
                        worlds, she enjoys testing out new games and experiencing new gaming environments. Lexi is
                        always eager to connect with like-minded individuals who share her interests in programming
                        and gaming.</p>
                </section>
            </section>

            <section class="content" id="sam">
                <figure> <img src="images/sam.PNG" alt="image of Sam">
                </figure>
                <section class="about-profile-content">
                    <p><strong> Name:</strong> <em> Samual Banfield</em> <br>
                        <strong> Student ID:</strong><em> 102560056 </em><br>
                        <strong> Email:</strong><em> <a
                                href="mailto:102560056@student.swin.edu.au">102560056@student.swin.edu.au</a></em><br>
                        <strong> Favourite programming language:</strong><em> C# </em><br>
                        <strong> Hobbies:</strong> <br>
                        <em> - Tennis </em><br>
                        <em> - Rock climbing </em><br>
                        <em> - Baking </em><br>
                    </p>
                    <p>Samuel's expertise in this language has allowed him to develop and implement unique solutions
                        to solve complex problems. When he is not coding, Samuel enjoys pursuing one of his many
                        hobbies, such as playing tennis or rock climbing. He also has a talent for baking and enjoys
                        creating delicious treats in his free time. With his wide range of interests and skills,
                        Samuel is always eager to connect with individuals who share his passions for programming
                        and outdoor activities.</p>

                </section>
            </section>

            <section class="content" id="preston">
                <figure> <img src="images/preston.PNG" alt="image of Preston">
                </figure>
                <section class="about-profile-content">
                    <p><strong> Name:</strong> <em> Preston Hulme </em><br>
                        <strong> Student ID:</strong> <em> 104453323</em> <br>
                        <strong> Email:</strong> <em> <a
                                href="mailto:104453323@student.swin.edu.au">104453323@student.swin.edu.au</a></em><br>
                        <strong> Favourite programming language:</strong><em> C++</em><br>
                        <strong> Hobbies:</strong> <br>
                        <em> - Playing music </em><br>
                        <em> - Rock climbing </em><br>
                        <em> - Board games</em><br>
                        <em> - Reading</em><br>
                        <em> - Camping</em><br>
                    </p>
                    <p>Meet Preston Hulme, a student at Swinburne University of Technology with a passion for
                        programming and a particular interest in C++. With his extensive knowledge of this
                        programming language, Preston is able to develop innovative solutions to complex problems.
                        In his free time, he enjoys playing music, rock climbing, playing board games, reading, and
                        camping. With his diverse range of hobbies and interests, Preston is always eager to connect
                        with individuals who share his passion for programming and outdoor activities. </p>

                </section>
            </section>

            <section class="content" id="saffan">
                <figure> <img src="images/saffan.PNG" alt="image of Saffan">
                </figure>
                <section class="about-profile-content">

                    <p><strong> Name:</strong> <em> Saffan </em><br>
                        <strong> Student ID:</strong> <em> 104119968 </em><br>
                        <strong> Email:</strong> <em> <a
                                href="mailto:104119968@student.swin.edu.au">104119968@student.swin.edu.au</a></em><br>
                        <strong> Favourite programming language:</strong><em> Python</em><br>
                        <strong> Hobbies:</strong> <br>
                        <em> - Focusing on Religion</em><br>
                        <em> - Boxing</em><br>
                        <em> - Watching YouTube</em><br>
                        <em> - Sleeping in</em><br>
                    </p>
                    <p>
                        Introducing Saffan Malik, a student at Swinburne University of Technology with a passion for
                        programming and a particular interest in Python. With his extensive knowledge of this
                        programming language, Saffan is able to develop innovative solutions to complex problems. When
                        he's not coding, Saffan enjoys focusing on religion and learning more about it, as well as
                        participating in activities such as boxing. In his free time, he enjoys watching YouTube and
                        catching up on his favorite content creators. Saffan also values his downtime and makes sure to
                        get enough rest by sleeping in when he can.
                    </p>
                </section>
            </section>

            <section class="content" id="randew">
                <figure> <img src="images/randew.PNG" alt="image of Randew">
                </figure>
                <section class="about-profile-content">
                    <p><strong> Name:</strong> <em> Randew </em><br>
                        <strong> Student ID:</strong> <em> 103163537 </em><br>
                        <strong> Email:</strong> <em> <a
                                href="mailto:103163537@student.swin.edu.au">103163537@student.swin.edu.au</a></em><br>
                        <strong> Favorite Programming Language: </strong> C# <br>
                        <strong> Hobbies:</strong> <br>
                        <em> - Music</em><br>
                        <em> - Video Games</em><br>
                        <em> - DND</em><br>
                        <em> - Warhammer 40K</em><br>

                    <p>
		      Randew is a skilled C# programmer and AI enthusiast who enjoys playing fantasy board games in his spare time. 
                      He uses his expertise in coding to develop innovative software solutions while immersing himself in a world of wizards
		      and mythical creatures during game nights with his friends.
		    </p>
                </section>
            </section>
        </section>

        <hr>
        <!-- Contact us information -->
        <section class="about-contact-us" id="contact-us">
            <h1>Contact Us</h1>
            <p class="about-arrow">▼</p>
            <section class="about-map">
                <iframe class="iframe"
                    src="https://www.google.com/maps/embed/v1/search?q=Swinburne+University+of+Technology,+John+Street,+Hawthorn+VIC,+Australia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                <section class="about-map-address">
                    <dl>
                        <dt> &nbsp; </dt>
                        <dd>32 John St </dd>
                        <dt>Address: </dt>
                        <dd>Hawthown</dd>
                        <dt>&nbsp;</dt>
                        <dd>VIC 3122</dd>
                        <dt>Phone:</dt>
                        <dd>1234567</dd>
                        <dt>Email:</dt>
                        <dd><a href="mailto:ByteBandits@swin.student.edu.au">ByteBandits@swin.student.edu.au</a></dd>
                        <dt>Open Hours:</dt>
                        <dd>8:00am - 4:00pm</dd>
                    </dl>
                    <p>Whether you're interested in learning more about our products, have a question about our company,
                        or
                        want to share your thoughts, we're here to listen. Our team is committed to providing the
                        highest
                        level of customer service, and we're always happy to help. So why wait? Get in touch with us
                        today
                        via phone, email, or our online contact form and let us know how we can help you achieve your
                        dental
                        needs. We look forward to hearing from you soon.</p>
                </section>
            </section>
        </section>

        <hr>
        <!-- Timetable information-assignment1 timetable -->
        <section>
            <h1>Timetable</h1>
            <p class="about-arrow">▼</p>
            <section class="about-timetable">
                <table>
                    <thead>
                        <tr>
                            <th class="column-header">Tasks</th>
                            <th>Week 1</th>
                            <th>Week 2</th>
                            <th>Week 3</th>
                            <th>Week 4</th>
                            <th>Week 5</th>
                            <th>Week 6</th>
                            <th>Week 7</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="column-header">1. Designing a concept graph for index page to decide the
                                desirable
                                website style</td>
                            <td class="one color"></td>
                            <td class="one color"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="six color"></td>
                        </tr>

                        <tr>
                            <td class="column-header">2. Finishing group agreement</td>
                            <td></td>
                            <td class="two color"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="six color"></td>
                        </tr>
                        <tr>
                            <td class="column-header">3. Assigning works</td>
                            <td></td>
                            <td class="two color"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="six color"></td>
                        </tr>

                        <tr>
                            <td class="column-header">4. All HTML pages done</td>
                            <td></td>
                            <td></td>
                            <td class="three color"></td>
                            <td class="three color"></td>
                            <td></td>
                            <td></td>
                            <td class="six color"></td>
                        </tr>

                        <tr>
                            <td class="column-header">5. Start at working on CSS and enhancement</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="four color"></td>
                            <td class="four color"></td>
                            <td></td>
                            <td class="six color"></td>
                        </tr>

                        <tr>
                            <td class="column-header">6. Colate all pages and tidy up</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="five color"></td>
                            <td class="six color"></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>

    </main>

    <?php
        include_once("footer.inc");
    ?>
</body>

</html>
