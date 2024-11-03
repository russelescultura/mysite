<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch the headline and description from the 'about' table
$sql = "SELECT headline, description FROM about WHERE id=1"; // Adjust the ID if necessary
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $headline = $row["headline"];
        $description = $row["description"];
    }
} else {
    $headline = "Default Headline"; // Fallback content if no results are found
    $description = "Default description goes here.";
}

$conn->close();
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
     <link
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"/>
    <title>Russel's Personal Website Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>


.modal-body {
            text-align: justify;
            padding: 20px;
        }
main.flex-shrink-0 {
    background: rgb(171,111,68);
    background: -moz-linear-gradient(119deg, rgba(171,111,68,1) 0%, rgba(255,191,145,1) 98%);
    background: -webkit-linear-gradient(119deg, rgba(171,111,68,1) 0%, rgba(255,191,145,1) 98%);
    background: linear-gradient(119deg, rgba(171,111,68,1) 0%, rgba(255,191,145,1) 98%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ab6f44",endColorstr="#ffbf91",GradientType=1);
}

.scroll-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

.scroll-btn:hover {
    background-color: #0056b3;
}

#scroll-up {
    bottom: 80px; /* Adjust based on your layout */
}

#scroll-down {
    bottom: 20px;
}

body {
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;

}


/* Navbar */
.navbar {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

footer {
    background-color: #343a40;
    color: white;
    padding: 20px 0;
}

footer a {
    color: #adb5bd;
    transition: color 0.2s ease-in-out;
}

footer a:hover {
    color: white;
}

.social-link {
    margin: 0 10px;
    display: inline-block;
    position: relative;
    transition: transform 0.4s cubic-bezier(0.42, 0, 0.58, 1), color 0.4s cubic-bezier(0.42, 0, 0.58, 1);
}

.social-icon {
    transition: transform 0.4s cubic-bezier(0.42, 0, 0.58, 1), color 0.4s cubic-bezier(0.42, 0, 0.58, 1);
}

.social-link:hover .social-icon {
    transform: scale(1.3);
    color: #000; /* Color change on hover */
}

.circle-transition {
    position: absolute;
    width: 0px;
    height: 0px;
    border-radius: 50%;
    background: #007bff;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    transition: width 0.5s ease, height 0.5s ease;
    pointer-events: none;
}

@font-face {
    font-family: 'Caveat';
    src: url('fonts/Caveat-VariableFont_wght.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

/* Define a CSS class for the bold font */
.brandy {
    font-family: 'Caveat', cursive;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    color: aliceblue;
}

#custom-row {
padding-bottom: 50px;
}


.col-12.col-xl-6.text-black.d-flex.flex-column.align-items-center.align-items-xl-start {

       margin-top: 100px;
    }


 



div#details {
    padding-left: 20px;
    padding-right: 20px;
    font-size: 16px;
    padding-bottom: 20px;
}
   
h2.text-white {
    font-weight: 300;
}

/* CSS */
/* CSS */
.button-container {
    display: flex;
    flex-direction: column;  /* Aligns buttons in a column */
    justify-content: center; /* Centers buttons vertically */
    align-items: center;     /* Centers buttons horizontally */
    height: 100px;           /* Set a height for the container */
    gap: 10px;
    padding-bottom: 0px;
    margin-bottom: 60px;
                  /* Optional: space between buttons */
}




@media only screen and (max-width: 480px) {
    #about {
        padding-bottom: 40px;
    }

    #me {
        padding: 0;
        margin: 0;
        width: 100%; /* Ensure full width */
    }

    div#details {
        padding-left: 20px;
        padding-right: 20px;
        margin: 0;
        width: 100%; /* Ensure full width */
    }

    .button-container .btn {
        font-size: 16px;
        padding: 10px 20px;
        width: 100%; /* Buttons take full width */
    }

    body {
        overflow-x: hidden; /* Prevent horizontal scrolling */
    }
    .small.m-0 {
        text-align: center;
    }



    button.btn.btn-secondary {
    
    justify-content: center; /* Centers buttons vertically */
  
    }
}


#about{
    padding-bottom: 40px;
  
}

/* Ensure the parent container has position relative */


/* Initial state */


/* Initial state */
#badge, #text-container, #resume-button, #seminar-button {
    opacity: 0;
    transform: translateX(0);
    transition: opacity 1s ease, transform 1s ease;
}

/* Animation for the badge */
#badge {
    animation: fadeInBadge 2s ease forwards;
}

/* Animation for the text */
#text-container {
    animation: slideInText 2s ease forwards 1s;
}

/* Animation for the resume button */
#resume-button {
    animation: popOutButton 2s ease forwards 2s;
}

/* Animation for the seminar button */
#seminar-button {
    animation: popOutButton 2s ease forwards 2.5s;
}

/* Keyframes for fade in */
@keyframes fadeInBadge {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

/* Keyframes for text slide right */
@keyframes slideInText {
    0% {
        opacity: 0;
        transform: translateX(-50px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Keyframes for button pop out */
@keyframes popOutButton {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}
/* General styling for the container */
/* Ensure the container is positioned relative */

.background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container styling */
        .col-12.col-xl-6 {
            position: relative;
          
        }

        /* Position each image distinctly to avoid overlap */
        #bg2 img, #bg1 img, #bg3 img, #profile img {
            width: 80%;
            height: auto;
            max-width: 100%; /* Ensure images are responsive */
        }

        /* Profile div specific styling */
        #profile {
            position: relative;
            z-index: 2; /* Ensure it appears above the other images */
            animation: popOut 1s ease forwards 1s;
        }

        /* Initial state for animations */
        #bg1, #bg2, #bg3, #profile {
            opacity: 0;
            transform: translateX(0);
            transition: opacity 1s ease, transform 1s ease;
        }

        /* Fade-in animations */
        #bg1 {
    animation: fadeIn 1s ease forwards;
    z-index: 3; /* Ensure it appears above #bg2 and #bg3 */
}

#bg2 {
    animation: fadeInSlideLeft 1s ease forwards 1s;
    z-index: 5; /* Ensure it appears above #bg3 */
}

#bg3 {
    animation: fadeInSlideRight 1s ease forwards 1s;
    z-index: 2; /* Ensure it appears above #bg2 and below #profile */
}

#profile {
    animation: popOut 1s ease forwards 1s;
    z-index: 4; /* Ensure it appears above all background images */
}

        /* Keyframes for fade in */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Keyframes for fade in and slide right */
        @keyframes fadeInSlideRight {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Keyframes for fade in and slide left */
        @keyframes fadeInSlideLeft {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Keyframes for profile pop out */
        @keyframes popOut {
            0% {
                opacity: 0;
                transform: scale(0.2);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        .col-12.col-xl-6.d-flex.flex-column.align-items-center.align-items-xl-start.text-center.text-xl-start {
            margin-top: 90px;
        }


        .button-container {
    display: flex;
    justify-content: start;
    align-items: start;
    gap: 15px; /* Adjusted gap for smaller buttons */
    width: 50%;
    max-width: 100%;
}

.resume-button, .seminar-button {
    box-sizing: border-box;
    margin: 0;
    padding: 8px 20px; /* Reduced padding for smaller buttons */
    flex: 1 0 auto;
    text-align: center;
    max-width: 150px; /* Set a maximum width for the buttons */
    font-size: 1rem; /* Adjusted font size */
    border-radius: 30px; /* Adjusted border-radius for smaller buttons */
}

/* Horizontal alignment for desktop */
@media (min-width: 769px) {
    .button-container {
        flex-direction: row;
       
    }
}

/* Vertical alignment for tablets and phones */
@media (max-width: 768px) {
    .button-container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }
}

.resume-button {
    background: linear-gradient(45deg, #007bff, #00d4ff);
    color: #fff;
    font-size: 1rem;
    box-shadow: 0 8px 15px rgba(0, 123, 255, 0.3);
    transition: all 0.3s ease;
}

.resume-button:hover {
    background: linear-gradient(45deg, #0056b3, #00a3e0);
    box-shadow: 0 15px 20px rgba(0, 123, 255, 0.4);
    transform: translateY(-3px);
}

.seminar-button {
    background: transparent;
    border: 2px solid #007bff;
    color: #007bff;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.seminar-button:hover {
    background: #007bff;
    color: #fff;
    box-shadow: 0 8px 15px rgba(0, 123, 255, 0.2);
    transform: translateY(-3px);
}

@media (min-width: 320px) and (max-width: 1199px) {
    .button-container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
    }
    .col-12.col-xl-6.d-flex.flex-column.align-items-center.align-items-xl-start.text-center.text-xl-start {
        margin-top: 0%;
    }

    .resume-button, .seminar-button {
    box-sizing: border-box;
    margin: 0;
    padding: 10px 50px; /* Reduced padding for smaller buttons */
    flex: 1 0 auto;
    text-align: center;
    max-width: 250px; /* Set a maximum width for the buttons */
    font-size: 1rem; /* Adjusted font size */
    border-radius: 30px; /* Adjusted border-radius for smaller buttons */
}
}


@keyframes body-animation {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}

.flip-banner {
    position: relative;
    width: 190px;
    height: 50px;
    perspective: 1000px;
    box-shadow: 0 0px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    overflow: hidden;
}

.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    color: white;
    font-size: 2rem;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    backface-visibility: hidden;
    animation: flip-animation 9s infinite;
    border-radius: 50px;
}

#slide-one {
    animation-delay: 0s;
    background: linear-gradient(248deg, rgba(3, 84, 105, 1) 0%, rgba(48, 161, 191, 1) 98%);
}

#slide-two {
    animation-delay: 3s;
    background: linear-gradient(248deg, rgba(3, 84, 105, 1) 0%, rgba(48, 161, 191, 1) 98%);
    transform: rotateY(180deg);
}

#slide-three {
    animation-delay: 6s;
    background: linear-gradient(248deg, rgba(3, 84, 105, 1) 0%, rgba(48, 161, 191, 1) 98%);
    transform: rotateY(180deg);
}

@keyframes flip-animation {
    0%, 33.33% {
        transform: rotateY(0deg);
        opacity: 1;
    }
    33.34%, 66.66% {
        transform: rotateY(180deg);
        opacity: 0;
    }
    66.67%, 100% {
        transform: rotateY(0deg);
        opacity: 1;
    }
}

@media only screen and (max-width: 768px) {
    #badge {
        display: none;
    }
}
@media only screen and (min-width: 769px) {
    .flip-banner {
        display: none;
    }
}



/* General Styles */
#about {
  padding: 50px 0;
  background-color: #f8f9fa;
}

#aboutme h3 {
  font-family: 'Modern Sans', sans-serif;
  font-size: 2rem;
  color: #333;
  margin-bottom: 20px;
}

#me p, #details p {
  font-family: 'Modern Sans', sans-serif;
  color: #666;
  font-size: 1.2rem;
  margin: 10px auto;
  max-width: 800px;
}

#details2 {
  margin-top: 30px;
}

.social-links {
  display: flex;
  justify-content: center;
  gap: 15px;
}

.social-link {
  text-decoration: none;
}

.social-icon {
  transition: color 0.3s ease;
}

.social-icon:hover {
  color: #007bff; /* Change color on hover */
}

@media (max-width: 768px) {
  #aboutme h3 {
    font-size: 1.5rem;
  }

  #me p, #details p {
    font-size: 1rem;
  }
}

/* Define the zoom-in keyframes */
@keyframes zoomIn {
    from {
        transform: scale(0.5); /* Start from half size */
        opacity: 0; /* Start as invisible */
    }
    to {
        transform: scale(1); /* End at full size */
        opacity: 1; /* End as fully visible */
    }
}

/* Prepare the #me element without animation initially */
#me p {
    font-weight: bold; /* Ensure the text is bold */
    transform: scale(0.5); /* Start from half size */
    opacity: 0; /* Start as invisible */
    transition: transform 2s ease, opacity 2s ease; /* Apply transition for smooth animation */
}

/* Apply the animation when the .zoomed-in class is added */
#me.zoomed-in p {
    transform: scale(1);
    opacity: 1;
}

/* Define the slide-in-left keyframes */
@keyframes slideInLeft {
    from {
        transform: translateX(-100%); /* Start from outside the left side of the viewport */
        opacity: 0; /* Start as invisible */
    }
    to {
        transform: translateX(0); /* End at the normal position */
        opacity: 1; /* End as fully visible */
    }
}

/* Prepare the #details element without animation initially */
#details p {
    transform: translateX(-100%); /* Start from outside the left side */
    opacity: 0; /* Start as invisible */
    transition: transform 1s ease, opacity 1s ease; /* Apply transition for smooth animation */
}

/* Apply the animation when the .slided-in class is added */
#details.slided-in p {
    transform: translateX(0);
    opacity: 1;
}



    </style>
    </head>
    <body> 
   <div class="circle-transition" id="circle"></div>

<main class="flex-shrink-0">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <h2 class="brandy">Russel Escultura</h2>
      <a class="navbar-brand" href="index.php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="pages/resume.php">Resume</a></li>
          <li class="nav-item"><a class="nav-link" href="pages/seminars.php">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="pages/contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" id="login-link" href="dashboard/login.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid head">
    <div class="row scroll-animation" id="custom-row">
      <!-- Left Column: Text and Buttons -->
      <div class="col-12 col-xl-6 d-flex flex-column align-items-center align-items-xl-start text-center text-xl-start">
      <div class="flip-banner">
    <div class="slide" id="slide-one">CREATE</div>
    <div class="slide" id="slide-two">DESIGN</div>
    <div class="slide" id="slide-three">CODE</div>
</div>
        <span class="badge rounded-pill badge-gradient" id="badge">CREATE · DESIGN · CODE</span>
        <div class="mt-4" id="text-container">
          <h1 class="text-white">Turn Your Ideas into Stunning Websites and Kickstart</h1>
          <h2 class="text-white">My Web Developer Journey</h2>
        </div>
        <div class="button-container mt-4">
  <button type="button" class="btn resume-button" id="resume-button">Resume</button>
  <button type="button" class="btn seminar-button" id="seminar-button">Seminars</button>
</div>


      </div>

      <!-- Right Column: Images -->
      <div class="col-12 col-xl-6 d-flex align-items-center justify-content-end">
                    <div class="background-image" id="bg1">
                        <img src="images/Background.png" class="img-fluid" alt="Background">
                    </div>
                    <div class="background-image" id="bg2">
                        <img src="images/Backgroundarrow.png" class="img-fluid" alt="Background Arrow">
                    </div>
                    <div class="background-image" id="bg3">
                        <img src="images/CIRCLE.png" class="img-fluid" alt="Circle">
                    </div>
                    <div class="background-image" id="profile">
                        <img src="images/profile.png" class="img-fluid" alt="Profile">
                    </div>

      </div>





  </div>
  </div>

  <div class="container-fluid about">
  <div class="row scroll-animation" id="about">
    <!-- About Me Section -->
    <div class="col-12 text-center" id="aboutme">
      <h3>About Me</h3>
    </div>
    <div class="col-12 text-center" id="me">
      <p style="font-weight: bold;"><?php echo $headline; ?></p>
    </div>
    <div class="col-12 text-center" id="details">
      <p><?php echo $description; ?></p>
    </div>
 
      <!-- Social Links -->
      <div class="social-links">
        <a href="https://www.facebook.com/profile.php?id=100092257308427" target="_blank" class="social-link">
          <i class="fab fa-facebook-f fa-2x social-icon"></i>
        </a>
        <a href="https://www.linkedin.com/in/russel-escultura-5444162bb/" target="_blank" class="social-link">
          <i class="fab fa-linkedin-in fa-2x social-icon"></i>
        </a>
        <a href="https://github.com/russelescultura" target="_blank" class="social-link">
          <i class="fab fa-github fa-2x social-icon"></i>
        </a>
      </div>
    </div>
  </div>
</div>



</main>

<footer class="bg-dark py-4 pt-5 mt-auto">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-auto text-center">
        <div class="small m-0 text-light">
          Copyright © www.russelescultura.online 2024
        </div>
      </div>
    </div>
  </div>
</footer>


    <button id="scroll-up" class="scroll-btn">&#9650;</button>
    <button id="scroll-down" class="scroll-btn">&#9660;</button>
    <script src="js/animations.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
 document.getElementById('resume-button').addEventListener('click', function (event) {
    console.log('Resume button clicked');
    event.preventDefault();

    // Create a new div element for the slide effect
    const slideDiv = document.createElement('div');
    slideDiv.classList.add('slide-in');
    document.body.appendChild(slideDiv);

    // Redirect to the resume page after the animation ends
    slideDiv.addEventListener('animationend', function () {
        console.log('Animation ended for resume');
        window.location.href = 'pages/resume.php';
    });
});

document.getElementById('seminar-button').addEventListener('click', function (event) {
    console.log('Seminar button clicked');
    event.preventDefault();

    // Create a new div element for the slide effect
    const slideDiv = document.createElement('div');
    slideDiv.classList.add('slide-in');
    document.body.appendChild(slideDiv);

    // Redirect to the seminar page after the animation ends
    slideDiv.addEventListener('animationend', function () {
        console.log('Animation ended for seminar');
        window.location.href = 'pages/seminars.php';
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');

            // Create a new div element for the circle effect
            const circle = document.createElement('div');
            circle.classList.add('circle-transition');
            document.body.appendChild(circle);

            // Start the circle animation
            setTimeout(() => {
                circle.style.width = '300vmax';
                circle.style.height = '300vmax';
            }, 10); // Slight delay to trigger animation

            // Navigate to the next page after the animation
            setTimeout(() => {
                window.location.href = href;
            }, 500); // Match the timeout with the transition duration
        });
    });
});




document.addEventListener('DOMContentLoaded', function() {
    const scrollElements = document.querySelectorAll('.scroll-animation');

    const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;
        return (
            elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
        );
    };

    const displayScrollElement = (element) => {
        element.classList.add('scrolled');
    };

    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.25)) {
                displayScrollElement(el);
            }
        });
    };

    window.addEventListener('scroll', () => { 
        handleScrollAnimation();
    });

    // Trigger the animation for elements already in view on page load
    handleScrollAnimation();
});
document.addEventListener('DOMContentLoaded', function () {
            const scrollUpButton = document.getElementById('scroll-up');
            const scrollDownButton = document.getElementById('scroll-down');

            scrollUpButton.addEventListener('click', function () {
                window.scrollBy({
                    top: -window.innerHeight, // Scroll up by one viewport height
                    behavior: 'smooth'
                });
            });

            scrollDownButton.addEventListener('click', function () {
                window.scrollBy({
                    top: window.innerHeight, // Scroll down by one viewport height
                    behavior: 'smooth'
                });
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
    const target = document.getElementById('me');
    
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function handleScroll() {
        if (isInViewport(target)) {
            target.classList.add('zoomed-in');
            window.removeEventListener('scroll', handleScroll); // Remove listener once the animation is triggered
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check in case the element is already in view
});



document.addEventListener('DOMContentLoaded', function() {
    const target = document.getElementById('details');
    
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function handleScroll() {
        if (isInViewport(target)) {
            target.classList.add('slided-in');
            window.removeEventListener('scroll', handleScroll); // Remove listener once the animation is triggered
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check in case the element is already in view
});

        
    </script>
  </body>
</html>