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
    <link rel="stylesheet" href="../style.css">
    <style>
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

        /* Custom gradient for text */
        .text-gradient {
            background: rgb(51,79,254);
            background: -moz-linear-gradient(108deg, rgba(51,79,254,1) 0%, rgba(222,84,231,1) 98%);
            background: -webkit-linear-gradient(108deg, rgba(51,79,254,1) 0%, rgba(222,84,231,1) 98%);
            background: linear-gradient(108deg, rgba(51,79,254,1) 0%, rgba(222,84,231,1) 98%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Image Styling */
        .seminar-image {
            width: 300px;
            height: 400px;
            object-fit: cover;
        }

        /* Footer */

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


/* Responsive Adjustments */
@media (max-width: 768px) {


    a.btn.btn-primary.mt-3 {
        display: block;
        margin: 1rem auto; /* Centers the button horizontally */
        text-align: center;
        width: 100%;
        max-width: 200px;
        background-color: #343a40; /* Limits the button width */
    }

    .col-md-8 {
        padding: 1.5rem;
    }

    .col-md-4 {
        padding: 1rem;
    }

    .card .seminar-image {
        margin-bottom: 1rem;
    }
    .container.px-5.mb-5 {

padding: 20px !important; /* Force padding adjustment */

}
.col-md-8.p-5 {
    padding: 40px !important;
    text-align: justify;
}
h2.fw-bolder {
    padding-bottom: 20px;
    text-align: center;
}
.col-md-4 {
    position: relative;
    overflow: hidden; /* Ensures that the image doesn't overflow out of its container */
}

.seminar-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the container while maintaining aspect ratio */
    border-radius: 10px; /* Maintain rounded corners if desired */
}
.small.m-0 {
    text-align: center;
}

}

@media (max-width: 576px) {
    .hero-section h1 {
        font-size: 1.5rem;
    }

    .card h2 {
        font-size: 1.25rem;
    }

    .card p {
        font-size: 0.9rem;
    }
    a.btn.btn-primary.mt-3 {
        display: block;
        margin: 1rem auto; /* Centers the button horizontally */
        text-align: center;
        width: 100%;
        max-width: 200px; /* Limits the button width */
    }

}


a.btn.btn-primary.mt-3 {
   
    background-color:#343a40;
    border-radius: 10px;
    transition: background-color 0.3s ease;
}

a.btn.btn-primary.mt-3 i {
    margin-right: 8px;
    transition: transform 0.3s ease;
}

a.btn.btn-primary.mt-3:hover {
    background-color:#1d1d1d;
}

a.btn.btn-primary.mt-3:hover i {
    transform: scale(1.2);
}

.col-md-8.p-5 {
    text-align: justify;
}

    </style>
</head>
<body>
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <h2 class="brandy">Russel Escultura</h2>
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="resume.php">Resume</a></li>
                        <li class="nav-item"><a class="nav-link" href="seminars.php">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" id="login-link" href="../dashboard/login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="hero-section">
            <div class="container">
                <h1>Projects</h1>
                <p>Explore my recent work and projects.</p>
            </div>
        </section>

        <section class="py-5">
            <div class="container px-5 mb-5">
                
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Seminar Details from Database -->
                     

                        <?php

$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

                        $sql = "SELECT seminar_name, conductor, seminar_year, seminar_month, description, picture_path, github_link FROM seminars";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="card overflow-hidden shadow rounded-4 border-0 mb-5" data-aos="fade-up">';
        echo '  <div class="card-body p-0">';
        echo '    <div class="row g-0">';
        echo '      <div class="col-md-8 p-5">';
        echo '        <h2 class="fw-bolder">' . htmlspecialchars($row["seminar_name"]) . '</h2>';
        echo '        <p>' . htmlspecialchars($row["description"]) . '</p>';

        // Display the GitHub link button if it exists
        if (!empty($row["github_link"])) {
            echo '<a href="' . htmlspecialchars($row["github_link"]) . '" class="btn btn-primary mt-3" target="_blank">';
            echo '  <i class="fab fa-github"></i> View on GitHub';
            echo '</a>';
        }
        

        echo '      </div>';
        echo '      <div class="col-md-4">';
        if ($row["picture_path"]) {
            echo '        <img class="img-fluid seminar-image" src="../dashboard/dashboard/' . htmlspecialchars($row["picture_path"]) . '" alt="' . htmlspecialchars($row["seminar_name"]) . '">';
        } else {
            echo '        <img class="img-fluid seminar-image" src="https://dummyimage.com/300x400/343a40/6c757d" alt="...">';
        }
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
?>
                    </div>
                </div>
            </div>
        </section>

       
    </main>

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../script.js"></script>
    
   
    
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
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




    </script>
</body>
</html>
