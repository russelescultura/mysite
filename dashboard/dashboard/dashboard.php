
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

$username = $_SESSION['user'];


$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch counts from the database
$messageCount = $conn->query("SELECT COUNT(*) as count FROM contact")->fetch_assoc()['count'];
$skillsCount = $conn->query("SELECT COUNT(*) as count FROM skills")->fetch_assoc()['count'];
$educationCount = $conn->query("SELECT COUNT(*) as count FROM education")->fetch_assoc()['count'];
$aboutCount = $conn->query("SELECT COUNT(*) as count FROM about")->fetch_assoc()['count'];
$experienceCount = $conn->query("SELECT COUNT(*) as count FROM experience")->fetch_assoc()['count'];

// Fetch last change from audit_trail
$lastChange = $conn->query("SELECT * FROM audit_trail ORDER BY change_time DESC LIMIT 1")->fetch_assoc();

// Fetch audit trail data
$auditTrail = $conn->query("SELECT * FROM audit_trail ORDER BY change_time DESC");

$conn->close();

// Function to format change details in a user-friendly way and limit word count
function formatChangeDetails($change_details, $word_limit = 10) {
    $details = json_decode($change_details, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        $formatted = "";
        foreach ($details as $key => $value) {
            $formatted .= ucfirst(str_replace('_', ' ', $key)) . ": $value, ";
        }
        $formatted = rtrim($formatted, ', ');
    } else {
        $formatted = $change_details;
    }

    // Limit the number of words displayed
    $words = explode(' ', $formatted);
    if (count($words) > $word_limit) {
        $formatted = implode(' ', array_slice($words, 0, $word_limit)) . '...';
    }

    return $formatted;
}
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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Custom CSS */
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        #datatablesSimple {
            margin: 0;
        }

        #datatablesSimple tbody tr {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        #datatablesSimple tbody tr:hover {
            background-color: #f8f9fa;
          
        }

        #datatablesSimple tbody tr {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #datatablesSimple thead th {
            background-color: #343a40;
            color: white;
            transition: background-color 0.3s ease;
        }

        #datatablesSimple thead th:hover {
            background-color: #495057;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">Welcome! <?php echo htmlspecialchars($_SESSION['user']); ?></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
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
                    <?php echo htmlspecialchars($_SESSION['user']); ?>
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
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Messages</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <span><?php echo $messageCount; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Skills</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <span><?php echo $skillsCount; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Education</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <span><?php echo $educationCount; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Experience</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <span><?php echo $experienceCount; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body">About</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                             <span><?php echo $aboutCount; ?></span>
                                </div>
                            </div>
                        </div>
                       
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Activity Log
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Table Name</th>
                            <th>Operation Type</th>
                            <th>Change Time</th>
                            <th>Change Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $auditTrail->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['table_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['operation_type']); ?></td>
                                <td><?php echo htmlspecialchars($row['change_time']); ?></td>
                                <td><?php echo htmlspecialchars(formatChangeDetails($row['change_details'])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
