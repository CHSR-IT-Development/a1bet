<?php
// Load .env file
$dotenv = file(__DIR__ . '/.env');
foreach ($dotenv as $line) {
    list($name, $value) = explode('=', $line, 2);
    $_ENV[trim($name)] = trim($value);
}

// Get database info from environment variables
$db_host = $_ENV['DB_HOST'];
$db_name = $_ENV['DB_NAME'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_port = $_ENV['DB_PORT'];  // Added DB_PORT

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);  // Included DB_PORT

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function registerUser($mobile, $email, $password) {
    global $conn;

    // Check if user already exists based on mobile
    $stmt = $conn->prepare("SELECT * FROM users WHERE mobile = ?");
    $stmt->bind_param("s", $mobile);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "User already exists.";
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (mobile, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $mobile, $email, $hashedPassword);

    if ($stmt->execute()) {
        return "Registration successful.";
    } else {
        return "Error: " . $stmt->error;
    }
}

?>
