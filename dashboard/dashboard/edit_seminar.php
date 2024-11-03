<?php

$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch seminar data
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM seminars WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $seminar = $result->fetch_assoc(); // Changed variable name from $education to $seminar
    $stmt->close();
}

// Update seminar data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $seminar_name = $_POST['seminar_name'];
    $conductor = $_POST['conductor'];
    $seminar_year = $_POST['seminar_year'];
    $seminar_month = $_POST['seminar_month'];
    $description = $_POST['description'];

    $picture_path = null;
    if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir) && !is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $picture_name = basename($_FILES["picture"]["name"]);
        $target_file = $upload_dir . time() . '_' . $picture_name;
        
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            $picture_path = $target_file;
            
            // Delete old picture if exists
            if (!empty($seminar['picture_path']) && file_exists($seminar['picture_path'])) {
                unlink($seminar['picture_path']);
            }
        } else {
            echo "Error uploading file.";
            error_log("File upload error: " . error_get_last()['message']);
        }
    } else {
        // Keep the existing picture path if no new file is uploaded
        $picture_path = $seminar['picture_path'];
    }

    $sql = "UPDATE seminars SET seminar_name=?, conductor=?, seminar_year=?, seminar_month=?, description=?, picture_path=? WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiissi", $seminar_name, $conductor, $seminar_year, $seminar_month, $description, $picture_path, $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
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
                <h1 class="mt-4">Edit Seminar</h1>
                </ol>
                
                <?php if(isset($seminar)): ?>
    <form action="edit_seminar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($seminar['id']); ?>">
        <div class="mb-3">
            <label for="seminar_name" class="form-label">Seminar Name</label>
            <input type="text" class="form-control" id="seminar_name" name="seminar_name" value="<?php echo htmlspecialchars($seminar['seminar_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="conductor" class="form-label">Conductor</label>
            <input type="text" class="form-control" id="conductor" name="conductor" value="<?php echo htmlspecialchars($seminar['conductor']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="seminar_year" class="form-label">Year</label>
            <input type="number" class="form-control" id="seminar_year" name="seminar_year" value="<?php echo htmlspecialchars($seminar['seminar_year']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="seminar_month" class="form-label">Month</label>
            <input type="number" class="form-control" id="seminar_month" name="seminar_month" min="1" max="12" value="<?php echo htmlspecialchars($seminar['seminar_month']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($seminar['description']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Seminar Picture</label>
            <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
            <?php if (!empty($seminar['picture_path'])): ?>
                <img src="<?php echo htmlspecialchars($seminar['picture_path']); ?>" alt="Current Seminar Picture" style="max-width: 200px; margin-top: 10px;">
                <p>Current picture: <?php echo htmlspecialchars($seminar['picture_path']); ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update Seminar</button>
    </form>
<?php else: ?>
    <p>Seminar not found.</p>
<?php endif; ?>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
<?php
$conn->close();
?>
