

<?php
require_once 'config.php';

class LoginForm {
    private $db;
    private $username;
    private $password;
    private $error;

    public function __construct() {
        $this->error = '';
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function handleSubmit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->username = $this->db->real_escape_string($_POST['username'] ?? '');
            $this->password = $_POST['password'] ?? '';

            if (empty($this->username) || empty($this->password)) {
                $this->error = "Please fill in all fields.";
            } else {
                $stmt = $this->db->prepare("SELECT password FROM users WHERE username = ?");
                $stmt->bind_param("s", $this->username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    if (password_verify($this->password, $user['password'])) {
                        session_start();
                        $_SESSION['user'] = $this->username;
                        header('Location: dashboard/dashboard.php');
                        exit;
                    } else {
                        $this->error = "Invalid username or password.";
                    }
                } else {
                    $this->error = "Invalid username or password.";
                }
                $stmt->close();
            }
        }
    }

    public function getError() {
        return $this->error;
    }

    public function render() {
        $error = $this->getError();
        $errorHtml = !empty($error) ? "<div class='alert alert-danger' role='alert'>$error</div>" : '';
    
        return <<<HTML
        <form method="POST" action="">
            $errorHtml
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
        </form>
    HTML;
    }
    public function __destruct() {
        $this->db->close();
    }
}
?>