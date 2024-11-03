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
$skill = null;
$update_message = '';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the skill data
    $stmt = $conn->prepare("SELECT * FROM skills WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $skill = $result->fetch_assoc();
    } else {
        echo "No skill found with that ID.";
        exit;
    }
    
    $stmt->close();
}

// Handle form submission for updating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $skill_name = $_POST['skill_name'];
    $skill_level = $_POST['skill_level'];
    $description = $_POST['description'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE skills SET skill_name = ?, skill_level = ?, description = ? WHERE id = ?");
    $stmt->bind_param("sssi", $skill_name, $skill_level, $description, $id);

    // Execute the statement
    if ($stmt->execute()) {
        $update_message = "Skill updated successfully";
        
        // Refresh the skill data
        $result = $conn->query("SELECT * FROM skills WHERE id = $id");
        $skill = $result->fetch_assoc();
    } else {
        $update_message = "Error updating skill: " . $conn->error;
    }

    $stmt->close();
}
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

$username = $_SESSION['user'];
$conn->close();
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="container mt-5">
        <h2>Edit Skill</h2>
        <?php if (!empty($update_message)): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $update_message; ?>
            </div>
        <?php endif; ?>
        <?php if ($skill): ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $skill['id']; ?>">
                <div class="mb-3">
                    <label for="skill_name" class="form-label">Skill Name</label>
                    <input type="text" class="form-control" id="skill_name" name="skill_name" value="<?php echo htmlspecialchars($skill['skill_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="skill_level" class="form-label">Skill Level</label>
                    <select class="form-select" id="skill_level" name="skill_level" required>
                        <option value="Beginner" <?php echo ($skill['skill_level'] == 'Beginner') ? 'selected' : ''; ?>>Beginner</option>
                        <option value="Intermediate" <?php echo ($skill['skill_level'] == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
                        <option value="Advanced" <?php echo ($skill['skill_level'] == 'Advanced') ? 'selected' : ''; ?>>Advanced</option>
                        <option value="Expert" <?php echo ($skill['skill_level'] == 'Expert') ? 'selected' : ''; ?>>Expert</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($skill['description']); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Skill</button>
            </form>
        <?php else: ?>
            <p>No skill found to edit.</p>
        <?php endif; ?>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        document.getElementById('isPresent').addEventListener('change', function() {
            var dateEndedField = document.getElementById('dateEnded');
            dateEndedField.disabled = this.checked;
            if (this.checked) {
                dateEndedField.value = '';
            }
        });
    </script>
    
    </body>
</html>

