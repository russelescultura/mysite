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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact (full_name, email_address, phone_number, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Set a session variable indicating the form was successfully submitted
        $_SESSION['form_submitted'] = true;
        // Redirect to the same page with a success status
        header('Location: contact.php?status=success');
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style>

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

        /* Footer */
      

        @media (max-width: 768px) {
            .container.px-5 {
          padding-left: 10px !important;
          padding-right: 10px !important;
        }
        .card-body.p-5 {
          padding-left: 20px;
          padding-right: 20px;
        }

        button.btn.btn-primary {
            display: block;
        margin: 1rem auto; /* Centers the button horizontally */
        text-align: center;
        width: 100%;
        max-width: 200px; 
        border-radius: 20px;
        }

    .hero-section h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .hero-section p {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .container {
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Contact Us Section Titles */
    .text-center h2 {
        font-size: 20px;
        margin-bottom: 15px;
    }

    .text-center p.lead {
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* Form Labels and Inputs */
    .form-group label {
        font-size: 14px;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea {
        font-size: 14px;
        padding: 10px;
    }

    /* Submit Button */
    .btn {
        font-size: 16px;
        padding: 10px 15px;
        width: 100%;
    }
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
                <h1>Get in Touch</h1>
                <p>I'm excited to collaborate with you!</p>
            </div>
        </section>

        <section class="py-5">
            <div class="container px-5">
                <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                    <div class="text-center mb-5">
                        <div class="feature text-primary mb-3"><i class="fas fa-envelope"></i></div>
                        <h2 class="fw-bolder">Contact Us</h2>
                        <p class="lead fw-normal text-muted mb-0">Fill out the form below to start a conversation</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                        <form action="contact.php" method="POST">
                            <div class="form-group">
                                <label for="full_name">Full Name:</label>
                                <input type="text" id="full_name" name="full_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="tel" id="phone" name="phone" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php
// Display status messages using SweetAlert2
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'You have successfully submitted your information. You may now proceed to the resume page.',
            confirmButtonColor: '#007bff',
            confirmButtonText: 'Go to Resume'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'resume.php';
            }
        });
    });
    </script>
    ";
} elseif (isset($error)) {
    echo '<div class="alert alert-danger mt-3">' . htmlspecialchars($error) . '</div>';
}
?>


                        </div>
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

    <script src="js/animations.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const href = this.getAttribute('href');

                    // Create a new div element for the circle effect
                    const circle = document.createElement('div');
                    circle.classList.add('circle-transition');
                    document.body.appendChild(circle);

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

