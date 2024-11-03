<?php

$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM experience WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $company_name = $_POST['company_name'];
    $company_location = $_POST['company_location'];
    $job_title = $_POST['job_title'];
    $date_started = $_POST['date_started'];
    $date_ended = $_POST['date_ended'];
    $job_description = $_POST['job_description'];

    $sql = "UPDATE experience SET 
            user_id = '$user_id', 
            company_name = '$company_name', 
            company_location = '$company_location', 
            job_title = '$job_title', 
            date_started = '$date_started', 
            date_ended = '$date_ended', 
            job_description = '$job_description' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

$username = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
        
        .form-floating > label {
            left: 0.75rem;
        }
        .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
    </style>
    
    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Welcome! <?php echo htmlspecialchars($username); ?></h1></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Resume
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="experiencedash.php">Experience</a>
                                    <a class="nav-link" href="dash_education.php">Education</a>
                                    <a class="nav-link" href="dash_skills.php">Skills</a>
                                </nav>
                            </div>
                    
                            <a class="nav-link" href="dash_seminar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Seminars
                            </a>
                            <a class="nav-link" href="message.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Messages
                            </a>
                            <a class="nav-link" href="dash_about.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                About Me
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo htmlspecialchars($username); ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4">Edit Work Experience</h2>
           
                        <form method="post" action="" class="needs-validation" novalidate>
                            <input type="hidden" name="id" value="<?php echo($row['id']); ?>">
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo ($row['company_name']); ?>" required>
                                <label for="company_name">Company Name</label>
                                <div class="invalid-feedback">Please provide a company name.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="company_location" name="company_location" value="<?php echo ($row['company_location']); ?>" required>
                                <label for="company_location">Company Location</label>
                                <div class="invalid-feedback">Please provide a company location.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo ($row['job_title']); ?>" required>
                                <label for="job_title">Job Title</label>
                                <div class="invalid-feedback">Please provide a job title.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="date_started" name="date_started" value="<?php echo ($row['date_started']); ?>" required>
                                <label for="date_started">Date Started</label>
                                <div class="invalid-feedback">Please provide a start date.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="date_ended" name="date_ended" value="<?php echo ($row['date_ended']); ?>">
                                <label for="date_ended">Date Ended</label>
                                <div class="invalid-feedback">Please provide an end date or leave blank if current job.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="job_description" name="job_description" style="height: 100px" required><?php echo ($row['job_description']); ?></textarea>
                                <label for="job_description">Job Description</label>
                                <div class="invalid-feedback">Please provide a job description.</div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="experiencedash.php" class="btn btn-outline-secondary btn-md btn-icon">
                                    <i class="bi bi-arrow-left-circle-fill"></i>
                                    <span>Back</span>
                                </a>
                                <button type="submit" class="btn btn-primary btn-md btn-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Update</span>
                                </button>
                            </div>
                        </form>
        
                    </div>
                </div>
            </div>
        </div>
    </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>     
        <script src="js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
    
    </body>
</html>


