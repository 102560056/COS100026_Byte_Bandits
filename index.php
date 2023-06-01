<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles/style.css">
</head>


<body class = "index">
    <?php
        session_start();
        include_once "header.inc";
        ColorHeader('index');
    ?>

    <!-- Main -->
    <main class="main">
        <div class="opening-elements">
            <img class="centerpiece-image" src="media/placeholder-image.png" alt="tech company stock image">
            <p class="body-text-home-centerpiece">Creating Brighter,<br>Smarter Smiles</p>
        </div>
        <p class="body-text-home-description">Welcome to the future of dental care! At our high-tech company, we
            specialize in advanced dentures and dental hygiene solutions that are unlike anything you've ever seen
            before. <br>Our state-of-the-art technology and cutting-edge materials make for a sleek, modern look that
            will have you feeling confident and secure in your smile. <br>From personalized denture design to
            top-of-the-line hygiene tools, we're committed to providing the very best in dental care. <br>Say goodbye to
            traditional dentures and hello to the future of dental health with our innovative solutions. Join us on the
            cutting edge today!</p>


        <h1 class="body-text-home-description-heading">Learn the benefits of Smart Dentures</h1>

        <div class="row-home">
            <div class="column-home">
                <img class="description-icon" src="media/monitoring.png" alt="monitoring icon">
                <h2 class="body-text-home-description-content-heading">Real-Time Monitoring</h2>
                <p class="body-text-home-description-content">Smart dentures are equipped with sensors that
                    monitor your oral health in real-time, providing feedback on factors like bacteria levels and pH
                    balance. This data can be sent to your dentist or doctor, allowing for early detection and
                    treatment of potential problems.</p>
            </div>

            <div class="column-home">
                <img class="description-icon" src="media/adjustments.png" alt="adjustments icon">
                <h2 class="body-text-home-description-content-heading">Personalized adjustments</h2>
                <p class="body-text-home-description-content">Smart dentures are designed to learn about your oral
                    habits over time and adjust themselves accordingly. For example, they adapt to changes in your
                    bite and adjust the pressure they apply to your gums based on your individual needs.</p>
            </div>

            <div class="column-home">
                <img class="description-icon" src="media/integration.png" alt="integration icon">
                <h2 class="body-text-home-description-content-heading">Integration with other devices</h2>
                <p class="body-text-home-description-content">Smart dentures are designed to integrate with other
                    smart devices, such as your phone or watch, to provide a seamless, integrated experience. For
                    example, you receive alerts on your watch reminding you to clean your dentures, and your phone
                    provides personalized tips on how to maintain your oral health..</p>
            </div>
        </div>

        <div id="slideshow">
            <div class="slide-wrapper">
                <div class="slide">
                    <img class="slide-piece" src="media/slider-denture-1.jpg">
                </div>
                <div class="slide">
                    <img class="slide-piece" src="media/slider-denture-2.jpg">
                </div>
                <div class="slide">
                    <img class="slide-piece" src="media/slider-denture-3.jpg">
                </div>
                <div class="slide">
                    <img class="slide-piece" src="media/slider-denture-4.jpg">
                </div>
            </div>
        </div>

        <h2 class="home-bottom-heading">Get started with Smart Dentures</h2>

        <div class="row-home">
            <div class="column-home">
                <img class="home-bottom-img" src="media/deployment.jpg" alt="medical touchscreen image">
                <h3 class="home-bottom-content-heading">Smart Dentures Deployment Checklist</h3>
                <p class="body-text-home-description-content">Explore a 5 step check list for safe and efficient smart
                    denture deployment</p>
            </div>

            <div class="column-home">
                <img class="home-bottom-img" src="media/product.jpg" alt="image of a product box">
                <h3 class="home-bottom-content-heading">Explore Smart Dentures</h3>
                <p class="body-text-home-description-content">Select the right device(s) to meet your needs</p>
            </div>

            <div class="column-home">
                <img class="home-bottom-img" src="media/contact.png" alt="image of an employee">
                <h3 class="home-bottom-content-heading">About us</h3>
                <p class="body-text-home-description-content">More information on the team behind the venture</p>
            </div>
        </div>

	<section class="home-video-link-section">
	  <a class="home-bottom-content-heading" href="https://www.youtube.com/watch?v=_KpM4Q5QtN8">Here's a video to show you our website! (Youtube link)</a> 
	</section>
    <section class="home-video-link-section">
	  <a class="home-bottom-content-heading" href="https://www.youtube.com/watch?v=vjEoEjac8BY">Here's the Assignment Part 2 Video: (Youtube link)</a> 
	</section>
    </main>

    <?php
        include_once("footer.inc");
    ?>
</body>

</html>
