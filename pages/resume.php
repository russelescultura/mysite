<?php
session_start(); // Start the session

$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch experience data
$sql = "SELECT * FROM experience ORDER BY date_started DESC";
$result = $conn->query($sql);

$educationSql = "SELECT * FROM education ORDER BY year_started DESC";
$educationResult = $conn->query($educationSql);

$skillsSql = "SELECT * FROM skills ORDER BY skill_level DESC";
$skillsResult = $conn->query($skillsSql);

// Check if the form has been submitted
$formSubmitted = isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <title>Russel's Personal Website Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>
    <style>

        /* Style for the skill item container with gradient background */
.d-flex.align-items-center.bg-light.rounded-4.p-3.h-100 {
    background: linear-gradient(to right, #f0f8ff, #e6e6fa); /* Gradient colors */
    border-radius: 8px; /* Rounded corners */
    padding: 15px; /* Padding around content */
    height: 100%; /* Full height of the parent column */
    display: flex; /* Flexbox layout */
    align-items: center; /* Center items vertically */
    justify-content: center; /* Center items horizontally */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
    transition: background 0.3s ease; /* Smooth background gradient transition */
}

/* Optional: Hover effect with gradient change */
.d-flex.align-items-center.bg-light.rounded-4.p-3.h-100:hover {
    background: linear-gradient(to right, #e6e6fa, #d0e1f9); /* Slightly different gradient on hover */
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
         .circle-transition {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #007bff;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            transition: width 0.5s ease, height 0.5s ease;
            pointer-events: none;
        }

.text-primary {
   
    color: #0393ff!important;
}
.text-prim{
    color: #f3f9fa!important;

}

h2.text-gradient.text-secondary.fw-bolder.mb-4 {
    color: #f3f9fa!important;
}
.text-gradient{
    color: #4c68ff!important;
}
.text-secondary.fw-bolder.mb-2 {
    color: #dd5719!important;
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
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Hero Section */
        .hero-section {
            background: rgb(0,54,68);
background: -moz-linear-gradient(261deg, rgba(0,54,68,1) 0%, rgba(31,128,154,1) 98%);
background: -webkit-linear-gradient(261deg, rgba(0,54,68,1) 0%, rgba(31,128,154,1) 98%);
background: linear-gradient(261deg, rgba(0,54,68,1) 0%, rgba(31,128,154,1) 98%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#003644",endColorstr="#1f809a",GradientType=1);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1.2rem;
        }

        /* Form Styling */
        .form-control {
            border-radius: 25px;
            border: 2px solid #0d6efd;
            padding: 12px 20px;
            margin-bottom: 20px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            border-radius: 25px;
            padding: 10px 30px;
            background-color: #007bff;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
        }

        /* Interactive Features */
        .btn-primary:active {
            background-color: #004085;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-group {
            position: relative;
        }

        .form-group label {
            position: absolute;
            top: -10px;
            left: 20px;
            background: #f8f9fa;
            padding: 0 5px;
            font-size: 14px;
            color: #007bff;
        }

        .feature {
            font-size: 2.5rem;
        }

        /* Circle transition effect */
        .circle-transition {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #007bff;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            transition: width 0.5s ease, height 0.5s ease;
            pointer-events: none;
        }

        /* Footer */

        .col-lg-8 {
        text-align: justify;
    }

        /* General mobile styles */
@media (max-width: 768px) {

    .col-lg-8 {
        text-align: center;
    }

    .btn.btn-primary.px-4.py-3 {
        display: block;
        margin: 1rem auto; /* Centers the button horizontally */
        text-align: center;
        width: 100%;
        max-width: 200px; /* Limits the button width */
    }
    .hero-section h1 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .hero-section p {
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .container.px-5 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .container.my-5 {
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    h2 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .btn-primary {
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
    }

    .card-body.p-5 {
        padding: 7rem;
    }

    .card.shadow {
        margin-bottom: 2rem;
    }

    .d-flex.align-items-center {
        flex-direction: column;
        text-align: center;
    }

    .d-flex.align-items-center h3 {
        font-size: 1.25rem;
    }

    .d-flex.align-items-center .feature {
        margin-bottom: 1rem;
    }

    .d-flex.align-items-center.bg-light {
        padding: 1rem;
    }

    .text-primary,
    .text-secondary {
        font-size: 1rem;
    }

    .col.text-center.text-lg-start.mb-4.mb-lg-0 {
        margin-bottom: 1rem;
    }

    .col-lg-8 {
        text-align: justify;
    }

    /* Centering the button on mobile */
    .d-flex.align-items-center.justify-content-between.mb-4 {
        flex-direction: column;
        justify-content: center;
    }

    .d-flex.align-items-center.justify-content-between.mb-4 .btn-primary {
        width: 100%;
        max-width: 200px;
        margin-top: 1rem;
    }
}

/* Adjustments for larger mobile screens (like tablets) */
@media (min-width: 769px) and (max-width: 1024px) {
    .hero-section h1 {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
    }

    .hero-section p {
        font-size: 1.125rem;
        margin-bottom: 1.5rem;
    }

    .container.px-5 {
        padding-left: 2rem;
        padding-right: 2rem;
    }

    .container.my-5 {
        margin-top: 3rem;
        margin-bottom: 3rem;
    }

    h2 {
        font-size: 1.75rem;
        margin-bottom: 1.25rem;
    }

    .btn-primary {
        padding: 1rem 1.5rem;
        font-size: 1rem;
    }

    .card-body.p-5 {
        padding: 7rem;
    }

    .card.shadow {
        margin-bottom: 3rem;
    }

    .d-flex.align-items-center h3 {
        font-size: 1.5rem;
    }

    .text-primary,
    .text-secondary {
        font-size: 1.125rem;
    }

}
@media (max-width: 768px) {
    .card-body.p-5 {
        padding: 40px !important; /* Force padding adjustment */
    }

    .bg-light.p-4 {
        padding: 40px !important; /* Force padding adjustment */
    }
    .container.px-5.my-5 {
        padding-left: 20px !important;
        padding-right: 20px !important;

    }
    h2.text-gradient.text-secondary.fw-bolder.mb-4 {
    font-size: 30px; /* Adjust the size as needed */
}
a.btn.btn-secondary.px-4.py-3 {
    display: block;
        margin: 1rem auto; /* Centers the button horizontally */
        text-align: center;
        width: 100%;
        max-width: 200px; 
        border-radius: 20px;
}
.small.m-0 {
    text-align: center;
}
}
    

h2.text-gradient.text-secondary.fw-bolder.mb-4 {
    text-align: center;
}


    </style>
  </head>
  <body>
    <main class="flex-shrink-0">
      <nav class="navbar navbar-expand-lg   ">
        <div class="container ">
        <h2 class="brandy">Russel Escultura</h2>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="resume.php">Resume</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="seminars.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="login-link" href="../dashboard/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h1>My Resume</h1>
            <p>Explore my professional journey and accomplishments.</p>
        </div>
    </section>

    <div class="container px-5 my-5">
    <div class="row gx-5 justify-content-center">
              <div class="col-lg-11 col-xl-9 col-xxl-8">
                  <section>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <h2 class="text-prim fw-bolder mb-0">Experience</h2>
                          <?php if ($formSubmitted): ?>
                          <a class="btn btn-primary px-4 py-3" href="../download.php">
                              <div class="d-inline-block bi bi-download me-2"></div>
                              Download Resume
                          </a>
                          <?php else: ?>
                          <a class="btn btn-secondary px-4 py-3" href="contact.php">
                              <div class="d-inline-block bi bi-download me-2"></div>
                              Fill the Contact Form to Download
                          </a>
                          <?php endif; ?>
                      </div>

                    <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dateStarted = new DateTime($row["date_started"]);
        $dateEnded = new DateTime($row["date_ended"]);
        $yearStarted = $dateStarted->format('Y');
        $yearEnded = $dateEnded->format('Y');

        // Convert new lines to <br> tags
        $jobDescription = nl2br(htmlspecialchars($row["job_description"]));

        echo '<div class="card shadow border-0 rounded-4 mb-5" data-aos="fade-up">
                <div class="card-body p-5">
                  <div class="row align-items-center gx-5">
                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                      <div class="bg-light p-4 rounded-4">
                        <div class="text-primary fw-bolder mb-2">' . htmlspecialchars($yearStarted) . ' - ' . htmlspecialchars($yearEnded) . '</div>
                        <div class="small fw-bolder">' . htmlspecialchars($row["job_title"]) . '</div>
                        <div class="small text-muted">' . htmlspecialchars($row["company_name"]) . '</div>
                        <div class="small text-muted">' . htmlspecialchars($row["company_location"]) . '</div>
                      </div>
                    </div>
                    <div class="col-lg-8"><div>' . $jobDescription . '</div></div>
                  </div>
                </div>
              </div>';
    }
} else {
    echo "<p>No work experience found.</p>";
}
?>

                </section>

                <section>
                    <h2 class="text-gradient text-secondary fw-bolder mb-4">Education</h2>
                    <?php
                    if ($educationResult->num_rows > 0) {
                        while ($row = $educationResult->fetch_assoc()) {
                            $yearStarted = htmlspecialchars($row["year_started"]);
                            $yearEnded = htmlspecialchars($row["year_ended"]);
                            $schoolName = htmlspecialchars($row["school_name"]);
                            $schoolLocation = htmlspecialchars($row["school_location"]);
                            $schoolLevel = htmlspecialchars($row["school_level"]);
                            $courseOrTrack = htmlspecialchars($row["course_or_track"]);
                            $description = htmlspecialchars($row["description"]);

                            echo '<div class="card shadow border-0 rounded-4 mb-5" data-aos="fade-up">
                                    <div class="card-body p-5">
                                        <div class="row align-items-center gx-5">
                                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                                <div class="bg-light p-4 rounded-4">
                                                    <div class="text-secondary fw-bolder mb-2">' . $yearStarted . ' - ' . ($yearEnded ? $yearEnded : 'Present') . '</div>
                                                    <div class="mb-2">
                                                        <div class="small fw-bolder">' . $schoolName . '</div>
                                                        <div class="small text-muted">' . $schoolLocation . '</div>
                                                    </div>
                                                    <div class="fst-italic">
                                                        <div class="small text-muted">' . $schoolLevel . '</div>
                                                        <div class="small text-muted">' . $courseOrTrack . '</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8"><div style="text-align: center; font-weight: 600;">' . $description . '</div></div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo "<p>No educational background found.</p>";
                    }
                    ?>
                </section>

                <section>
                    <div class="card shadow border-0 rounded-4 mb-5" data-aos="fade-up">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                    <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline ">Professional Skills</span></h3>
                                </div>
                                
                                <?php
$rowCounter = 0;
$skillsPerRow = 3;
$skills = [];

// Fetch skills from database
if ($skillsResult->num_rows > 0) {
    while ($row = $skillsResult->fetch_assoc()) {
        $skills[] = htmlspecialchars($row["skill_name"]);
    }
}

// Start the first row
echo '<div class="row row-cols-1 row-cols-md-' . $skillsPerRow . ' mb-4">';

// Loop through skills and create columns
foreach ($skills as $index => $skill) {
    // Start a new row if necessary
    if ($index > 0 && $index % $skillsPerRow == 0) {
        echo '</div><div class="row row-cols-1 row-cols-md-' . $skillsPerRow . ' mb-4">';
    }
    // Output each skill inside a column
    echo '<div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">' . $skill . '</div></div>';
}

// Close the last row
echo '</div>';
?>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

     <footer class="bg-dark py-4 pt-4 mt-auto">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // Circle transition effect
        document.addEventListener("click", function(event) {
            let circle = document.createElement("div");
            circle.classList.add("circle-transition");
            circle.style.top = `${event.clientY}px`;
            circle.style.left = `${event.clientX}px`;
            document.body.appendChild(circle);

            setTimeout(function() {
                circle.style.width = "100px";
                circle.style.height = "100px";
                circle.style.opacity = "0";
            }, 10);

            setTimeout(function() {
                circle.remove();
            }, 500);
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
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                if (link.href === window.location.href) {
                    link.classList.add('active');
                }
            });
        });

    </script>
  </body>
</html>
