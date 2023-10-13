<?php

// Start session
session_start();

// Include database connection file
include '../db.php';  // Adjust the path as needed

$response = [
    'Login' => -1,
    'Text' => 'An error occurred, please try again.',
    'Redirect' => null,
    'Token' => null
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['UserName']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);

    if (empty($username) || empty($password)) {
        $response['Text'] = 'Username and password are required.';
        echo json_encode($response);
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM players WHERE user_name = ?");
    $stmt->bind_param('s', $username);

    // Execute statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Success! Password and username matched
                $response['Login'] = 1;
                $response['Text'] = 'Login successful!';
                $response['Redirect'] = '/dashboard.php';  // Adjust this URL as needed
                $response['Token'] = session_id();  // Example, typically you might generate a more secure token

                // Set session variables or do other login setup here as needed

            } else {
                // Password didn't match
                $response['Text'] = 'Incorrect password.';
            }
        } else {
            // Username not found
            $response['Text'] = 'Username not found.';
        }
    } else {
        // SQL execution error
        $response['Text'] = 'An error occurred during login.';
    }
}

// Return response as JSON
echo json_encode($response);

?>
